<?php

function getHiFiDashboardSvg() {
    return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 1060" width="1440" height="1060" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

  <defs>
    <!-- Brand Gradients -->
    <linearGradient id="hero-blue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="60%" stop-color="#0369A1"/>
      <stop offset="100%" stop-color="#075985"/>
    </linearGradient>

    <linearGradient id="btn-blue" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0EA5E9"/>
    </linearGradient>

    <linearGradient id="food-banner-1" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#FEF3C7"/>
      <stop offset="100%" stop-color="#FDE68A"/>
    </linearGradient>

    <linearGradient id="food-banner-2" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#E0F2FE"/>
      <stop offset="100%" stop-color="#BAE6FD"/>
    </linearGradient>

    <linearGradient id="food-banner-3" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#ECFDF5"/>
      <stop offset="100%" stop-color="#A7F3D0"/>
    </linearGradient>

    <!-- Drop Shadows -->
    <filter id="card-shadow" x="-5%" y="-5%" width="110%" height="115%">
      <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#0F172A" flood-opacity="0.06"/>
    </filter>
    <filter id="search-shadow" x="-5%" y="-10%" width="110%" height="130%">
      <feDropShadow dx="0" dy="12" stdDeviation="16" flood-color="#000000" flood-opacity="0.12"/>
    </filter>
  </defs>

  <!-- ========================================================
       1. TOP NAVBAR (Sticky Top)
       ======================================================== -->
  <g id="Top-Navbar">
    <rect x="0" y="0" width="1440" height="76" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>

    <!-- A. Logo FlyDine di Kiri (Editable Vector Icon + Real Text) -->
    <g id="Navbar-Brand" transform="translate(60, 18)" cursor="pointer">
      <rect width="180" height="40" rx="10" fill="#0284C7"/>
      <!-- Vector Airplane Icon -->
      <path d="M24 19v-1.5l-6-3.8V9.6c0-.6-.5-1.1-1.1-1.1s-1.1.5-1.1 1.1v4.1l-6 3.8V19l6-1.9v4.1l-1.5 1.1v1.1l2.6-.8 2.6.8v-1.1L18 21.2v-4.1l6 1.9z" fill="#FFFFFF"/>
      <text x="46" y="25" fill="#FFFFFF" font-size="16" font-weight="900" letter-spacing="-0.02em">FlyDine Juanda</text>
    </g>

    <!-- B. Navigasi Kanan (ID/EN, Pesanan, Riwayat, Portal Login) -->
    <g id="Navbar-Menu" transform="translate(870, 20)">
      
      <!-- Switch Bahasa: [ ID | EN ] -->
      <g id="Toggle-Language" transform="translate(0, 0)" cursor="pointer">
        <rect width="90" height="36" rx="18" fill="#F1F5F9" stroke="#CBD5E1" stroke-width="1"/>
        <rect x="3" y="3" width="42" height="30" rx="15" fill="#0284C7"/>
        <text x="17" y="22" fill="#FFFFFF" font-size="12" font-weight="800">ID</text>
        <text x="56" y="22" fill="#64748B" font-size="12" font-weight="700">EN</text>
      </g>

      <!-- Link: PESANAN (Tas Belanja + Teks) -->
      <g id="Nav-Pesanan" transform="translate(110, 0)" cursor="pointer">
        <rect width="105" height="36" rx="8" fill="#F0F9FF"/>
        <!-- Vector Shopping Bag Icon -->
        <g id="Icon-Shopping-Bag" transform="translate(10, 8) scale(0.85)">
          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0" fill="none" stroke="#0284C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <text x="36" y="22" fill="#0284C7" font-size="13" font-weight="700">Pesanan</text>
      </g>

      <!-- Link: RIWAYAT (Ikon Dokumen + Teks) -->
      <g id="Nav-Riwayat" transform="translate(230, 0)" cursor="pointer">
        <g id="Icon-Receipt" transform="translate(10, 8) scale(0.85)">
          <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1 2-1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1z" fill="none" stroke="#64748B" stroke-width="2"/>
        </g>
        <text x="36" y="22" fill="#475569" font-size="13" font-weight="600">Riwayat</text>
      </g>

      <!-- Divider Vertikal -->
      <line x1="320" y1="6" x2="320" y2="30" stroke="#E2E8F0" stroke-width="1"/>

      <!-- Link: PORTAL LOGIN (Tombol Biru) -->
      <g id="Nav-Portal-Login" transform="translate(340, 0)" cursor="pointer">
        <rect width="150" height="36" rx="8" fill="#0284C7"/>
        <!-- Vector Key/User Icon -->
        <g id="Icon-User-Lock" transform="translate(12, 8) scale(0.85)">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" fill="none" stroke="#FFFFFF" stroke-width="2"/>
          <circle cx="12" cy="7" r="4" fill="none" stroke="#FFFFFF" stroke-width="2"/>
        </g>
        <text x="38" y="22" fill="#FFFFFF" font-size="13" font-weight="800">Portal Staff</text>
      </g>
    </g>
  </g>

  <!-- ========================================================
       2. HERO SECTION DENGAN BRANDING BANDARA JUANDA
       ======================================================== -->
  <g id="Hero-Section" transform="translate(0, 76)">
    <!-- Background Hero Gradient -->
    <rect x="0" y="0" width="1440" height="350" fill="url(#hero-blue)"/>

    <!-- Vector Horizon Runway Grid -->
    <g opacity="0.12">
      <line x1="0" y1="350" x2="720" y2="180" stroke="#FFFFFF" stroke-width="2" stroke-dasharray="12 12"/>
      <line x1="1440" y1="350" x2="720" y2="180" stroke="#FFFFFF" stroke-width="2" stroke-dasharray="12 12"/>
      <line x1="0" y1="260" x2="1440" y2="260" stroke="#FFFFFF" stroke-width="1"/>
    </g>

    <!-- Vector Giant Watermark -->
    <text x="80" y="90" fill="#FFFFFF" fill-opacity="0.08" font-size="72" font-weight="900" letter-spacing="-0.02em">JUANDA AIRPORT SUB</text>

    <!-- Teks Hero di Kiri -->
    <g id="Hero-Typography" transform="translate(80, 56)">
      <text x="0" y="32" fill="#FFFFFF" font-size="34" font-weight="900" letter-spacing="-0.02em">SHOPPING &amp; DINING</text>
      <text x="0" y="74" fill="#38BDF8" font-size="30" font-weight="800">BANDAR UDARA INTERNASIONAL JUANDA</text>
      <text x="0" y="112" fill="#E0F2FE" font-size="15" font-weight="400">Pesan makanan &amp; minuman favorit Anda langsung dari gerai Terminal 1 &amp; 2 tanpa antre.</text>
      <text x="0" y="134" fill="#BAE6FD" font-size="14" font-weight="400">Ambil mandiri di konter atau nikmati layanan pengantaran porter langsung ke gate penerbangan.</text>
    </g>

    <!-- FLOATING SEARCH & FILTER CAPSULE -->
    <g id="Floating-Filter-Bar" transform="translate(240, 275)">
      <!-- Kapsul Putih Besar Melayang -->
      <rect width="960" height="74" rx="37" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1.5" filter="url(#search-shadow)"/>

      <!-- Segment 1: LOKASI (Terminal) -->
      <g id="Filter-Segment-Terminal" transform="translate(36, 18)" cursor="pointer">
        <text x="0" y="12" fill="#94A3B8" font-size="11" font-weight="700" letter-spacing="0.05em">LOKASI TERMINAL</text>
        <text x="0" y="30" fill="#0F172A" font-size="14" font-weight="800">Semua Terminal (T1 &amp; T2)</text>
        <!-- Dropdown Chevron Icon -->
        <g id="Icon-Chevron-1" transform="translate(180, 16) scale(0.9)">
          <polyline points="6 9 12 15 18 9" fill="none" stroke="#64748B" stroke-width="2.5" stroke-linecap="round"/>
        </g>
      </g>

      <!-- Garis Pemisah Vertikal 1 -->
      <line x1="260" y1="16" x2="260" y2="58" stroke="#E2E8F0" stroke-width="1.5"/>

      <!-- Segment 2: AREA (Airside / Landside) -->
      <g id="Filter-Segment-Area" transform="translate(290, 18)" cursor="pointer">
        <text x="0" y="12" fill="#94A3B8" font-size="11" font-weight="700" letter-spacing="0.05em">ZONA BANDARA</text>
        <text x="0" y="30" fill="#0F172A" font-size="14" font-weight="800">Semua Area &amp; Gate</text>
        <!-- Dropdown Chevron Icon -->
        <g id="Icon-Chevron-2" transform="translate(150, 16) scale(0.9)">
          <polyline points="6 9 12 15 18 9" fill="none" stroke="#64748B" stroke-width="2.5" stroke-linecap="round"/>
        </g>
      </g>

      <!-- Garis Pemisah Vertikal 2 -->
      <line x1="490" y1="16" x2="490" y2="58" stroke="#E2E8F0" stroke-width="1.5"/>

      <!-- Segment 3: CARI RESTORAN + Tombol Search Biru Bulat -->
      <g id="Filter-Segment-Search" transform="translate(520, 18)">
        <text x="0" y="12" fill="#94A3B8" font-size="11" font-weight="700" letter-spacing="0.05em">PENCARIAN MENU / RESTORAN</text>
        <text x="0" y="30" fill="#64748B" font-size="14" font-weight="500">Ketik nama makanan atau tenant...</text>

        <!-- Tombol Cari Bulat di Ujung Kanan -->
        <g id="Button-Search-Submit" transform="translate(370, -3)" cursor="pointer">
          <circle cx="23" cy="23" r="23" fill="#0284C7"/>
          <!-- Vector Search Magnifying Glass Icon -->
          <g id="Icon-Search-Magnifier" transform="translate(13, 13) scale(0.9)">
            <circle cx="11" cy="11" r="7" fill="none" stroke="#FFFFFF" stroke-width="2.5"/>
            <line x1="21" y1="21" x2="16" y2="16" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
          </g>
        </g>
      </g>
    </g>
  </g>

  <!-- ========================================================
       3. GRID KARTU TENANT (100% Vector & Editable di Figma)
       ======================================================== -->
  <g id="Tenant-Grid-Section" transform="translate(80, 480)">

    <!-- Section Heading -->
    <g id="Grid-Heading" transform="translate(0, 0)">
      <text x="0" y="0" fill="#0F172A" font-size="20" font-weight="900" letter-spacing="-0.02em">Gerai Makanan Populer di Bandara Juanda</text>
      <text x="0" y="20" fill="#64748B" font-size="13" font-weight="500">Pilih restoran untuk melihat katalog menu dan memesan langsung.</text>
    </g>

    <!-- Row of 3 Cards -->
    <g id="Cards-Row" transform="translate(0, 40)">

      <!-- ========================================================
           KARTU TENANT 1: A&W RESTAURANT JUANDA
           ======================================================== -->
      <g id="Card-Tenant-1-AW" transform="translate(0, 0)">
        <rect width="405" height="420" rx="24" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1.5" filter="url(#card-shadow)"/>

        <!-- Cover Header Gradient -->
        <path d="M0 24 Q0 0 24 0 L381 0 Q405 0 405 24 L405 170 L0 170 Z" fill="url(#food-banner-1)"/>
        
        <!-- Vector Store Logo / Brand Badge -->
        <g id="Brand-Logo-AW" transform="translate(24, 20)">
          <rect width="52" height="52" rx="14" fill="#D97706"/>
          <text x="14" y="34" fill="#FFFFFF" font-size="18" font-weight="900">A&amp;W</text>
        </g>

        <!-- Status Badge: [ ● BUKA ] -->
        <g id="Badge-Open-1" transform="translate(305, 20)">
          <rect width="76" height="26" rx="13" fill="#ECFDF5" stroke="#10B981" stroke-width="1.2"/>
          <circle cx="14" cy="13" r="3.5" fill="#10B981"/>
          <text x="26" y="17" fill="#059669" font-size="11" font-weight="800">BUKA</text>
        </g>

        <!-- Lokasi Badge: [ 📍 T1 - Lantai 1 ] -->
        <g id="Badge-Location-1" transform="translate(24, 130)">
          <rect width="170" height="26" rx="13" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
          <!-- Pin Icon -->
          <g id="Icon-Pin-1" transform="translate(8, 5) scale(0.65)">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" fill="none" stroke="#0284C7" stroke-width="2"/>
            <circle cx="12" cy="10" r="3" fill="#0284C7"/>
          </g>
          <text x="28" y="17" fill="#334155" font-size="11" font-weight="700">T1 • Lantai 1 • Gate 1A</text>
        </g>

        <!-- Body Card -->
        <g id="Card-Body-1" transform="translate(24, 190)">
          <!-- Category Pill -->
          <rect width="84" height="22" rx="11" fill="#FEF3C7"/>
          <text x="12" y="15" fill="#B45309" font-size="11" font-weight="800">Cepat Saji</text>
          <text x="310" y="15" fill="#94A3B8" font-size="11" font-weight="600">12 Menu</text>

          <!-- Restaurant Name -->
          <text x="0" y="44" fill="#0F172A" font-size="18" font-weight="900" letter-spacing="-0.01em">A&amp;W Restaurant Juanda</text>

          <!-- Menu Items Preview -->
          <g id="Menu-Items-1" transform="translate(0, 60)">
            <!-- Item 1 -->
            <text x="0" y="12" fill="#475569" font-size="13" font-weight="500">Golden Aroma Chicken (2 Pcs)</text>
            <text x="357" y="12" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 48.000</text>

            <!-- Item 2 -->
            <text x="0" y="34" fill="#475569" font-size="13" font-weight="500">Root Beer Float Signature</text>
            <text x="357" y="34" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 22.000</text>

            <!-- Item 3 -->
            <text x="0" y="56" fill="#475569" font-size="13" font-weight="500">Curly Fries Jumbo</text>
            <text x="357" y="56" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 29.000</text>
          </g>

          <!-- CTA Button: [ Pilih Menu → ] -->
          <g id="Button-Select-Menu-1" transform="translate(0, 160)" cursor="pointer">
            <rect width="357" height="42" rx="12" fill="url(#btn-blue)"/>
            <text x="160" y="26" fill="#FFFFFF" font-size="14" font-weight="800" text-anchor="middle">Pilih Menu Restoran</text>
            <g id="Icon-Arrow-1" transform="translate(250, 13) scale(0.7)">
              <polyline points="9 18 15 12 9 6" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
            </g>
          </g>
        </g>
      </g>

      <!-- ========================================================
           KARTU TENANT 2: ROTI'O JUANDA TERMINAL 2
           ======================================================== -->
      <g id="Card-Tenant-2-RotiO" transform="translate(437, 0)">
        <rect width="405" height="420" rx="24" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1.5" filter="url(#card-shadow)"/>

        <!-- Cover Header Gradient -->
        <path d="M0 24 Q0 0 24 0 L381 0 Q405 0 405 24 L405 170 L0 170 Z" fill="url(#food-banner-2)"/>
        
        <!-- Brand Badge -->
        <g id="Brand-Logo-RotiO" transform="translate(24, 20)">
          <rect width="52" height="52" rx="14" fill="#B45309"/>
          <text x="12" y="34" fill="#FFFFFF" font-size="16" font-weight="900">Roti'O</text>
        </g>

        <!-- Status Badge -->
        <g id="Badge-Open-2" transform="translate(305, 20)">
          <rect width="76" height="26" rx="13" fill="#ECFDF5" stroke="#10B981" stroke-width="1.2"/>
          <circle cx="14" cy="13" r="3.5" fill="#10B981"/>
          <text x="26" y="17" fill="#059669" font-size="11" font-weight="800">BUKA</text>
        </g>

        <!-- Lokasi Badge -->
        <g id="Badge-Location-2" transform="translate(24, 130)">
          <rect width="170" height="26" rx="13" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
          <g id="Icon-Pin-2" transform="translate(8, 5) scale(0.65)">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" fill="none" stroke="#0284C7" stroke-width="2"/>
            <circle cx="12" cy="10" r="3" fill="#0284C7"/>
          </g>
          <text x="28" y="17" fill="#334155" font-size="11" font-weight="700">T2 • Gate 3 Keberangkatan</text>
        </g>

        <!-- Body Card -->
        <g id="Card-Body-2" transform="translate(24, 190)">
          <!-- Category Pill -->
          <rect width="96" height="22" rx="11" fill="#E0F2FE"/>
          <text x="10" y="15" fill="#0369A1" font-size="11" font-weight="800">Roti &amp; Kopi</text>
          <text x="310" y="15" fill="#94A3B8" font-size="11" font-weight="600">8 Menu</text>

          <!-- Restaurant Name -->
          <text x="0" y="44" fill="#0F172A" font-size="18" font-weight="900" letter-spacing="-0.01em">Roti'O Coffee &amp; Bakery</text>

          <!-- Menu Items Preview -->
          <g id="Menu-Items-2" transform="translate(0, 60)">
            <text x="0" y="12" fill="#475569" font-size="13" font-weight="500">Roti'O Signature Coffee Bun</text>
            <text x="357" y="12" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 14.000</text>

            <text x="0" y="34" fill="#475569" font-size="13" font-weight="500">Kopi 'O Brown Sugar Hot</text>
            <text x="357" y="34" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 18.000</text>

            <text x="0" y="56" fill="#475569" font-size="13" font-weight="500">Pastry Tuna Puff</text>
            <text x="357" y="56" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 16.000</text>
          </g>

          <!-- CTA Button -->
          <g id="Button-Select-Menu-2" transform="translate(0, 160)" cursor="pointer">
            <rect width="357" height="42" rx="12" fill="url(#btn-blue)"/>
            <text x="160" y="26" fill="#FFFFFF" font-size="14" font-weight="800" text-anchor="middle">Pilih Menu Restoran</text>
            <g id="Icon-Arrow-2" transform="translate(250, 13) scale(0.7)">
              <polyline points="9 18 15 12 9 6" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
            </g>
          </g>
        </g>
      </g>

      <!-- ========================================================
           KARTU TENANT 3: BAKSO PAK MITRO JUANDA
           ======================================================== -->
      <g id="Card-Tenant-3-PakMitro" transform="translate(874, 0)">
        <rect width="405" height="420" rx="24" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1.5" filter="url(#card-shadow)"/>

        <!-- Cover Header Gradient -->
        <path d="M0 24 Q0 0 24 0 L381 0 Q405 0 405 24 L405 170 L0 170 Z" fill="url(#food-banner-3)"/>
        
        <!-- Brand Badge -->
        <g id="Brand-Logo-PakMitro" transform="translate(24, 20)">
          <rect width="52" height="52" rx="14" fill="#047857"/>
          <text x="14" y="34" fill="#FFFFFF" font-size="14" font-weight="900">MITRO</text>
        </g>

        <!-- Status Badge -->
        <g id="Badge-Open-3" transform="translate(305, 20)">
          <rect width="76" height="26" rx="13" fill="#ECFDF5" stroke="#10B981" stroke-width="1.2"/>
          <circle cx="14" cy="13" r="3.5" fill="#10B981"/>
          <text x="26" y="17" fill="#059669" font-size="11" font-weight="800">BUKA</text>
        </g>

        <!-- Lokasi Badge -->
        <g id="Badge-Location-3" transform="translate(24, 130)">
          <rect width="170" height="26" rx="13" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
          <g id="Icon-Pin-3" transform="translate(8, 5) scale(0.65)">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" fill="none" stroke="#0284C7" stroke-width="2"/>
            <circle cx="12" cy="10" r="3" fill="#0284C7"/>
          </g>
          <text x="28" y="17" fill="#334155" font-size="11" font-weight="700">T1 • Food Court Lt. 2</text>
        </g>

        <!-- Body Card -->
        <g id="Card-Body-3" transform="translate(24, 190)">
          <!-- Category Pill -->
          <rect width="110" height="22" rx="11" fill="#DCFCE7"/>
          <text x="12" y="15" fill="#15803D" font-size="11" font-weight="800">Masakan Khas</text>
          <text x="310" y="15" fill="#94A3B8" font-size="11" font-weight="600">15 Menu</text>

          <!-- Restaurant Name -->
          <text x="0" y="44" fill="#0F172A" font-size="18" font-weight="900" letter-spacing="-0.01em">Bakso Pak Mitro Juanda</text>

          <!-- Menu Items Preview -->
          <g id="Menu-Items-3" transform="translate(0, 60)">
            <text x="0" y="12" fill="#475569" font-size="13" font-weight="500">Bakso Campur Spesial Juanda</text>
            <text x="357" y="12" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 38.000</text>

            <text x="0" y="34" fill="#475569" font-size="13" font-weight="500">Mie Ayam Pangsit Bakso</text>
            <text x="357" y="34" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 32.000</text>

            <text x="0" y="56" fill="#475569" font-size="13" font-weight="500">Es Jeruk Murni Peras</text>
            <text x="357" y="56" fill="#0284C7" font-size="13" font-weight="800" text-anchor="end">Rp 15.000</text>
          </g>

          <!-- CTA Button -->
          <g id="Button-Select-Menu-3" transform="translate(0, 160)" cursor="pointer">
            <rect width="357" height="42" rx="12" fill="url(#btn-blue)"/>
            <text x="160" y="26" fill="#FFFFFF" font-size="14" font-weight="800" text-anchor="middle">Pilih Menu Restoran</text>
            <g id="Icon-Arrow-3" transform="translate(250, 13) scale(0.7)">
              <polyline points="9 18 15 12 9 6" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
            </g>
          </g>
        </g>
      </g>

    </g>
  </g>

</svg>
SVG;
}

$dest = 'C:/Users/Dhidan/Downloads/High-Fidelity/01-dashboard.svg';
file_put_contents($dest, getHiFiDashboardSvg());
echo "01-dashboard.svg successfully generated as 100% Native Vector High-Fidelity SVG: " . round(filesize($dest)/1024, 1) . " KB\n";
