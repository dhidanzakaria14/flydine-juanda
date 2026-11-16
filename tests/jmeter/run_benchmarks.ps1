$jmeterBat = "C:\Users\Dhidan\Downloads\apache-jmeter-5.6.3\bin\jmeter.bat"
$jmxPath   = "C:\Users\Dhidan\Downloads\apache-jmeter-5.6.3\bin\FlyDine_Juanda_LoadTest.jmx"
$baseDir   = "c:\Users\Dhidan\flydine-juanda\tests\jmeter\benchmark_runs"

if (!(Test-Path $baseDir)) {
    New-Item -ItemType Directory -Path $baseDir -Force | Out-Null
}

$tiers = @(50, 100, 200, 300)
$results = @()

foreach ($threads in $tiers) {
    Write-Host "=========================================="
    Write-Host ">>> MENJALANKAN PENGUJIAN: $threads VIRTUAL USERS (Ramp-Up: 60s) <<<"
    Write-Host "=========================================="
    
    $runDir     = "$baseDir\tier_$threads"
    $resultsJtl = "$runDir\results.jtl"
    $reportDir  = "$runDir\report"
    
    if (Test-Path $runDir) {
        Remove-Item -Path $runDir -Recurse -Force -ErrorAction SilentlyContinue
    }
    New-Item -ItemType Directory -Path $runDir -Force | Out-Null
    
    $args = @(
        "-n",
        "-t", $jmxPath,
        "-Jthreads=$threads",
        "-Jrampup=60",
        "-l", $resultsJtl,
        "-e",
        "-o", $reportDir
    )
    
    $proc = Start-Process -FilePath $jmeterBat -ArgumentList $args -NoNewWindow -PassThru -Wait
    
    # Baca statistics.json
    $statsJsonPath = "$reportDir\statistics.json"
    if (Test-Path $statsJsonPath) {
        $stats = Get-Content $statsJsonPath -Raw | ConvertFrom-Json
        $total = $stats.Total
        
        # Hitung Jumlah HTTP 5xx dari results.jtl
        $count5xx = 0
        if (Test-Path $resultsJtl) {
            $lines = Get-Content $resultsJtl
            # Header adalah baris pertama
            for ($i = 1; $i -lt $lines.Count; $i++) {
                $cols = $lines[$i] -split ","
                if ($cols.Count -gt 3) {
                    $code = $cols[3].Trim()
                    if ($code -match "^5\d\d$") {
                        $count5xx++
                    }
                }
            }
        }
        
        $avgSec = [Math]::Round(($total.meanResTime / 1000), 2)
        $p95Sec = [Math]::Round(($total.pct2ResTime / 1000), 2)
        $errPct = [Math]::Round($total.errorPct, 2)
        $tps    = [Math]::Round($total.throughput, 2)
        
        $resultObj = [PSCustomObject]@{
            "Pengguna Virtual"       = $threads
            "Rata-rata Respons (s)"   = $avgSec
            "p95 (s)"                 = $p95Sec
            "Error (%)"               = "$errPct%"
            "Jumlah HTTP 5xx"         = $count5xx
            "Throughput (req/detik)"  = $tps
        }
        $results += $resultObj
        
        Write-Host "SELESAI TIER ${threads}:"
        Write-Host "  Rata-rata: $avgSec s | p95: $p95Sec s | Error: $errPct% | 5xx: $count5xx | TPS: $tps"
    } else {
        Write-Host "Gagal menemukan statistics.json untuk tier $threads"
    }
}

Write-Host "`n================ RINGKASAN HASIL PENGUJIAN ================"
$results | Format-Table -AutoSize
$results | Export-Csv -Path "$baseDir\benchmark_summary.csv" -NoTypeInformation -Encoding UTF8
$results | ConvertTo-Json | Set-Content -Path "$baseDir\benchmark_summary.json" -Encoding UTF8
