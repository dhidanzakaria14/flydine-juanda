<?php

$srcDir = __DIR__ . '/wireframe fly-dine';
$destDirs = [
    'C:/Users/Dhidan/Downloads/High-Fidelity',
    __DIR__ . '/public/high-fidelity'
];

$files = glob($srcDir . '/*.svg');

// Common Vector Icons
$icons = [
    'plane' => '<path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="currentColor"/>',
    'search' => '<circle cx="11" cy="11" r="8" fill="none" stroke="currentColor" stroke-width="2"/><path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
    'bag' => '<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M3 6h18M16 10a4 4 0 0 1-8 0" stroke="currentColor" stroke-width="2"/>',
    'receipt' => '<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M8 7h8M8 11h8M8 15h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
    'login' => '<path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'bell' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.94 1.94 0 0 0 3.4 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
    'user' => '<circle cx="12" cy="7" r="4" fill="none" stroke="currentColor" stroke-width="2"/><path d="M5.5 21a8.5 8.5 0 0 1 13 0" fill="none" stroke="currentColor" stroke-width="2"/>',
    'home' => '<path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M9 22V12h6v10" stroke="currentColor" stroke-width="2"/>',
    'box' => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" fill="none" stroke="currentColor" stroke-width="2"/>',
    'chevron' => '<path d="m9 18 6-6-6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'star' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" fill="#F59E0B"/>',
    'lock' => '<rect x="3" y="11" width="18" height="11" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" fill="none" stroke="currentColor" stroke-width="2"/>',
    'mail' => '<rect x="3" y="5" width="18" height="14" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><polyline points="3 7 12 13 21 7" stroke="currentColor" stroke-width="2"/>',
    'check' => '<polyline points="20 6 9 17 4 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>',
    'arrow_right' => '<line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polyline points="12 5 19 12 12 19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>'
];

$hifiDefs = <<<DEFS
  <defs>
    <!-- Brand Primary Gradients -->
    <linearGradient id="hero-blue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="60%" stop-color="#0369A1"/>
      <stop offset="100%" stop-color="#075985"/>
    </linearGradient>
    <linearGradient id="btn-blue" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0EA5E9"/>
    </linearGradient>
    <linearGradient id="sidebar-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0F172A"/>
      <stop offset="100%" stop-color="#1E293B"/>
    </linearGradient>
    <!-- Soft Background Banners -->
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
    <filter id="soft-shadow" x="-5%" y="-5%" width="110%" height="115%">
      <feDropShadow dx="0" dy="6" stdDeviation="10" flood-color="#0F172A" flood-opacity="0.06"/>
    </filter>
    <filter id="card-shadow" x="-5%" y="-5%" width="110%" height="115%">
      <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#0F172A" flood-opacity="0.08"/>
    </filter>
  </defs>
DEFS;

foreach ($files as $file) {
    $filename = basename($file);

    // If 01-dashboard.svg, use the dedicated high-fidelity generator
    if ($filename === '01-dashboard.svg') {
        require_once __DIR__ . '/generate_hifi_vector_01.php';
        $svg = getHiFiDashboardSvg();
    } else {
        $raw = file_get_contents($file);

        // 1. Remove all placeholder cross lines [X]
        $svg = preg_replace('/<line[^>]+x1="0"[^>]+y1="0"[^>]+x2="\d+"[^>]+y2="\d+"[^>]*\/>/i', '', $raw);
        $svg = preg_replace('/<line[^>]+x1="\d+"[^>]+y1="0"[^>]+x2="0"[^>]+y2="\d+"[^>]*\/>/i', '', $svg);

        // 2. Add defs
        if (strpos($svg, '<defs>') === false) {
            $svg = preg_replace('/(<svg[^>]*>)/i', "$1\n" . $hifiDefs, $svg);
        }

        // 3. Modernize page background
        $svg = preg_replace('/style="background:#FFFFFF;/', 'style="background:#F8FAFC;', $svg);

        // 4. Transform Sidebars into Dark Slate Gradient
        $svg = preg_replace('/<g id="Sidebar">\s*<rect x="0" y="0" width="260" height="\d+" fill="#FFFFFF" stroke="#27272A" stroke-width="2"\s*\/>/i', 
            '<g id="Sidebar"><rect x="0" y="0" width="260" height="1060" fill="url(#sidebar-grad)"/>', $svg);

        // 5. Transform Top Navbar / Header into clean white with subtle border
        $svg = preg_replace('/<g id="Top-Navbar">\s*<rect x="0" y="0" width="1440" height="76" fill="#FFFFFF" stroke="#27272A" stroke-width="2"\s*\/>/i',
            '<g id="Top-Navbar"><rect x="0" y="0" width="1440" height="76" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/><g transform="translate(60, 18)"><rect width="180" height="40" rx="10" fill="#0284C7"/><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="#FFFFFF" transform="translate(10, 8) scale(0.9)"/><text x="44" y="25" fill="#FFFFFF" font-size="15" font-weight="800">FlyDine Juanda</text></g>', $svg);

        $svg = preg_replace('/<g id="Top-Header">\s*<rect x="260" y="0" width="1180" height="88" fill="#FFFFFF" stroke="#27272A" stroke-width="2"\s*\/>/i',
            '<g id="Top-Header"><rect x="260" y="0" width="1180" height="88" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1"/>', $svg);

        // 6. Language Switcher ID | EN
        $langPill = '<rect x="0" y="0" width="90" height="34" rx="17" fill="#F1F5F9" stroke="#E2E8F0" stroke-width="1"/><rect x="2" y="2" width="42" height="30" rx="15" fill="#0284C7"/><text x="16" y="22" fill="#FFFFFF" font-size="12" font-weight="700">ID</text><text x="58" y="22" fill="#64748B" font-size="12" font-weight="700">EN</text>';
        $svg = preg_replace('/<rect x="0" y="0" width="90" height="36" rx="18"[^>]*\/>\s*<rect x="3" y="3" width="42" height="30" rx="15"[^>]*\/>\s*<line[^>]*\/>\s*<line[^>]*\/>/i', $langPill, $svg);

        // 7. Standard Buttons & Cards Color Replacement
        $svg = str_replace('fill="#27272A"', 'fill="#0284C7"', $svg);
        $svg = str_replace('stroke="#27272A"', 'stroke="#0284C7"', $svg);
        $svg = str_replace('fill="#18181B"', 'fill="#0F172A"', $svg);
        $svg = str_replace('stroke="#18181B"', 'stroke="#0F172A"', $svg);
        $svg = str_replace('stroke="#3F3F46"', 'stroke="#E2E8F0"', $svg);
        $svg = str_replace('fill="#3F3F46"', 'fill="#64748B"', $svg);
        $svg = str_replace('stroke="#71717A"', 'stroke="#94A3B8"', $svg);
        $svg = str_replace('fill="#71717A"', 'fill="#64748B"', $svg);
        $svg = str_replace('stroke="#A1A1AA"', 'stroke="#CBD5E1"', $svg);
        $svg = str_replace('stroke="#E4E4E7"', 'stroke="#E2E8F0"', $svg);
        $svg = str_replace('stroke="#D4D4D8"', 'stroke="#CBD5E1"', $svg);
        $svg = str_replace('fill="#F4F4F5"', 'fill="#F1F5F9"', $svg);
        $svg = str_replace('fill="#FAFAFA"', 'fill="#FFFFFF"', $svg);

        // Convert cards to rounded with soft shadow
        $svg = preg_replace('/(<rect[^>]+width="[3-9]\d{2}"[^>]+height="[1-9]\d{2}"[^>]+fill="#FFFFFF")([^>]*>)/i', '$1 rx="12" filter="url(#card-shadow)" stroke="#E2E8F0" stroke-width="1"$2', $svg);

        // Enhance Auth Screens (22, 23, 24)
        if (in_array($filename, ['22-auth-login.svg', '23-auth-forgot-password.svg', '24-auth-reset-password.svg'])) {
            $svg = preg_replace('/<rect x="0" y="0" width="850" height="900" fill="[^"]*" \/>/i', '<rect x="0" y="0" width="850" height="900" fill="url(#hero-blue)"/>', $svg);
            
            // Add prominent Auth Left Branding Text
            $brandText = <<<BRAND
    <g transform="translate(80, 260)">
      <rect width="180" height="38" rx="8" fill="#FFFFFF" fill-opacity="0.15" stroke="#FFFFFF" stroke-opacity="0.3"/>
      <text x="16" y="24" fill="#FFFFFF" font-size="13" font-weight="700" letter-spacing="0.05em">PORTAL TERINTEGRASI</text>
      <text x="0" y="90" fill="#FFFFFF" font-size="42" font-weight="900" letter-spacing="-0.02em">FlyDine Juanda</text>
      <text x="0" y="135" fill="#BAE6FD" font-size="22" font-weight="600">Smart Food &amp; Beverage Airport Ordering</text>
      <text x="0" y="175" fill="#E0F2FE" font-size="15" opacity="0.9">Sistem manajemen pesanan &amp; operasional F&amp;B Terminal 1 &amp; Terminal 2</text>
      <g transform="translate(0, 230)">
        <rect width="210" height="74" rx="12" fill="#FFFFFF" fill-opacity="0.1" stroke="#FFFFFF" stroke-opacity="0.2"/>
        <text x="18" y="30" fill="#BAE6FD" font-size="12" font-weight="600">LOKASI BANDARA</text>
        <text x="18" y="55" fill="#FFFFFF" font-size="16" font-weight="800">Terminal 1 &amp; 2</text>
        <g transform="translate(230, 0)">
          <rect width="210" height="74" rx="12" fill="#FFFFFF" fill-opacity="0.1" stroke="#FFFFFF" stroke-opacity="0.2"/>
          <text x="18" y="30" fill="#BAE6FD" font-size="12" font-weight="600">KEAMANAN AKSES</text>
          <text x="18" y="55" fill="#FFFFFF" font-size="16" font-weight="800">Enkripsi SHA-256</text>
        </g>
      </g>
    </g>
BRAND;
            $svg = preg_replace('/<g id="Left-Branding-Section">.*?<g id="Right-Form-Section"/s', "<g id=\"Left-Branding-Section\"><rect x=\"0\" y=\"0\" width=\"850\" height=\"900\" fill=\"url(#hero-blue)\"/>\n{$brandText}\n  </g>\n  <g id=\"Right-Form-Section\"", $svg);
        }
    }

    // Save to both destinations
    foreach ($destDirs as $destDir) {
        file_put_contents($destDir . '/' . $filename, $svg);
    }

    echo "Enhanced & Saved: {$filename} (" . strlen($svg) . " bytes)\n";
}

echo "All 28 High-Fidelity Vector SVGs processed successfully!\n";
