<?php

$outDir = 'C:/Users/Dhidan/Downloads/High-Fidelity';
$pubDir = __DIR__ . '/public/high-fidelity';

foreach ([$outDir, $pubDir] as $d) {
    if (!is_dir($d)) mkdir($d, 0777, true);
}

// Common Defs
$defs = <<<DEFS
  <defs>
    <linearGradient id="hero-blue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="60%" stop-color="#0369A1"/>
      <stop offset="100%" stop-color="#075985"/>
    </linearGradient>
    <linearGradient id="btn-blue" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0EA5E9"/>
    </linearGradient>
    <linearGradient id="banner-amber" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#FEF3C7"/>
      <stop offset="100%" stop-color="#FDE68A"/>
    </linearGradient>
    <linearGradient id="banner-sky" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#E0F2FE"/>
      <stop offset="100%" stop-color="#BAE6FD"/>
    </linearGradient>
    <linearGradient id="banner-emerald" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#ECFDF5"/>
      <stop offset="100%" stop-color="#A7F3D0"/>
    </linearGradient>
    <filter id="soft-shadow" x="-5%" y="-5%" width="110%" height="115%">
      <feDropShadow dx="0" dy="6" stdDeviation="10" flood-color="#0F172A" flood-opacity="0.06"/>
    </filter>
    <filter id="card-shadow" x="-5%" y="-5%" width="110%" height="115%">
      <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#0F172A" flood-opacity="0.08"/>
    </filter>
  </defs>
DEFS;

// Reusable Top Navbar
function getNavbar($activeCart = 2) {
    return <<<NAV
  <g id="Top-Navbar">
    <rect x="0" y="0" width="1440" height="76" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
    
    <!-- Brand Logo FlyDine Juanda -->
    <g id="Navbar-Brand" transform="translate(60, 18)" cursor="pointer">
      <rect width="180" height="40" rx="10" fill="#0284C7"/>
      <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="#FFFFFF" transform="translate(10, 8) scale(0.9)"/>
      <text x="44" y="25" fill="#FFFFFF" font-size="15" font-weight="800">FlyDine Juanda</text>
    </g>

    <!-- Nav Items Right -->
    <g id="Navbar-Menu" transform="translate(860, 20)">
      <!-- Language Switcher ID/EN -->
      <g id="Lang-Switcher" transform="translate(0, 0)" cursor="pointer">
        <rect width="84" height="36" rx="18" fill="#F1F5F9" stroke="#CBD5E1" stroke-width="1"/>
        <rect x="2" y="2" width="40" height="32" rx="16" fill="#0284C7"/>
        <text x="14" y="22" fill="#FFFFFF" font-size="12" font-weight="800">ID</text>
        <text x="54" y="22" fill="#64748B" font-size="12" font-weight="700">EN</text>
      </g>

      <!-- Cart Button -->
      <g id="Nav-Pesanan" transform="translate(110, 0)" cursor="pointer">
        <rect width="115" height="36" rx="8" fill="#F0F9FF" stroke="#BAE6FD" stroke-width="1"/>
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0" fill="none" stroke="#0284C7" stroke-width="1.8" transform="translate(10, 8) scale(0.75)"/>
        <text x="36" y="23" fill="#0284C7" font-size="13" font-weight="700">Pesanan</text>
        <circle cx="100" cy="18" r="9" fill="#0284C7"/>
        <text x="100" y="22" text-anchor="middle" fill="#FFFFFF" font-size="11" font-weight="800">{$activeCart}</text>
      </g>

      <!-- History Button -->
      <g id="Nav-Riwayat" transform="translate(245, 0)" cursor="pointer">
        <rect width="100" height="36" rx="8" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
        <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1-2 1zM8 7h8M8 11h8M8 15h5" fill="none" stroke="#64748B" stroke-width="1.8" transform="translate(10, 8) scale(0.75)"/>
        <text x="34" y="23" fill="#475569" font-size="13" font-weight="600">Riwayat</text>
      </g>

      <!-- Staff Login Portal -->
      <g id="Nav-Staff-Login" transform="translate(365, 0)" cursor="pointer">
        <rect width="130" height="36" rx="8" fill="#0F172A"/>
        <text x="22" y="23" fill="#FFFFFF" font-size="13" font-weight="700">Portal Login</text>
        <path d="m9 18 6-6-6-6" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" transform="translate(105, 9) scale(0.7)"/>
      </g>
    </g>
  </g>
NAV;
}

// -----------------------------------------------------------------------------
// 01. DASHBOARD
// -----------------------------------------------------------------------------
require_once __DIR__ . '/generate_hifi_vector_01.php';
$svg01 = getHiFiDashboardSvg();
file_put_contents($outDir . '/01-dashboard.svg', $svg01);
file_put_contents($pubDir . '/01-dashboard.svg', $svg01);
echo "01-dashboard.svg successfully written as 100% Vector.\n";

// -----------------------------------------------------------------------------
// 02. CUSTOMER CATALOG FULL
// -----------------------------------------------------------------------------
$navbar = getNavbar(2);
$svg02 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 1800" width="1440" height="1800" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
{$defs}
{$navbar}

  <!-- HERO BANNER -->
  <g id="Hero-Section" transform="translate(0, 76)">
    <rect width="1440" height="280" fill="url(#hero-blue)"/>
    <g transform="translate(80, 50)">
      <rect width="140" height="30" rx="6" fill="#FFFFFF" fill-opacity="0.15"/>
      <text x="14" y="20" fill="#E0F2FE" font-size="12" font-weight="800" letter-spacing="0.05em">DIREKTORI GERAI</text>
      <text x="0" y="80" fill="#FFFFFF" font-size="36" font-weight="900" letter-spacing="-0.02em">Katalog Kuliner Bandara Juanda</text>
      <text x="0" y="115" fill="#BAE6FD" font-size="16">Temukan puluhan pilihan makanan, minuman, dan oleh-oleh khas di Terminal 1 &amp; 2</text>
    </g>

    <!-- FLOATING FILTER BAR -->
    <g id="Floating-Filter-Bar" transform="translate(80, 230)">
      <rect width="1280" height="76" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <!-- Filter 1: Terminal -->
      <g transform="translate(30, 16)">
        <text x="0" y="14" fill="#64748B" font-size="11" font-weight="700">TERMINAL</text>
        <text x="0" y="34" fill="#0F172A" font-size="14" font-weight="700">Semua Terminal</text>
        <path d="m6 9 6 6 6-6" fill="none" stroke="#0284C7" stroke-width="2" transform="translate(115, 20) scale(0.8)"/>
      </g>
      <line x1="180" y1="16" x2="180" y2="60" stroke="#E2E8F0" stroke-width="1"/>
      <!-- Filter 2: Area -->
      <g transform="translate(210, 16)">
        <text x="0" y="14" fill="#64748B" font-size="11" font-weight="700">AREA GATE</text>
        <text x="0" y="34" fill="#0F172A" font-size="14" font-weight="700">Keberangkatan &amp; Kedatangan</text>
        <path d="m6 9 6 6 6-6" fill="none" stroke="#0284C7" stroke-width="2" transform="translate(195, 20) scale(0.8)"/>
      </g>
      <line x1="435" y1="16" x2="435" y2="60" stroke="#E2E8F0" stroke-width="1"/>
      <!-- Search Input -->
      <g transform="translate(465, 16)">
        <text x="0" y="14" fill="#64748B" font-size="11" font-weight="700">CARI GERAI / MENU</text>
        <text x="0" y="34" fill="#94A3B8" font-size="14">Ketik nama restoran, kopi, atau makanan...</text>
      </g>
      <!-- Search Button -->
      <g transform="translate(1130, 14)" cursor="pointer">
        <rect width="120" height="48" rx="10" fill="#0284C7"/>
        <text x="36" y="30" fill="#FFFFFF" font-size="14" font-weight="800">Cari Gerai</text>
      </g>
    </g>
  </g>

  <!-- CATEGORY PILLS -->
  <g id="Category-Pills" transform="translate(80, 420)">
    <g transform="translate(0, 0)"><rect width="130" height="42" rx="21" fill="#0284C7"/><text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Semua Gerai</text></g>
    <g transform="translate(145, 0)"><rect width="130" height="42" rx="21" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/><text x="26" y="26" fill="#475569" font-size="13" font-weight="600">Fast Food (18)</text></g>
    <g transform="translate(290, 0)"><rect width="145" height="42" rx="21" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/><text x="24" y="26" fill="#475569" font-size="13" font-weight="600">Coffee &amp; Cafe (24)</text></g>
    <g transform="translate(450, 0)"><rect width="155" height="42" rx="21" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/><text x="24" y="26" fill="#475569" font-size="13" font-weight="600">Indonesian Food (16)</text></g>
    <g transform="translate(620, 0)"><rect width="145" height="42" rx="21" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/><text x="24" y="26" fill="#475569" font-size="13" font-weight="600">Bakery &amp; Cake (12)</text></g>
  </g>

  <!-- TENANT CARDS GRID -->
  <g id="Tenant-Grid" transform="translate(80, 490)">
    <!-- Card 1 -->
    <g id="Card-AW" transform="translate(0, 0)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-amber)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 1</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">A&amp;W Restaurant</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Fast Food • Gate 1-3 Keberangkatan</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.8</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi masak: 15 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>

    <!-- Card 2 -->
    <g id="Card-Starbucks" transform="translate(435, 0)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-emerald)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 1</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">Starbucks Coffee</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Coffee &amp; Pastry • Gate 4-6</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.9</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi saji: 8 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>

    <!-- Card 3 -->
    <g id="Card-RotiO" transform="translate(870, 0)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-sky)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 2</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">Roti O Juanda</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Bakery &amp; Drinks • Lantai 1</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.7</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi saji: 5 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>

    <!-- Row 2 -->
    <!-- Card 4 -->
    <g id="Card-KopiKenangan" transform="translate(0, 390)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-sky)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 2</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">Kopi Kenangan</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Beverages • Gate 8</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.8</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi saji: 7 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>

    <!-- Card 5 -->
    <g id="Card-CFC" transform="translate(435, 390)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-amber)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 1</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">CFC Juanda</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Fast Food • Kedatangan T1</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.6</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi masak: 12 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>

    <!-- Card 6 -->
    <g id="Card-Chatime" transform="translate(870, 390)">
      <rect width="405" height="360" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="150" rx="16" fill="url(#banner-emerald)"/>
      <rect x="20" y="20" width="80" height="26" rx="6" fill="#0F172A" opacity="0.8"/>
      <text x="32" y="37" fill="#FFFFFF" font-size="11" font-weight="700">TERMINAL 2</text>
      <text x="24" y="190" fill="#0F172A" font-size="18" font-weight="800">Chatime Terminal 2</text>
      <text x="24" y="215" fill="#64748B" font-size="13">Boba &amp; Milk Tea • Gate 5</text>
      <text x="24" y="245" fill="#F59E0B" font-size="14" font-weight="700">★ 4.8</text>
      <text x="68" y="245" fill="#64748B" font-size="13">• Estimasi saji: 10 mnt</text>
      <rect x="24" y="280" width="110" height="34" rx="8" fill="#ECFDF5"/>
      <text x="38" y="302" fill="#059669" font-size="12" font-weight="700">● Buka Sekarang</text>
      <g transform="translate(260, 275)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">Lihat Menu</text>
      </g>
    </g>
  </g>

  <!-- PAGINATION -->
  <g id="Pagination" transform="translate(600, 1320)">
    <rect width="40" height="40" rx="8" fill="#FFFFFF" stroke="#E2E8F0"/><text x="15" y="25" fill="#64748B" font-weight="700">«</text>
    <g transform="translate(50, 0)"><rect width="40" height="40" rx="8" fill="#0284C7"/><text x="16" y="25" fill="#FFFFFF" font-weight="800">1</text></g>
    <g transform="translate(100, 0)"><rect width="40" height="40" rx="8" fill="#FFFFFF" stroke="#E2E8F0"/><text x="16" y="25" fill="#475569" font-weight="700">2</text></g>
    <g transform="translate(150, 0)"><rect width="40" height="40" rx="8" fill="#FFFFFF" stroke="#E2E8F0"/><text x="16" y="25" fill="#475569" font-weight="700">3</text></g>
    <g transform="translate(200, 0)"><rect width="40" height="40" rx="8" fill="#FFFFFF" stroke="#E2E8F0"/><text x="15" y="25" fill="#64748B" font-weight="700">»</text></g>
  </g>

  <!-- FOOTER -->
  <g id="Footer" transform="translate(0, 1420)">
    <rect width="1440" height="380" fill="#0F172A"/>
    <g transform="translate(80, 60)">
      <text x="0" y="24" fill="#FFFFFF" font-size="20" font-weight="800">FlyDine Bandara Juanda</text>
      <text x="0" y="55" fill="#94A3B8" font-size="14">Platform Resmi Layanan Pemesanan F&amp;B Bandara Internasional Juanda</text>
      <text x="0" y="120" fill="#64748B" font-size="13">© 2026 PT Angkasa Pura Indonesia • InJourney Airports</text>
    </g>
  </g>

</svg>
SVG;
file_put_contents($outDir . '/02-customer-catalog-full.svg', $svg02);
file_put_contents($pubDir . '/02-customer-catalog-full.svg', $svg02);
echo "02-customer-catalog-full.svg successfully written as 100% Vector.\n";

// -----------------------------------------------------------------------------
// 03. DETAIL TENANT & MENU RESTORAN
// -----------------------------------------------------------------------------
$svg03 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 1850" width="1440" height="1850" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
{$defs}
{$navbar}

  <!-- GRAND TENANT HERO SHOWCASE -->
  <g id="Tenant-Hero" transform="translate(0, 76)">
    <rect width="1440" height="340" fill="url(#hero-blue)"/>
    
    <!-- Back to catalog button -->
    <g transform="translate(80, 25)" cursor="pointer">
      <rect width="210" height="36" rx="18" fill="#FFFFFF" fill-opacity="0.15" stroke="#FFFFFF" stroke-opacity="0.3"/>
      <text x="24" y="23" fill="#FFFFFF" font-size="13" font-weight="700">← Kembali ke Katalog</text>
    </g>

    <g transform="translate(80, 85)">
      <!-- Tenant Logo Badge -->
      <rect width="120" height="120" rx="20" fill="#FFFFFF" filter="url(#card-shadow)"/>
      <rect x="12" y="12" width="96" height="96" rx="14" fill="#FEF3C7"/>
      <text x="60" y="68" text-anchor="middle" fill="#B45309" font-size="32" font-weight="900">A&amp;W</text>

      <!-- Details -->
      <g transform="translate(150, 0)">
        <g transform="translate(0, 0)">
          <rect width="150" height="28" rx="14" fill="#FFFFFF" fill-opacity="0.2"/>
          <text x="16" y="19" fill="#FFFFFF" font-size="12" font-weight="700">Terminal 1 • Gate 1-3</text>

          <g transform="translate(165, 0)">
            <rect width="130" height="28" rx="14" fill="#FFFFFF" fill-opacity="0.2"/>
            <text x="16" y="19" fill="#FFFFFF" font-size="12" font-weight="700">Fast Food &amp; Diner</text>
          </g>

          <g transform="translate(310, 0)">
            <rect width="130" height="28" rx="14" fill="#10B981"/>
            <text x="16" y="19" fill="#FFFFFF" font-size="12" font-weight="800">● Buka Sekarang</text>
          </g>

          <g transform="translate(455, 0)">
            <rect width="150" height="28" rx="14" fill="#FFFFFF" fill-opacity="0.2"/>
            <text x="16" y="19" fill="#FFFFFF" font-size="12" font-weight="700">Garansi SLA 15 Mnt</text>
          </g>
        </g>

        <text x="0" y="65" fill="#FFFFFF" font-size="32" font-weight="900">A&amp;W Restaurant - Terminal 1</text>
        <text x="0" y="95" fill="#BAE6FD" font-size="15">Nikmati Golden Aroma Chicken, Mozza Burger legendaris, dan AW Root Beer Float sebelum penerbangan Anda.</text>
        <text x="0" y="125" fill="#E0F2FE" font-size="13">Buka: 06:00 - 22:00 WIB • Menerima Pengantaran Porter ke Gate Ruang Tunggu</text>
      </g>
    </g>
  </g>

  <!-- CATEGORY TABS -->
  <g id="Menu-Category-Tabs" transform="translate(80, 440)">
    <g transform="translate(0, 0)"><rect width="150" height="44" rx="22" fill="#0284C7"/><text x="24" y="27" fill="#FFFFFF" font-size="13" font-weight="700">Semua Menu (18)</text></g>
    <g transform="translate(165, 0)"><rect width="160" height="44" rx="22" fill="#FFFFFF" stroke="#E2E8F0"/><text x="24" y="27" fill="#475569" font-size="13" font-weight="600">Aroma Chicken (6)</text></g>
    <g transform="translate(340, 0)"><rect width="130" height="44" rx="22" fill="#FFFFFF" stroke="#E2E8F0"/><text x="24" y="27" fill="#475569" font-size="13" font-weight="600">Burgers (5)</text></g>
    <g transform="translate(485, 0)"><rect width="140" height="44" rx="22" fill="#FFFFFF" stroke="#E2E8F0"/><text x="24" y="27" fill="#475569" font-size="13" font-weight="600">Beverages (4)</text></g>
    <g transform="translate(640, 0)"><rect width="150" height="44" rx="22" fill="#FFFFFF" stroke="#E2E8F0"/><text x="24" y="27" fill="#475569" font-size="13" font-weight="600">Waffle &amp; Desserts</text></g>
  </g>

  <!-- MENU ITEMS GRID -->
  <g id="Menu-Items-Grid" transform="translate(80, 510)">
    <!-- Item 1 -->
    <g id="Menu-Item-1" transform="translate(0, 0)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-amber)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">2 Pcs Golden Aroma Chicken</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Ayam goreng renyah dengan bumbu khas A&amp;W gurih meresap.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 45.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>

    <!-- Item 2 -->
    <g id="Menu-Item-2" transform="translate(435, 0)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-amber)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">Mozza Burger Special</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Burger daging sapi premium dengan keju mozzarella lumer.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 38.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>

    <!-- Item 3 -->
    <g id="Menu-Item-3" transform="translate(870, 0)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-sky)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">AW Root Beer Float Large</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Minuman soda khas A&amp;W disajikan dengan es krim vanila lembut.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 22.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>

    <!-- Row 2 -->
    <!-- Item 4 -->
    <g id="Menu-Item-4" transform="translate(0, 410)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-sky)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">Waffle with Ice Cream</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Waffle hangat renyah disajikan dengan es krim vanila dan saus cokelat.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 32.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>

    <!-- Item 5 -->
    <g id="Menu-Item-5" transform="translate(435, 410)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-amber)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">Curly Fries Large</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Kentang goreng spiral renyah dengan rasa bumbu gurih khas.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 28.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>

    <!-- Item 6 -->
    <g id="Menu-Item-6" transform="translate(870, 410)">
      <rect width="405" height="380" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <rect width="405" height="160" rx="16" fill="url(#banner-amber)"/>
      <text x="24" y="195" fill="#0F172A" font-size="17" font-weight="800">Mushroom Beef Burger</text>
      <text x="24" y="222" fill="#64748B" font-size="13">Daging sapi panggang gurih dengan saus jamur kental lezat.</text>
      <text x="24" y="260" fill="#0284C7" font-size="20" font-weight="900">Rp 42.000</text>
      <g transform="translate(260, 315)" cursor="pointer">
        <rect width="120" height="42" rx="10" fill="#0284C7"/>
        <text x="24" y="26" fill="#FFFFFF" font-size="13" font-weight="700">+ Tambah</text>
      </g>
    </g>
  </g>

  <!-- STICKY FLOATING CART BAR AT BOTTOM -->
  <g id="Floating-Cart-Bar" transform="translate(240, 1400)">
    <rect width="960" height="74" rx="37" fill="#0F172A" filter="url(#card-shadow)"/>
    <g transform="translate(40, 18)">
      <circle cx="18" cy="18" r="18" fill="#0284C7"/>
      <text x="18" y="23" text-anchor="middle" fill="#FFFFFF" font-size="13" font-weight="900">2</text>
      <text x="50" y="16" fill="#94A3B8" font-size="12">Keranjang Belanja A&amp;W</text>
      <text x="50" y="32" fill="#FFFFFF" font-size="15" font-weight="800">Total: Rp 67.000 (2 Hidangan)</text>
    </g>
    <g transform="translate(760, 14)" cursor="pointer">
      <rect width="165" height="46" rx="23" fill="#0284C7"/>
      <text x="32" y="28" fill="#FFFFFF" font-size="14" font-weight="800">Lihat Keranjang →</text>
    </g>
  </g>

  <!-- FOOTER -->
  <g id="Footer" transform="translate(0, 1550)">
    <rect width="1440" height="300" fill="#0F172A"/>
    <g transform="translate(80, 60)">
      <text x="0" y="24" fill="#FFFFFF" font-size="20" font-weight="800">FlyDine Bandara Juanda</text>
      <text x="0" y="55" fill="#94A3B8" font-size="14">Platform Resmi Layanan Pemesanan F&amp;B Bandara Internasional Juanda</text>
      <text x="0" y="100" fill="#64748B" font-size="13">© 2026 PT Angkasa Pura Indonesia • InJourney Airports</text>
    </g>
  </g>

</svg>
SVG;
file_put_contents($outDir . '/03-customer-tenant-menu.svg', $svg03);
file_put_contents($pubDir . '/03-customer-tenant-menu.svg', $svg03);
echo "03-customer-tenant-menu.svg successfully written as 100% Vector.\n";

// -----------------------------------------------------------------------------
// 04. CUSTOMER CART & CHECKOUT
// -----------------------------------------------------------------------------
$svg04 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 1600" width="1440" height="1600" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
{$defs}
{$navbar}

  <!-- PAGE HEADER -->
  <g id="Cart-Page-Header" transform="translate(80, 110)">
    <text x="0" y="24" fill="#0F172A" font-size="28" font-weight="900">Keranjang &amp; Checkout Pesanan</text>
    <text x="0" y="50" fill="#64748B" font-size="15">Periksa pesanan Anda dan tentukan metode pengantaran ke gate penerbangan</text>
  </g>

  <!-- DUAL COLUMN LAYOUT -->
  <g id="Checkout-Columns" transform="translate(80, 190)">
    
    <!-- LEFT COLUMN: ORDER ITEMS & CUSTOMER FORM (820px) -->
    <g id="Left-Column" transform="translate(0, 0)">
      <!-- Card Gerai Terpilih -->
      <g id="Tenant-Header-Card">
        <rect width="820" height="74" rx="14" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
        <rect x="20" y="18" width="38" height="38" rx="8" fill="#FEF3C7"/>
        <text x="39" y="42" text-anchor="middle" fill="#B45309" font-size="14" font-weight="900">AW</text>
        <text x="74" y="34" fill="#0F172A" font-size="16" font-weight="800">A&amp;W Restaurant</text>
        <text x="74" y="52" fill="#64748B" font-size="12">Terminal 1 • Keberangkatan Gate 1-3</text>
      </g>

      <!-- Card Item 1 -->
      <g id="Cart-Item-1" transform="translate(0, 94)">
        <rect width="820" height="110" rx="14" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
        <rect x="20" y="18" width="74" height="74" rx="10" fill="url(#banner-amber)"/>
        <text x="110" y="42" fill="#0F172A" font-size="16" font-weight="800">2 Pcs Golden Aroma Chicken</text>
        <text x="110" y="64" fill="#64748B" font-size="13">Pilihan rasa: Golden Aroma (Original)</text>
        <text x="110" y="86" fill="#0284C7" font-size="16" font-weight="900">Rp 45.000</text>
        <!-- Counter Buttons -->
        <g transform="translate(680, 36)">
          <rect width="36" height="36" rx="8" fill="#F1F5F9"/><text x="14" y="23" fill="#64748B" font-weight="800">-</text>
          <text x="56" y="23" fill="#0F172A" font-weight="800">1</text>
          <g transform="translate(76, 0)"><rect width="36" height="36" rx="8" fill="#0284C7"/><text x="13" y="23" fill="#FFFFFF" font-weight="800">+</text></g>
        </g>
      </g>

      <!-- Card Item 2 -->
      <g id="Cart-Item-2" transform="translate(0, 224)">
        <rect width="820" height="110" rx="14" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
        <rect x="20" y="18" width="74" height="74" rx="10" fill="url(#banner-sky)"/>
        <text x="110" y="42" fill="#0F172A" font-size="16" font-weight="800">AW Root Beer Float Large</text>
        <text x="110" y="64" fill="#64748B" font-size="13">Ukuran: Large • Tambahan: Ekstra Vanila Float</text>
        <text x="110" y="86" fill="#0284C7" font-size="16" font-weight="900">Rp 22.000</text>
        <!-- Counter Buttons -->
        <g transform="translate(680, 36)">
          <rect width="36" height="36" rx="8" fill="#F1F5F9"/><text x="14" y="23" fill="#64748B" font-weight="800">-</text>
          <text x="56" y="23" fill="#0F172A" font-weight="800">1</text>
          <g transform="translate(76, 0)"><rect width="36" height="36" rx="8" fill="#0284C7"/><text x="13" y="23" fill="#FFFFFF" font-weight="800">+</text></g>
        </g>
      </g>

      <!-- Card Metode Pengambilan -->
      <g id="Card-Delivery-Method" transform="translate(0, 354)">
        <rect width="820" height="210" rx="14" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
        <text x="24" y="34" fill="#0F172A" font-size="16" font-weight="800">Pilih Metode Pengambilan</text>
        
        <!-- Option 1: Porter Gate Delivery (Selected) -->
        <g transform="translate(24, 54)">
          <rect width="772" height="64" rx="10" fill="#F0F9FF" stroke="#0284C7" stroke-width="2"/>
          <circle cx="28" cy="32" r="10" fill="#0284C7"/>
          <circle cx="28" cy="32" r="4" fill="#FFFFFF"/>
          <text x="52" y="28" fill="#0F172A" font-size="14" font-weight="800">Diantar Porter Resmi ke Gate Penerbangan</text>
          <text x="52" y="48" fill="#64748B" font-size="12">Makanan diantar langsung ke kursi tunggu gate Anda (+ Rp 10.000)</text>
        </g>

        <!-- Option 2: Self Pickup -->
        <g transform="translate(24, 130)">
          <rect width="772" height="60" rx="10" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
          <circle cx="28" cy="30" r="10" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="2"/>
          <text x="52" y="26" fill="#0F172A" font-size="14" font-weight="700">Ambil Sendiri di Gerai (Self Pickup)</text>
          <text x="52" y="44" fill="#64748B" font-size="12">Ambil di counter A&amp;W Terminal 1 tanpa biaya pengantaran</text>
        </g>
      </g>

      <!-- Card Data Penumpang & Gate -->
      <g id="Card-Customer-Details" transform="translate(0, 584)">
        <rect width="820" height="260" rx="14" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
        <text x="24" y="34" fill="#0F172A" font-size="16" font-weight="800">Informasi Pemesan &amp; Penerbangan</text>
        
        <!-- Field 1: Nama -->
        <g transform="translate(24, 54)">
          <text x="0" y="14" fill="#64748B" font-size="12" font-weight="700">NAMA LENGKAP PENUMPANG</text>
          <rect y="22" width="370" height="46" rx="8" fill="#F8FAFC" stroke="#CBD5E1" stroke-width="1"/>
          <text x="16" y="50" fill="#0F172A" font-size="14" font-weight="600">Ahmad Dhidan</text>
        </g>

        <!-- Field 2: WA -->
        <g transform="translate(424, 54)">
          <text x="0" y="14" fill="#64748B" font-size="12" font-weight="700">NOMOR WHATSAPP (UPDATE STATUS)</text>
          <rect y="22" width="372" height="46" rx="8" fill="#F8FAFC" stroke="#CBD5E1" stroke-width="1"/>
          <text x="16" y="50" fill="#0F172A" font-size="14" font-weight="600">0858-0833-0777</text>
        </g>

        <!-- Field 3: Flight No & Gate -->
        <g transform="translate(24, 140)">
          <text x="0" y="14" fill="#64748B" font-size="12" font-weight="700">NOMOR PENERBANGAN &amp; GATE TUJUAN</text>
          <rect y="22" width="772" height="46" rx="8" fill="#F8FAFC" stroke="#CBD5E1" stroke-width="1"/>
          <text x="16" y="50" fill="#0F172A" font-size="14" font-weight="600">Garuda Indonesia GA-312 (Gate 3 - Terminal 1 Keberangkatan)</text>
        </g>
      </g>
    </g>

    <!-- RIGHT COLUMN: PAYMENT SUMMARY (420px) -->
    <g id="Right-Column-Summary" transform="translate(860, 0)">
      <rect width="420" height="480" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <g transform="translate(28, 34)">
        <text x="0" y="10" fill="#0F172A" font-size="18" font-weight="900">Ringkasan Pembayaran</text>
        
        <g transform="translate(0, 40)">
          <text x="0" y="0" fill="#64748B" font-size="14">Subtotal Pesanan (2 item)</text>
          <text x="364" y="0" text-anchor="end" fill="#0F172A" font-size="14" font-weight="700">Rp 67.000</text>
          
          <text x="0" y="32" fill="#64748B" font-size="14">Biaya Pengantaran Porter</text>
          <text x="364" y="32" text-anchor="end" fill="#0F172A" font-size="14" font-weight="700">Rp 10.000</text>

          <text x="0" y="64" fill="#64748B" font-size="14">Biaya Layanan Platform</text>
          <text x="364" y="64" text-anchor="end" fill="#0F172A" font-size="14" font-weight="700">Rp 2.000</text>

          <line x1="0" y1="85" x2="364" y2="85" stroke="#E2E8F0" stroke-width="1"/>

          <text x="0" y="120" fill="#0F172A" font-size="16" font-weight="900">Total Pembayaran</text>
          <text x="364" y="120" text-anchor="end" fill="#0284C7" font-size="24" font-weight="900">Rp 79.000</text>
        </g>

        <!-- Method Badge -->
        <g transform="translate(0, 210)">
          <rect width="364" height="60" rx="10" fill="#F8FAFC" stroke="#CBD5E1" stroke-width="1"/>
          <rect x="16" y="14" width="48" height="32" rx="6" fill="#0284C7"/>
          <text x="40" y="35" text-anchor="middle" fill="#FFFFFF" font-size="12" font-weight="900">QRIS</text>
          <text x="76" y="28" fill="#0F172A" font-size="13" font-weight="800">QRIS Dinamis Resmi</text>
          <text x="76" y="44" fill="#64748B" font-size="11">BCA, Mandiri, GoPay, OVO, ShopeePay</text>
        </g>

        <!-- Submit Button -->
        <g transform="translate(0, 300)" cursor="pointer">
          <rect width="364" height="52" rx="12" fill="#0284C7"/>
          <text x="182" y="32" text-anchor="middle" fill="#FFFFFF" font-size="16" font-weight="800">Lanjut Bayar QRIS →</text>
        </g>

        <text x="182" y="380" text-anchor="middle" fill="#94A3B8" font-size="11">🔒 Transaksi Terenkripsi &amp; Terverifikasi Otomatis</text>
      </g>
    </g>
  </g>

  <!-- FOOTER -->
  <g id="Footer" transform="translate(0, 1300)">
    <rect width="1440" height="300" fill="#0F172A"/>
    <g transform="translate(80, 60)">
      <text x="0" y="24" fill="#FFFFFF" font-size="20" font-weight="800">FlyDine Bandara Juanda</text>
      <text x="0" y="55" fill="#94A3B8" font-size="14">Platform Resmi Layanan Pemesanan F&amp;B Bandara Internasional Juanda</text>
      <text x="0" y="100" fill="#64748B" font-size="13">© 2026 PT Angkasa Pura Indonesia • InJourney Airports</text>
    </g>
  </g>

</svg>
SVG;
file_put_contents($outDir . '/04-customer-cart.svg', $svg04);
file_put_contents($pubDir . '/04-customer-cart.svg', $svg04);
echo "04-customer-cart.svg successfully written as 100% Vector.\n";

// -----------------------------------------------------------------------------
// 05. ORDER TRACKING & QRIS PAYMENT
// -----------------------------------------------------------------------------
$svg05 = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 1600" width="1440" height="1600" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
{$defs}
{$navbar}

  <!-- ORDER STATUS HEADER -->
  <g id="Tracking-Header" transform="translate(80, 110)">
    <rect width="180" height="30" rx="6" fill="#EFF6FF" stroke="#BAE6FD" stroke-width="1"/>
    <text x="16" y="20" fill="#0284C7" font-size="12" font-weight="800">STATUS TRANSAKSI RESMI</text>
    <text x="0" y="70" fill="#0F172A" font-size="32" font-weight="900">Pesanan #ORD-GSMMIY</text>
    <text x="0" y="98" fill="#64748B" font-size="15">A&amp;W Restaurant • Terminal 1 Keberangkatan • Gate 3</text>
  </g>

  <!-- STEPPER PROGRESS BAR (4 TAHAP) -->
  <g id="Status-Stepper" transform="translate(80, 240)">
    <rect width="1280" height="120" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
    
    <!-- Connect lines -->
    <line x1="200" y1="50" x2="480" y2="50" stroke="#10B981" stroke-width="4"/>
    <line x1="480" y1="50" x2="780" y2="50" stroke="#0284C7" stroke-width="4" stroke-dasharray="6 6"/>
    <line x1="780" y1="50" x2="1080" y2="50" stroke="#E2E8F0" stroke-width="4"/>

    <!-- Step 1: Pembayaran (Complete) -->
    <g transform="translate(180, 30)">
      <circle cx="20" cy="20" r="20" fill="#10B981"/>
      <path d="M12 20l6 6 12-12" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round"/>
      <text x="20" y="55" text-anchor="middle" fill="#0F172A" font-size="13" font-weight="800">1. Pembayaran Berhasil</text>
      <text x="20" y="72" text-anchor="middle" fill="#10B981" font-size="11" font-weight="700">QRIS Dikonfirmasi</text>
    </g>

    <!-- Step 2: Dapur Masak (Active) -->
    <g transform="translate(480, 30)">
      <circle cx="20" cy="20" r="20" fill="#0284C7"/>
      <circle cx="20" cy="20" r="6" fill="#FFFFFF"/>
      <text x="20" y="55" text-anchor="middle" fill="#0284C7" font-size="13" font-weight="900">2. Sedang Dimasak</text>
      <text x="20" y="72" text-anchor="middle" fill="#0284C7" font-size="11" font-weight="700">Dapur A&amp;W Sedang Menyiapkan</text>
    </g>

    <!-- Step 3: Siap Diantar Porter -->
    <g transform="translate(780, 30)">
      <circle cx="20" cy="20" r="20" fill="#F1F5F9" stroke="#CBD5E1" stroke-width="2"/>
      <text x="20" y="25" text-anchor="middle" fill="#94A3B8" font-size="13" font-weight="700">3</text>
      <text x="20" y="55" text-anchor="middle" fill="#64748B" font-size="13" font-weight="600">3. Siap Diantar</text>
      <text x="20" y="72" text-anchor="middle" fill="#94A3B8" font-size="11">Porter Mengantar ke Gate 3</text>
    </g>

    <!-- Step 4: Selesai -->
    <g transform="translate(1080, 30)">
      <circle cx="20" cy="20" r="20" fill="#F1F5F9" stroke="#CBD5E1" stroke-width="2"/>
      <text x="20" y="25" text-anchor="middle" fill="#94A3B8" font-size="13" font-weight="700">4</text>
      <text x="20" y="55" text-anchor="middle" fill="#64748B" font-size="13" font-weight="600">4. Pesanan Selesai</text>
      <text x="20" y="72" text-anchor="middle" fill="#94A3B8" font-size="11">Diterima di Gate</text>
    </g>
  </g>

  <!-- MAIN DUAL CARD (QRIS & DETAIL PESANAN) -->
  <g id="Tracking-Content" transform="translate(80, 400)">
    
    <!-- LEFT CARD: QRIS / STATUS BAYAR (580px) -->
    <g id="QRIS-Payment-Card" transform="translate(0, 0)">
      <rect width="580" height="620" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <g transform="translate(40, 40)">
        <text x="0" y="10" fill="#0F172A" font-size="20" font-weight="900">Pembayaran QRIS</text>
        <text x="0" y="32" fill="#64748B" font-size="13">Pindai kode QRIS di bawah menggunakan e-Wallet atau m-Banking Anda</text>

        <!-- QRIS Box -->
        <g transform="translate(100, 60)">
          <rect width="300" height="300" rx="14" fill="#F8FAFC" stroke="#0284C7" stroke-width="2"/>
          <!-- Vector QR Patterns Mock -->
          <rect x="25" y="25" width="60" height="60" fill="#0F172A" rx="6"/>
          <rect x="35" y="35" width="40" height="40" fill="#FFFFFF" rx="4"/>
          <rect x="43" y="43" width="24" height="24" fill="#0F172A" rx="2"/>

          <rect x="215" y="25" width="60" height="60" fill="#0F172A" rx="6"/>
          <rect x="225" y="35" width="40" height="40" fill="#FFFFFF" rx="4"/>
          <rect x="233" y="43" width="24" height="24" fill="#0F172A" rx="2"/>

          <rect x="25" y="215" width="60" height="60" fill="#0F172A" rx="6"/>
          <rect x="35" y="225" width="40" height="40" fill="#FFFFFF" rx="4"/>
          <rect x="43" y="233" width="24" height="24" fill="#0F172A" rx="2"/>

          <!-- Center Logo -->
          <circle cx="150" cy="150" r="28" fill="#0284C7"/>
          <text x="150" y="155" text-anchor="middle" fill="#FFFFFF" font-size="12" font-weight="900">QRIS</text>
        </g>

        <!-- Countdown Timer -->
        <g transform="translate(100, 380)">
          <rect width="300" height="44" rx="8" fill="#FEF3C7" stroke="#FDE68A" stroke-width="1"/>
          <text x="150" y="27" text-anchor="middle" fill="#B45309" font-size="14" font-weight="800">⏱ Sisa Waktu Bayar: 14:32</text>
        </g>

        <!-- Total Price -->
        <g transform="translate(0, 460)">
          <text x="250" y="10" text-anchor="middle" fill="#64748B" font-size="13">Total Tagihan Pesanan</text>
          <text x="250" y="42" text-anchor="middle" fill="#0284C7" font-size="28" font-weight="900">Rp 79.000</text>
        </g>
      </g>
    </g>

    <!-- RIGHT CARD: ORDER DETAILS & ACTION (660px) -->
    <g id="Order-Details-Card" transform="translate(620, 0)">
      <rect width="660" height="620" rx="16" fill="#FFFFFF" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"/>
      <g transform="translate(40, 40)">
        <text x="0" y="10" fill="#0F172A" font-size="20" font-weight="900">Rincian Pengantaran</text>
        
        <g transform="translate(0, 40)">
          <text x="0" y="0" fill="#64748B" font-size="13">Gerai Restoran</text>
          <text x="0" y="22" fill="#0F172A" font-size="15" font-weight="800">A&amp;W Restaurant - Terminal 1</text>

          <text x="0" y="60" fill="#64748B" font-size="13">Penerbangan &amp; Lokasi Antar</text>
          <text x="0" y="82" fill="#0F172A" font-size="15" font-weight="800">Garuda Indonesia GA-312 • Gate 3 Keberangkatan</text>

          <text x="0" y="120" fill="#64748B" font-size="13">Nama Penumpang &amp; Kontak</text>
          <text x="0" y="142" fill="#0F172A" font-size="15" font-weight="800">Ahmad Dhidan (0858-0833-0777)</text>

          <line x1="0" y1="175" x2="580" y2="175" stroke="#E2E8F0" stroke-width="1"/>

          <!-- Items list -->
          <text x="0" y="210" fill="#0F172A" font-size="16" font-weight="800">Menu yang Dipesan</text>
          <text x="0" y="240" fill="#475569" font-size="14">1x 2 Pcs Golden Aroma Chicken</text>
          <text x="580" y="240" text-anchor="end" fill="#0F172A" font-size="14" font-weight="700">Rp 45.000</text>
          
          <text x="0" y="270" fill="#475569" font-size="14">1x AW Root Beer Float Large</text>
          <text x="580" y="270" text-anchor="end" fill="#0F172A" font-size="14" font-weight="700">Rp 22.000</text>

          <text x="0" y="300" fill="#64748B" font-size="13">Biaya Antar Porter Resmi</text>
          <text x="580" y="300" text-anchor="end" fill="#0F172A" font-size="13" font-weight="700">Rp 10.000</text>

          <text x="0" y="325" fill="#64748B" font-size="13">Biaya Layanan Platform</text>
          <text x="580" y="325" text-anchor="end" fill="#0F172A" font-size="13" font-weight="700">Rp 2.000</text>

          <line x1="0" y1="350" x2="580" y2="350" stroke="#E2E8F0" stroke-width="1"/>
        </g>

        <!-- Buttons Action -->
        <g transform="translate(0, 440)" cursor="pointer">
          <rect width="280" height="48" rx="10" fill="#0284C7"/>
          <text x="140" y="30" text-anchor="middle" fill="#FFFFFF" font-size="14" font-weight="800">Download Struk Digital</text>

          <g transform="translate(300, 0)">
            <rect width="280" height="48" rx="10" fill="#FFFFFF" stroke="#CBD5E1" stroke-width="1.5"/>
            <text x="140" y="30" text-anchor="middle" fill="#475569" font-size="14" font-weight="700">Hubungi Porter / Bantuan</text>
          </g>
        </g>
      </g>
    </g>
  </g>

  <!-- FOOTER -->
  <g id="Footer" transform="translate(0, 1150)">
    <rect width="1440" height="450" fill="#0F172A"/>
    <g transform="translate(80, 60)">
      <text x="0" y="24" fill="#FFFFFF" font-size="20" font-weight="800">FlyDine Bandara Juanda</text>
      <text x="0" y="55" fill="#94A3B8" font-size="14">Platform Resmi Layanan Pemesanan F&amp;B Bandara Internasional Juanda</text>
      <text x="0" y="100" fill="#64748B" font-size="13">© 2026 PT Angkasa Pura Indonesia • InJourney Airports</text>
    </g>
  </g>

</svg>
SVG;
file_put_contents($outDir . '/05-customer-tracking.svg', $svg05);
file_put_contents($pubDir . '/05-customer-tracking.svg', $svg05);
echo "05-customer-tracking.svg successfully written as 100% Vector.\n";

echo "Successfully built first 5 100% Vector High-Fidelity SVGs!\n";
