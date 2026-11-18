$chromePath = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$outDir     = "C:\Users\Dhidan\Downloads\High-Fidelity"
$tempDir    = "C:\Users\Dhidan\Downloads\High-Fidelity\temp_screenshots"
$publicDir  = "c:\Users\Dhidan\flydine-juanda\public\high-fidelity"

if (!(Test-Path $tempDir)) {
    New-Item -ItemType Directory -Path $tempDir -Force | Out-Null
}

$pages = @(
    @{ Id = "01"; Name = "01-dashboard"; Title = "Customer Dashboard"; Url = "http://127.0.0.1:8000/?no_splash=1"; W = 1440; H = 1080; Type = "customer" },
    @{ Id = "02"; Name = "02-customer-catalog-full"; Title = "Customer Full Catalog"; Url = "http://127.0.0.1:8000/?no_splash=1"; W = 1440; H = 2400; Type = "customer" },
    @{ Id = "03"; Name = "03-customer-tenant-menu"; Title = "Detail Tenant & Menu"; Url = "http://127.0.0.1:8000/menu/1?no_splash=1"; W = 1440; H = 1800; Type = "customer" },
    @{ Id = "04"; Name = "04-customer-cart"; Title = "Keranjang & Checkout"; Url = "http://127.0.0.1:8000/dev/screenshot-view?path=/cart"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "05"; Name = "05-customer-tracking"; Title = "Pelacakan Pesanan & QRIS"; Url = "http://127.0.0.1:8000/tracking?order=ORD-GSMMIY&no_splash=1"; W = 1440; H = 1600; Type = "customer" },
    @{ Id = "06"; Name = "06-customer-receipt"; Title = "Struk Pembelian Digital"; Url = "http://127.0.0.1:8000/receipt/ORD-3UEVYC?no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "07"; Name = "07-customer-history"; Title = "Riwayat Pesanan Saya"; Url = "http://127.0.0.1:8000/history?phone_number=085808330777&no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "08"; Name = "08-customer-promosi"; Title = "Promosi & Kolaborasi"; Url = "http://127.0.0.1:8000/promosi?no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "09"; Name = "09-customer-cara-pesan"; Title = "Panduan Cara Pesan"; Url = "http://127.0.0.1:8000/cara-pesan?no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "10"; Name = "10-customer-faq"; Title = "Pusat Bantuan & FAQ"; Url = "http://127.0.0.1:8000/faq?no_splash=1"; W = 1440; H = 1600; Type = "customer" },
    @{ Id = "11"; Name = "11-customer-daftar-tenant"; Title = "Pendaftaran Mitra Tenant"; Url = "http://127.0.0.1:8000/daftar-tenant?no_splash=1"; W = 1440; H = 1600; Type = "customer" },
    @{ Id = "12"; Name = "12-tenant-dashboard"; Title = "Tenant Dashboard"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/dashboard"; W = 1440; H = 1200; Type = "portal_tenant" },
    @{ Id = "13"; Name = "13-tenant-orders"; Title = "Tenant Manajemen Pesanan"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/orders"; W = 1440; H = 1300; Type = "portal_tenant" },
    @{ Id = "14"; Name = "14-tenant-products"; Title = "Tenant Katalog Produk"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/products"; W = 1440; H = 1400; Type = "portal_tenant" },
    @{ Id = "15"; Name = "15-tenant-create-product"; Title = "Tenant Tambah Menu"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/products/create"; W = 1440; H = 1300; Type = "portal_tenant" },
    @{ Id = "16"; Name = "16-tenant-history"; Title = "Tenant Riwayat Laporan"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/orders/history"; W = 1440; H = 1200; Type = "portal_tenant" },
    @{ Id = "17"; Name = "17-admin-dashboard"; Title = "Admin Dashboard"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/dashboard"; W = 1440; H = 1300; Type = "portal_admin" },
    @{ Id = "18"; Name = "18-admin-executive-dashboard"; Title = "Executive Analytics"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/executive-dashboard"; W = 1440; H = 2200; Type = "portal_admin" },
    @{ Id = "19"; Name = "19-admin-tenants-management"; Title = "Manajemen Mitra Tenant"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/tenants-management"; W = 1440; H = 1400; Type = "portal_admin" },
    @{ Id = "20"; Name = "20-admin-complaints"; Title = "Layanan Pengaduan Komplain"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/complaints"; W = 1440; H = 1300; Type = "portal_admin" },
    @{ Id = "21"; Name = "21-admin-fraud-monitoring"; Title = "Pemantauan Fraud & Spam"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/fraud-monitoring"; W = 1440; H = 1300; Type = "portal_admin" },
    @{ Id = "22"; Name = "22-auth-login"; Title = "Login Portal Petugas & Tenant"; Url = "http://127.0.0.1:8000/login"; W = 1440; H = 1080; Type = "auth" },
    @{ Id = "23"; Name = "23-auth-forgot-password"; Title = "Lupa Kata Sandi"; Url = "http://127.0.0.1:8000/forgot-password"; W = 1440; H = 1080; Type = "auth" },
    @{ Id = "24"; Name = "24-auth-reset-password"; Title = "Reset Kata Sandi Baru"; Url = "http://127.0.0.1:8000/preview/reset-password"; W = 1440; H = 1080; Type = "auth" },
    @{ Id = "25"; Name = "25-customer-terms"; Title = "Syarat & Ketentuan Layanan"; Url = "http://127.0.0.1:8000/syarat-ketentuan?no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "26"; Name = "26-customer-privacy"; Title = "Kebijakan Privasi Data"; Url = "http://127.0.0.1:8000/kebijakan-privasi?no_splash=1"; W = 1440; H = 1400; Type = "customer" },
    @{ Id = "27"; Name = "27-profile-settings"; Title = "Pengaturan Akun Tenant"; Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/profile"; W = 1440; H = 1300; Type = "portal_tenant" },
    @{ Id = "28"; Name = "28-customer-karir"; Title = "Karir & Rekrutmen"; Url = "http://127.0.0.1:8000/karir-korporat?no_splash=1"; W = 1440; H = 1500; Type = "customer" }
)

Write-Host "Mengambil screenshot 28 halaman web asli FlyDine Juanda..."

$count = 0
foreach ($p in $pages) {
    $count++
    $pngFile = Join-Path $tempDir "$($p.Name).png"
    Write-Host "[$count/28] Capturing $($p.Name) ($($p.Url))..."
    
    $args = @(
        "--headless=new",
        "--no-sandbox",
        "--hide-scrollbars",
        "--window-size=$($p.W),$($p.H)",
        "--virtual-time-budget=1500",
        "--screenshot=$pngFile",
        "$($p.Url)"
    )
    
    Start-Process -FilePath $chromePath -ArgumentList $args -NoNewWindow -Wait
}

Write-Host "Screenshot selesai. Membangun 28 High-Fidelity SVG dengan Layer Vektor Ikon Terbuka..."

# Call PHP script to package into SVG with vector overlays
php "c:\Users\Dhidan\flydine-juanda\package_hifi_svg_with_vectors.php"

# Clean up temp screenshots
Remove-Item -Path $tempDir -Recurse -Force

Write-Host "Selesai 100%! Seluruh 28 file High-Fidelity SVG telah sinkron persis dengan web dan ikonnya bisa diedit di Figma."
