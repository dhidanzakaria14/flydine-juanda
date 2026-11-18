<?php

$tempDir   = 'C:/Users/Dhidan/Downloads/High-Fidelity/temp_screenshots';
$outputDir = 'C:/Users/Dhidan/Downloads/High-Fidelity';
$publicDir = __DIR__ . '/public/high-fidelity';

$pages = [
    ['id' => '01', 'name' => '01-dashboard', 'title' => 'Customer Dashboard & Quick Search', 'w' => 1440, 'h' => 1080, 'type' => 'customer'],
    ['id' => '02', 'name' => '02-customer-catalog-full', 'title' => 'Customer Full Catalog & Directory', 'w' => 1440, 'h' => 2400, 'type' => 'customer'],
    ['id' => '03', 'name' => '03-customer-tenant-menu', 'title' => 'Detail Tenant & Menu Restoran', 'w' => 1440, 'h' => 1800, 'type' => 'customer'],
    ['id' => '04', 'name' => '04-customer-cart', 'title' => 'Keranjang Belanja & Checkout', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '05', 'name' => '05-customer-tracking', 'title' => 'Status Pesanan & Pembayaran QRIS', 'w' => 1440, 'h' => 1600, 'type' => 'customer'],
    ['id' => '06', 'name' => '06-customer-receipt', 'title' => 'Struk Pembelian Digital Resmi', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '07', 'name' => '07-customer-history', 'title' => 'Riwayat & Pelacakan Pesanan', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '08', 'name' => '08-customer-promosi', 'title' => 'Promosi & Kolaborasi Maskapai', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '09', 'name' => '09-customer-cara-pesan', 'title' => 'Panduan Cara Pesan & Porter', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '10', 'name' => '10-customer-faq', 'title' => 'Pusat Bantuan & FAQ', 'w' => 1440, 'h' => 1600, 'type' => 'customer'],
    ['id' => '11', 'name' => '11-customer-daftar-tenant', 'title' => 'Direktori & Pendaftaran Tenant', 'w' => 1440, 'h' => 1600, 'type' => 'customer'],
    ['id' => '12', 'name' => '12-tenant-dashboard', 'title' => 'Dashboard Operasional Tenant', 'w' => 1440, 'h' => 1200, 'type' => 'portal_tenant'],
    ['id' => '13', 'name' => '13-tenant-orders', 'title' => 'Manajemen Pesanan Masuk (KDS)', 'w' => 1440, 'h' => 1300, 'type' => 'portal_tenant'],
    ['id' => '14', 'name' => '14-tenant-products', 'title' => 'Katalog Produk & Stok Tenant', 'w' => 1440, 'h' => 1400, 'type' => 'portal_tenant'],
    ['id' => '15', 'name' => '15-tenant-create-product', 'title' => 'Form Tambah Menu Baru', 'w' => 1440, 'h' => 1300, 'type' => 'portal_tenant'],
    ['id' => '16', 'name' => '16-tenant-history', 'title' => 'Riwayat Pesanan & Laporan Tenant', 'w' => 1440, 'h' => 1200, 'type' => 'portal_tenant'],
    ['id' => '17', 'name' => '17-admin-dashboard', 'title' => 'Overview Operasional Bandara', 'w' => 1440, 'h' => 1300, 'type' => 'portal_admin'],
    ['id' => '18', 'name' => '18-admin-executive-dashboard', 'title' => 'Executive Analytics & Revenue', 'w' => 1440, 'h' => 2200, 'type' => 'portal_admin'],
    ['id' => '19', 'name' => '19-admin-tenants-management', 'title' => 'Manajemen Mitra Tenant Bandara', 'w' => 1440, 'h' => 1400, 'type' => 'portal_admin'],
    ['id' => '20', 'name' => '20-admin-complaints', 'title' => 'Pusat Komplain & Pengaduan', 'w' => 1440, 'h' => 1300, 'type' => 'portal_admin'],
    ['id' => '21', 'name' => '21-admin-fraud-monitoring', 'title' => 'Pemantauan Fraud & Keamanan', 'w' => 1440, 'h' => 1300, 'type' => 'portal_admin'],
    ['id' => '22', 'name' => '22-auth-login', 'title' => 'Portal Masuk Admin & Tenant', 'w' => 1440, 'h' => 1080, 'type' => 'auth'],
    ['id' => '23', 'name' => '23-auth-forgot-password', 'title' => 'Permintaan Reset Kata Sandi', 'w' => 1440, 'h' => 1080, 'type' => 'auth'],
    ['id' => '24', 'name' => '24-auth-reset-password', 'title' => 'Formulir Kata Sandi Baru', 'w' => 1440, 'h' => 1080, 'type' => 'auth'],
    ['id' => '25', 'name' => '25-customer-terms', 'title' => 'Syarat & Ketentuan Layanan', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '26', 'name' => '26-customer-privacy', 'title' => 'Kebijakan Privasi & Data', 'w' => 1440, 'h' => 1400, 'type' => 'customer'],
    ['id' => '27', 'name' => '27-profile-settings', 'title' => 'Pengaturan Profil & Akun', 'w' => 1440, 'h' => 1300, 'type' => 'portal_tenant'],
    ['id' => '28', 'name' => '28-customer-karir', 'title' => 'Karir & Rekrutmen Mitra', 'w' => 1440, 'h' => 1500, 'type' => 'customer']
];

// Reusable SVG Vector Icon Definitions
$vectorPaths = [
    'plane' => 'M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z',
    'search' => 'M11 19a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm10 2-4.35-4.35',
    'bag' => 'M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0',
    'receipt' => 'M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1-2 1zM8 7h8M8 11h8M8 15h5',
    'login' => 'M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3',
    'bell' => 'M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.94 1.94 0 0 0 3.4 0',
    'user' => 'M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm-6.5 10a8.5 8.5 0 0 1 13 0',
    'lock' => 'M3 11h18v11H3zM7 11V7a5 5 0 0 1 10 0v4',
    'mail' => 'M3 5h18v14H3zM3 7l9 6 9-6',
    'check' => 'M20 6 9 17l-5-5',
    'clock' => 'M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20zm0-14v6l4 2',
    'arrow' => 'M5 12h14M12 5l7 7-7 7'
];

foreach ($pages as $p) {
    $pngPath = $tempDir . '/' . $p['name'] . '.png';
    if (!file_exists($pngPath)) {
        echo "Warning: PNG not found for {$p['name']}\n";
        continue;
    }

    $b64 = base64_encode(file_get_contents($pngPath));
    $w = $p['w'];
    $h = $p['h'];
    $title = htmlspecialchars($p['title']);

    // Build Vector Overlay Layers based on Page Type
    $vectorOverlay = '';

    if ($p['type'] === 'customer') {
        $vectorOverlay .= <<<VEC
    <!-- A. TOP NAVBAR VECTOR ICONS (Bisa Diklik & Diedit di Figma) -->
    <g id="Navbar-Vector-Components" transform="translate(0, 0)">
      <!-- Logo Pesawat FlyDine -->
      <g id="Icon-Logo-Pesawat" transform="translate(62, 18)" cursor="pointer">
        <rect width="180" height="40" rx="10" fill="#0284C7"/>
        <path d="{$vectorPaths['plane']}" fill="#FFFFFF" transform="translate(10, 8) scale(0.9)"/>
        <text x="44" y="25" fill="#FFFFFF" font-size="15" font-weight="800">FlyDine Juanda</text>
      </g>
      <!-- Switcher Bahasa -->
      <g id="Component-Language-Switch" transform="translate(860, 20)">
        <rect width="84" height="36" rx="18" fill="#F1F5F9" stroke="#E2E8F0" stroke-width="1"/>
        <rect x="2" y="2" width="40" height="32" rx="16" fill="#0284C7"/>
        <text x="15" y="22" fill="#FFFFFF" font-size="12" font-weight="700">ID</text>
        <text x="54" y="22" fill="#64748B" font-size="12" font-weight="700">EN</text>
      </g>
      <!-- Ikon Keranjang Pesanan -->
      <g id="Icon-Keranjang-Belanja" transform="translate(980, 24)" cursor="pointer">
        <path d="{$vectorPaths['bag']}" fill="none" stroke="#0284C7" stroke-width="2"/>
      </g>
      <!-- Ikon Riwayat -->
      <g id="Icon-Riwayat-Pesanan" transform="translate(1105, 24)" cursor="pointer">
        <path d="{$vectorPaths['receipt']}" fill="none" stroke="#0284C7" stroke-width="2"/>
      </g>
      <!-- Tombol Portal Login -->
      <g id="Icon-Portal-Login" transform="translate(1225, 24)" cursor="pointer">
        <path d="{$vectorPaths['login']}" fill="none" stroke="#0F172A" stroke-width="2"/>
      </g>
    </g>

    <!-- B. QUICK SEARCH & INTERACTIVE VECTOR ICONS -->
    <g id="Search-and-Action-Vectors" transform="translate(0, 0)">
      <g id="Icon-Pencarian" transform="translate(240, 360)">
        <path d="{$vectorPaths['search']}" fill="none" stroke="#0284C7" stroke-width="2"/>
      </g>
      <g id="Icon-Jam-Operasional" transform="translate(180, 520)">
        <path d="{$vectorPaths['clock']}" fill="none" stroke="#64748B" stroke-width="2"/>
      </g>
      <g id="Icon-Ceklis-Verifikasi" transform="translate(220, 520)">
        <path d="{$vectorPaths['check']}" fill="none" stroke="#10B981" stroke-width="2.5"/>
      </g>
    </g>
VEC;
    } elseif ($p['type'] === 'portal_tenant' || $p['type'] === 'portal_admin') {
        $vectorOverlay .= <<<VEC
    <!-- A. PORTAL SIDEBAR VECTOR ICONS (Bisa Diklik & Diedit di Figma) -->
    <g id="Sidebar-Vector-Icons" transform="translate(0, 0)">
      <!-- Logo Sidebar Brand -->
      <g id="Icon-Sidebar-Logo" transform="translate(36, 36)">
        <path d="{$vectorPaths['plane']}" fill="#0EA5E9" transform="scale(1.1)"/>
      </g>
      <!-- Nav 1: Dashboard -->
      <g id="Icon-Nav-Dashboard" transform="translate(36, 134)">
        <rect width="18" height="18" rx="3" fill="none" stroke="#FFFFFF" stroke-width="2"/>
      </g>
      <!-- Nav 2: Orders -->
      <g id="Icon-Nav-Pesanan" transform="translate(36, 188)">
        <path d="{$vectorPaths['bag']}" fill="none" stroke="#94A3B8" stroke-width="2"/>
      </g>
      <!-- Nav 3: Products / Directory -->
      <g id="Icon-Nav-Produk" transform="translate(36, 242)">
        <path d="{$vectorPaths['receipt']}" fill="none" stroke="#94A3B8" stroke-width="2"/>
      </g>
      <!-- Nav Logout -->
      <g id="Icon-Nav-Keluar" transform="translate(36, 990)">
        <path d="{$vectorPaths['login']}" fill="none" stroke="#EF4444" stroke-width="2"/>
      </g>
    </g>

    <!-- B. TOP HEADER VECTOR ICONS -->
    <g id="Header-Vector-Icons" transform="translate(0, 0)">
      <!-- Lonceng Notifikasi -->
      <g id="Icon-Notifikasi-Bell" transform="translate(1160, 28)">
        <path d="{$vectorPaths['bell']}" fill="none" stroke="#64748B" stroke-width="2"/>
      </g>
      <!-- Avatar Profil Pengguna -->
      <g id="Icon-Avatar-User" transform="translate(1220, 26)">
        <path d="{$vectorPaths['user']}" fill="none" stroke="#0284C7" stroke-width="2"/>
      </g>
    </g>
VEC;
    } elseif ($p['type'] === 'auth') {
        $vectorOverlay .= <<<VEC
    <!-- AUTH VECTOR ICONS (Bisa Diklik & Diedit di Figma) -->
    <g id="Auth-Vector-Icons" transform="translate(0, 0)">
      <g id="Icon-Brand-Plane" transform="translate(80, 240)">
        <path d="{$vectorPaths['plane']}" fill="#FFFFFF" transform="scale(1.5)"/>
      </g>
      <g id="Icon-Input-Email" transform="translate(930, 280)">
        <path d="{$vectorPaths['mail']}" fill="none" stroke="#64748B" stroke-width="2"/>
      </g>
      <g id="Icon-Input-Password" transform="translate(930, 370)">
        <path d="{$vectorPaths['lock']}" fill="none" stroke="#64748B" stroke-width="2"/>
      </g>
      <g id="Icon-Submit-Arrow" transform="translate(1220, 530)">
        <path d="{$vectorPaths['arrow']}" fill="none" stroke="#0284C7" stroke-width="2.5"/>
      </g>
    </g>
VEC;
    }

    // Build Asset Kit bar (always included in layer tree)
    $assetKitY = $h - 50;
    $vectorAssetKit = <<<KIT
    <!-- C. EDITABLE VECTOR ICON PALETTE KIT (Semua Aset Vektor Terorganisir) -->
    <g id="Vector-Asset-Palette-Kit" transform="translate(60, {$assetKitY})">
      <rect width="640" height="38" rx="8" fill="#0F172A" opacity="0.9"/>
      <text x="14" y="24" fill="#38BDF8" font-size="11" font-weight="700">VEKTOR IKON FIGMA (EDITABLE):</text>
      <!-- Icon 1: Pesawat -->
      <g id="Asset-Icon-Pesawat" transform="translate(220, 10)">
        <path d="{$vectorPaths['plane']}" fill="#FFFFFF" transform="scale(0.8)"/>
      </g>
      <!-- Icon 2: Search -->
      <g id="Asset-Icon-Search" transform="translate(260, 10)">
        <path d="{$vectorPaths['search']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 3: Bag -->
      <g id="Asset-Icon-Bag" transform="translate(300, 10)">
        <path d="{$vectorPaths['bag']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 4: Receipt -->
      <g id="Asset-Icon-Receipt" transform="translate(340, 10)">
        <path d="{$vectorPaths['receipt']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 5: Bell -->
      <g id="Asset-Icon-Bell" transform="translate(380, 10)">
        <path d="{$vectorPaths['bell']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 6: User -->
      <g id="Asset-Icon-User" transform="translate(420, 10)">
        <path d="{$vectorPaths['user']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 7: Check -->
      <g id="Asset-Icon-Check" transform="translate(460, 10)">
        <path d="{$vectorPaths['check']}" fill="none" stroke="#10B981" stroke-width="2" transform="scale(0.8)"/>
      </g>
      <!-- Icon 8: Lock -->
      <g id="Asset-Icon-Lock" transform="translate(500, 10)">
        <path d="{$vectorPaths['lock']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 9: Mail -->
      <g id="Asset-Icon-Mail" transform="translate(540, 10)">
        <path d="{$vectorPaths['mail']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
      <!-- Icon 10: Clock -->
      <g id="Asset-Icon-Clock" transform="translate(580, 10)">
        <path d="{$vectorPaths['clock']}" fill="none" stroke="#FFFFFF" stroke-width="1.8" transform="scale(0.8)"/>
      </g>
    </g>
KIT;

    // Full Composite SVG: Web Interface (Bottom) + Editable Vectors (Top)
    $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 {$w} {$h}" width="{$w}" height="{$h}" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
  <title>{$title} - FlyDine Juanda</title>

  <!-- ========================================================================= -->
  <!-- 1. LAYER TAMPILAN RESMI WEB (HIGH-FIDELITY PERSIS 100% WEB 127.0.0.1:8000)-->
  <!-- ========================================================================= -->
  <g id="Web-Interface-Mockup" pointer-events="none">
    <image width="{$w}" height="{$h}" xlink:href="data:image/png;base64,{$b64}" />
  </g>

  <!-- ========================================================================= -->
  <!-- 2. LAYER IKON & KOMPONEN VEKTOR DAPAT DIEDIT (100% EDITABLE VECTOR FIGMA) -->
  <!-- ========================================================================= -->
  <g id="Editable-Vector-Icons-and-Layers">
{$vectorOverlay}
{$vectorAssetKit}
  </g>

</svg>
SVG;

    $outFilePath = $outputDir . '/' . $p['name'] . '.svg';
    $publicFilePath = $publicDir . '/' . $p['name'] . '.svg';

    file_put_contents($outFilePath, $svg);
    file_put_contents($publicFilePath, $svg);

    $kb = round(strlen($svg) / 1024, 1);
    echo "Generated High-Fidelity SVG with Vector Icons: {$p['name']}.svg ({$kb} KB)\n";
}

echo "Successfully completed all 28 High-Fidelity SVGs!\n";
