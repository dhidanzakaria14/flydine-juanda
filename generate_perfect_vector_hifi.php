<?php

require_once __DIR__ . '/generate_hifi_vector_01.php';

$outputDir = 'C:/Users/Dhidan/Downloads/High-Fidelity';
$publicDir = __DIR__ . '/public/high-fidelity';

// Common SVG Header and Defs
function getSvgHeader($w, $h) {
    return <<<HEADER
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {$w} {$h}" width="{$w}" height="{$h}" style="background:#F8FAFC; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
  <defs>
    <linearGradient id="hero-blue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="60%" stop-color="#0369A1"/>
      <stop offset="100%" stop-color="#075985"/>
    </linearGradient>
    <linearGradient id="sidebar-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0F172A"/>
      <stop offset="100%" stop-color="#1E293B"/>
    </linearGradient>
    <linearGradient id="primary-grad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0EA5E9"/>
    </linearGradient>
    <linearGradient id="card-soft-1" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#EFF6FF"/>
      <stop offset="100%" stop-color="#DBEAFE"/>
    </linearGradient>
    <linearGradient id="card-soft-2" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#FEF3C7"/>
      <stop offset="100%" stop-color="#FDE68A"/>
    </linearGradient>
    <linearGradient id="card-soft-3" x1="0%" y1="0%" x2="100%" y2="100%">
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
HEADER;
}

// 1. Navbar Helper
function getCustomerNavbar($title = 'FlyDine Juanda') {
    return <<<NAV
  <g id="Top-Navbar">
    <rect x="0" y="0" width="1440" height="76" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
    <!-- Logo Brand -->
    <g id="Navbar-Brand" transform="translate(60, 18)">
      <rect width="180" height="40" rx="10" fill="#0284C7"/>
      <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="#FFFFFF" transform="translate(10, 8) scale(0.9)"/>
      <text x="44" y="25" fill="#FFFFFF" font-size="15" font-weight="800">FlyDine Juanda</text>
    </g>
    <!-- Nav Items -->
    <g id="Navbar-Menu" transform="translate(860, 20)">
      <!-- Language Switcher -->
      <g transform="translate(0, 0)">
        <rect width="84" height="36" rx="18" fill="#F1F5F9" stroke="#E2E8F0" stroke-width="1"/>
        <rect x="2" y="2" width="40" height="32" rx="16" fill="#0284C7"/>
        <text x="15" y="22" fill="#FFFFFF" font-size="12" font-weight="700">ID</text>
        <text x="54" y="22" fill="#64748B" font-size="12" font-weight="700">EN</text>
      </g>
      <!-- Pesanan -->
      <g transform="translate(110, 0)">
        <rect width="110" height="36" rx="8" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" fill="none" stroke="#0284C7" stroke-width="1.8" transform="translate(10, 8) scale(0.7)"/>
        <text x="36" y="23" fill="#0F172A" font-size="13" font-weight="600">Pesanan</text>
        <circle cx="95" cy="18" r="9" fill="#0284C7"/>
        <text x="95" y="22" text-anchor="middle" fill="#FFFFFF" font-size="11" font-weight="700">2</text>
      </g>
      <!-- Riwayat -->
      <g transform="translate(235, 0)">
        <rect width="105" height="36" rx="8" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
        <text x="24" y="23" fill="#0F172A" font-size="13" font-weight="600">Riwayat</text>
      </g>
      <!-- Portal Login -->
      <g transform="translate(355, 0)">
        <rect width="135" height="36" rx="8" fill="#0F172A"/>
        <text x="22" y="23" fill="#FFFFFF" font-size="13" font-weight="600">Portal Login</text>
        <path d="m9 18 6-6-6-6" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" transform="translate(105, 9) scale(0.7)"/>
      </g>
    </g>
  </g>
NAV;
}

// 2. Portal Sidebar Helper (Admin/Tenant)
function getPortalSidebar($role = 'tenant', $activeNav = 1) {
    $title = ($role === 'admin') ? 'FlyDine Admin' : 'FlyDine Tenant';
    $subtitle = ($role === 'admin') ? 'Bandara Juanda' : 'A&W Resto - T1';
    
    $navs = ($role === 'admin') ? [
        ['Dashboard Overview', '1'],
        ['Executive Analytics', '2'],
        ['Manajemen Tenant', '3'],
        ['Pusat Komplain', '4'],
        ['Fraud Monitoring', '5']
    ] : [
        ['Dashboard Operasional', '1'],
        ['Manajemen Pesanan', '2'],
        ['Katalog Produk', '3'],
        ['Tambah Menu Baru', '4'],
        ['Riwayat & Laporan', '5']
    ];

    $navSvg = '';
    $y = 120;
    foreach ($navs as $i => $nav) {
        $isActive = (($i + 1) == $activeNav);
        $bg = $isActive ? 'fill="#0284C7"' : 'fill="transparent"';
        $textColor = $isActive ? '#FFFFFF' : '#94A3B8';
        $weight = $isActive ? '700' : '500';
        $navSvg .= <<<ITEM
      <g transform="translate(16, {$y})">
        <rect width="228" height="46" rx="10" {$bg}/>
        <text x="44" y="28" fill="{$textColor}" font-size="14" font-weight="{$weight}">{$nav[0]}</text>
      </g>
ITEM;
        $y += 54;
    }

    return <<<SIDEBAR
  <g id="Sidebar">
    <rect x="0" y="0" width="260" height="1060" fill="url(#sidebar-grad)"/>
    <!-- Sidebar Brand -->
    <g transform="translate(24, 28)">
      <rect width="212" height="52" rx="10" fill="#1E293B" stroke="#334155" stroke-width="1"/>
      <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="#0EA5E9" transform="translate(12, 10) scale(0.9)"/>
      <text x="46" y="28" fill="#FFFFFF" font-size="15" font-weight="800">{$title}</text>
      <text x="46" y="44" fill="#94A3B8" font-size="11">{$subtitle}</text>
    </g>
    <!-- Nav Items -->
    {$navSvg}
    <!-- Logout -->
    <g transform="translate(16, 980)">
      <rect width="228" height="46" rx="10" fill="#1E293B" stroke="#EF4444" stroke-opacity="0.3" stroke-width="1"/>
      <text x="44" y="28" fill="#EF4444" font-size="14" font-weight="600">Keluar Sistem</text>
    </g>
  </g>
  <!-- Portal Top Header -->
  <g id="Top-Header">
    <rect x="260" y="0" width="1180" height="80" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>
    <text x="296" y="46" fill="#0F172A" font-size="20" font-weight="800">{$navs[$activeNav-1][0]}</text>
    <!-- User Badge -->
    <g transform="translate(1200, 18)">
      <rect width="200" height="44" rx="22" fill="#F8FAFC" stroke="#E2E8F0" stroke-width="1"/>
      <circle cx="26" cy="22" r="14" fill="#0284C7"/>
      <text x="26" y="27" text-anchor="middle" fill="#FFFFFF" font-size="13" font-weight="700">A</text>
      <text x="50" y="24" fill="#0F172A" font-size="13" font-weight="700">Petugas Juanda</text>
      <text x="50" y="38" fill="#10B981" font-size="10" font-weight="600">● Online</text>
    </g>
  </g>
SIDEBAR;
}

echo "Generating and upgrading all 28 pure vector mockups...\n";

// Run build_all_vector_hifi.php to process wireframe baseline
require_once __DIR__ . '/build_all_vector_hifi.php';
require_once __DIR__ . '/enhance_all_28_hifi.php';

echo "All 28 High-Fidelity files are 100% Vector and ready in: {$outputDir}\n";
