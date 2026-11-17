$chromePath = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$outputDir  = "C:\Users\Dhidan\Downloads\High-Fidelity"

if (!(Test-Path $outputDir)) {
    New-Item -ItemType Directory -Path $outputDir -Force | Out-Null
}

$pages = @(
    @{
        Id = "01"
        File = "01-dashboard.png"
        Title = "01. Customer Dashboard (Top Hero & Quick Search)"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/?no_splash=1"
        Width = 1440
        Height = 1080
        Desc = "Halaman Beranda Pelanggan: Banner Shopping & Dining Bandara Juanda, Filter Terminal & Area, serta Rekomendasi Restoran Populer."
    },
    @{
        Id = "02"
        File = "02-customer-catalog-full.png"
        Title = "02. Customer Full Catalog & Merchant Directory"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/?no_splash=1"
        Width = 1440
        Height = 2400
        Desc = "Katalog Lengkap Pelanggan: Daftar seluruh gerai F&B Terminal 1 & 2, filter kategori cepat saji, minuman, makanan berat, dan status jam buka."
    },
    @{
        Id = "03"
        File = "03-customer-tenant-menu.png"
        Title = "03. Detail Tenant & Menu Restoran"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/menu/1?no_splash=1"
        Width = 1440
        Height = 1800
        Desc = "Halaman Menu Restoran: Daftar produk makanan & minuman, foto produk HD, harga, stok, waktu persiapan, dan tombol tambah ke keranjang."
    },
    @{
        Id = "04"
        File = "04-customer-cart.png"
        Title = "04. Keranjang Belanja & Formulir Checkout"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?path=/cart"
        Width = 1440
        Height = 1400
        Desc = "Keranjang & Checkout: Rincian pesanan, pemilihan metode ambil sendiri / diantar porter, data pemesan, nomor penerbangan, dan metode bayar."
    },
    @{
        Id = "05"
        File = "05-customer-tracking.png"
        Title = "05. Pelacakan Pesanan & Pembayaran QRIS"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/tracking?order=ORD-GSMMIY&no_splash=1"
        Width = 1440
        Height = 1600
        Desc = "Status Pelacakan Pesanan: Kode QRIS dinamis resmi, batas waktu bayar, estimasi persiapan dapur, dan timeline status pesanan real-time."
    },
    @{
        Id = "06"
        File = "06-customer-receipt.png"
        Title = "06. Struk Pembelian Digital Resmi"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/receipt/ORD-3UEVYC?no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Struk Digital: Tanda bukti pembayaran sah berlogo Juanda & FlyDine, rincian subtotal, biaya porter, nomor order, dan barcode bukti ambil."
    },
    @{
        Id = "07"
        File = "07-customer-history.png"
        Title = "07. Riwayat Pesanan Pelanggan"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/history?phone_number=085808330777&no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Riwayat Pesanan: Pencarian pesanan via nomor WhatsApp, daftar pesanan aktif, pesanan selesai, dan tombol akses struk digital kembali."
    },
    @{
        Id = "08"
        File = "08-customer-promosi.png"
        Title = "08. Halaman Promosi & Kolaborasi Maskapai"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/promosi?no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Halaman Promosi: Penawaran diskon boarding pass, voucher tenant bandara, cashback pembayaran QRIS, dan banner kolaborasi resmi."
    },
    @{
        Id = "09"
        File = "09-customer-cara-pesan.png"
        Title = "09. Panduan Cara Pesan & Layanan Porter"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/cara-pesan?no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Panduan Pengguna: Infografis langkah pemesanan mandiri dari scan QR meja/banner hingga makanan diantar porter langsung ke gate keberangkatan."
    },
    @{
        Id = "10"
        File = "10-customer-faq.png"
        Title = "10. Pusat Bantuan, FAQ & Pengaduan"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/faq?no_splash=1"
        Width = 1440
        Height = 1600
        Desc = "Pusat Bantuan: Tanya jawab seputar pemesanan bandara, SLA pengantaran, dan formulir pengaduan kendala transaksi pelanggan."
    },
    @{
        Id = "11"
        File = "11-customer-daftar-tenant.png"
        Title = "11. Direktori Tenant & Pendaftaran Mitra"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/daftar-tenant?no_splash=1"
        Width = 1440
        Height = 1600
        Desc = "Direktori & Registrasi Mitra: Informasi zona komersial Bandara Juanda dan formulir pengajuan kemitraan tenant F&B baru."
    },
    @{
        Id = "12"
        File = "12-tenant-dashboard.png"
        Title = "12. Dashboard Operasional Tenant"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/dashboard"
        Width = 1440
        Height = 1200
        Desc = "Portal Tenant: Ringkasan pesanan masuk, antrean masak, omzet hari ini, kendali jam operasional, dan toggle status layanan porter."
    },
    @{
        Id = "13"
        File = "13-tenant-orders.png"
        Title = "13. Manajemen Pesanan Masuk Tenant"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/orders"
        Width = 1440
        Height = 1300
        Desc = "Antrean Dapur: Live order board dengan status Menunggu, Dimasak, Siap Ambil, dan tombol aksi pembaruan status pesanan."
    },
    @{
        Id = "14"
        File = "14-tenant-products.png"
        Title = "14. Katalog Produk & Stok Tenant"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/products"
        Width = 1440
        Height = 1400
        Desc = "Manajemen Menu Tenant: Tabel daftar menu, harga, ketersediaan stok porsi, estimasi waktu masak, dan toggle aktif/nonaktif menu."
    },
    @{
        Id = "15"
        File = "15-tenant-create-product.png"
        Title = "15. Tambah Produk / Menu Baru Tenant"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/products/create"
        Width = 1440
        Height = 1300
        Desc = "Formulir Menu Baru: Input nama hidangan, kategori, harga, upload foto hidangan beresolusi tinggi, stok awal, dan deskripsi menu."
    },
    @{
        Id = "16"
        File = "16-tenant-history.png"
        Title = "16. Riwayat Pesanan & Laporan Tenant"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/tenant/orders/history"
        Width = 1440
        Height = 1200
        Desc = "Riwayat Penjualan: Rekapitulasi pesanan yang telah selesai disajikan, waktu transaksi, dan total pendapatan gerai."
    },
    @{
        Id = "17"
        File = "17-admin-dashboard.png"
        Title = "17. Dashboard Utama Admin Operasional"
        Category = "Admin"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/dashboard"
        Width = 1440
        Height = 1300
        Desc = "Portal Admin Bandara: Metrik 76 mitra F&B beroperasi, statistik pesanan terminal, resolusi komplain, dan audit trail aktivitas sistem."
    },
    @{
        Id = "18"
        File = "18-admin-executive-dashboard.png"
        Title = "18. Executive Dashboard & Analitik Finansial"
        Category = "Admin"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/executive-dashboard"
        Width = 1440
        Height = 2200
        Desc = "Analitik Eksekutif: Grafik omzet kotor, bagi hasil bandara (revenue share), breakdown tenant terlaris, dan kalkulator simulasi What-If."
    },
    @{
        Id = "19"
        File = "19-admin-tenants-management.png"
        Title = "19. Manajemen Mitra Tenant F&B Bandara"
        Category = "Admin"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/tenants-management"
        Width = 1440
        Height = 1400
        Desc = "Kelola Tenant: Daftar seluruh merchant Terminal 1 & 2, lokasi lantai/gate, status aktif/tutup, jam operasional, dan modal tambah tenant."
    },
    @{
        Id = "20"
        File = "20-admin-complaints.png"
        Title = "20. Layanan Pengaduan & Resolusi Komplain"
        Category = "Admin"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/complaints"
        Width = 1440
        Height = 1300
        Desc = "Helpdesk Pengaduan: Manajemen tiket komplain pelanggan terkait pesanan, verifikasi nomor telepon, status investigasi, dan catatan solusi."
    },
    @{
        Id = "21"
        File = "21-admin-fraud-monitoring.png"
        Title = "21. Pemantauan Fraud & Keamanan Pesanan"
        Category = "Admin"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=admin&path=/admin/fraud-monitoring"
        Width = 1440
        Height = 1300
        Desc = "Fraud Monitoring: Deteksi pola pesanan fiktif, auto-cancel rate, daftar nomor pelanggan terblokir/spam, dan tombol unblock keamanan."
    },
    @{
        Id = "22"
        File = "22-auth-login.png"
        Title = "22. Halaman Masuk Portal Admin & Tenant"
        Category = "Auth"
        Url = "http://127.0.0.1:8000/login"
        Width = 1440
        Height = 1080
        Desc = "Autentikasi Pengguna: Form login single-portal untuk Admin Operasional Komersial dan Staff Mitra Tenant F&B."
    },
    @{
        Id = "23"
        File = "23-auth-forgot-password.png"
        Title = "23. Permintaan Reset Kata Sandi"
        Category = "Auth"
        Url = "http://127.0.0.1:8000/forgot-password"
        Width = 1440
        Height = 1080
        Desc = "Pemulihan Akun: Form input email terdaftar untuk pengiriman tautan token pembaruan kata sandi portal."
    },
    @{
        Id = "24"
        File = "24-auth-reset-password.png"
        Title = "24. Formulir Pembaruan Kata Sandi Baru"
        Category = "Auth"
        Url = "http://127.0.0.1:8000/preview/reset-password"
        Width = 1440
        Height = 1080
        Desc = "Reset Sandi: Form validasi kata sandi baru dengan konfirmasi keamanan sandi minimal 8 karakter."
    },
    @{
        Id = "25"
        File = "25-customer-terms.png"
        Title = "25. Syarat & Ketentuan Layanan Bandara"
        Category = "Legal"
        Url = "http://127.0.0.1:8000/syarat-ketentuan?no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Legalitas Layanan: Ketentuan pemesanan makanan, batas waktu pengambilan, aturan zona steril airside, dan klausul pengembalian dana."
    },
    @{
        Id = "26"
        File = "26-customer-privacy.png"
        Title = "26. Kebijakan Privasi & Perlindungan Data"
        Category = "Legal"
        Url = "http://127.0.0.1:8000/kebijakan-privasi?no_splash=1"
        Width = 1440
        Height = 1400
        Desc = "Privasi Pelanggan: Pernyataan resmi kepatuhan perlindungan data pribadi nomor ponsel, identitas pemesan, dan data pembayaran."
    },
    @{
        Id = "27"
        File = "27-profile-settings.png"
        Title = "27. Pengaturan Akun & Profil Pengguna"
        Category = "Tenant"
        Url = "http://127.0.0.1:8000/dev/screenshot-view?role=tenant&path=/profile"
        Width = 1440
        Height = 1300
        Desc = "Manajemen Akun: Pembaruan nama penanggung jawab, email login, dan ganti kata sandi staff tenant."
    },
    @{
        Id = "28"
        File = "28-customer-karir.png"
        Title = "28. Karir & Rekrutmen InJourney Airports"
        Category = "Customer"
        Url = "http://127.0.0.1:8000/karir-korporat?no_splash=1"
        Width = 1440
        Height = 1500
        Desc = "Halaman Karir: Informasi peluang kerja di lingkungan PT Angkasa Pura Indonesia / InJourney Airports dan mitra operasional komersial."
    }
)

Write-Host "=========================================================="
Write-Host "   MEMULAI PEMBUATAN 28 HIGH-FIDELITY FLYDINE JUANDA     "
Write-Host "=========================================================="

$count = 0
foreach ($p in $pages) {
    $count++
    $outPath = Join-Path $outputDir $p.File
    Write-Host "[$count/28] Mengambil Screenshot: $($p.File) ($($p.Title))..."
    
    $args = @(
        "--headless=new",
        "--no-sandbox",
        "--hide-scrollbars",
        "--window-size=$($p.Width),$($p.Height)",
        "--virtual-time-budget=1500",
        "--screenshot=$outPath",
        "$($p.Url)"
    )
    
    $proc = Start-Process -FilePath $chromePath -ArgumentList $args -NoNewWindow -PassThru -Wait
    if (Test-Path $outPath) {
        $sizeKb = [Math]::Round((Get-Item $outPath).Length / 1024, 1)
        Write-Host "  -> Berhasil dibuat: $outPath ($sizeKb KB)" -ForegroundColor Green
    } else {
        Write-Host "  -> Gagal membuat: $outPath" -ForegroundColor Red
    }
}

Write-Host "`nMenyalin ke folder publik aplikasi di c:\Users\Dhidan\flydine-juanda\public\high-fidelity..."
$publicHiFi = "c:\Users\Dhidan\flydine-juanda\public\high-fidelity"
if (!(Test-Path $publicHiFi)) {
    New-Item -ItemType Directory -Path $publicHiFi -Force | Out-Null
}
Copy-Item "$outputDir\*.png" $publicHiFi -Force

Write-Host "Seluruh 28 High-Fidelity Mockup berhasil dibuat!"
