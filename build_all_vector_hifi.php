<?php

$srcDir = __DIR__ . '/wireframe fly-dine';
$destDirs = [
    'C:/Users/Dhidan/Downloads/High-Fidelity',
    __DIR__ . '/public/high-fidelity'
];

foreach ($destDirs as $d) {
    if (!is_dir($d)) {
        mkdir($d, 0777, true);
    }
}

$files = glob($srcDir . '/*.svg');

$hifiDefs = <<<DEFS
  <defs>
    <linearGradient id="primary-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0369A1"/>
    </linearGradient>
    <linearGradient id="hero-blue" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0369A1"/>
      <stop offset="50%" stop-color="#0284C7"/>
      <stop offset="100%" stop-color="#0EA5E9"/>
    </linearGradient>
    <linearGradient id="sidebar-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0F172A"/>
      <stop offset="100%" stop-color="#1E293B"/>
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
      <feDropShadow dx="0" dy="4" stdDeviation="8" flood-color="#0F172A" flood-opacity="0.05"/>
    </filter>
  </defs>
DEFS;

// Vector icons to inject into common groups
$planeIcon = '<path d="M24 19v-1.5l-6-3.8V9.6c0-.6-.5-1.1-1.1-1.1s-1.1.5-1.1 1.1v4.1l-6 3.8V19l6-1.9v4.1l-1.5 1.1v1.1l2.6-.8 2.6.8v-1.1L18 21.2v-4.1l6 1.9z" fill="#FFFFFF"/>';

$totalCount = 0;
foreach ($files as $file) {
    $filename = basename($file);
    $svg = file_get_contents($file);

    // 1. Remove wireframe image cross lines ([X] placeholders)
    // Matches <line ... x1="0" y1="0" x2="W" y2="H" ... /> or crossed lines
    $svg = preg_replace('/<line[^>]+x1="0"[^>]+y1="0"[^>]+x2="\d+"[^>]+y2="\d+"[^>]*\/>/i', '', $svg);
    $svg = preg_replace('/<line[^>]+x1="\d+"[^>]+y1="0"[^>]+x2="0"[^>]+y2="\d+"[^>]*\/>/i', '', $svg);

    // 2. Insert defs right after <svg ...>
    if (strpos($svg, '<defs>') === false) {
        $svg = preg_replace('/(<svg[^>]*>)/i', "$1\n" . $hifiDefs, $svg);
    }

    // 3. Modernize backgrounds: #FFFFFF to clean Tailwind #F8FAFC
    $svg = preg_replace('/style="background:#FFFFFF;/', 'style="background:#F8FAFC;', $svg);

    // 4. Transform Wireframe Dark/Grey Fills into Rich Hi-Fi Palettes:
    // Buttons / Primary actions (#27272A fill -> #0284C7 or #0F172A)
    // Sidebar darks: #27272A -> #0F172A
    $svg = str_replace('fill="#27272A"', 'fill="#0284C7"', $svg);
    $svg = str_replace('stroke="#27272A"', 'stroke="#0284C7"', $svg);
    
    // Border wireframes: #3F3F46, #71717A, #E4E4E7 -> High-Fidelity Tailwind borders
    $svg = str_replace('stroke="#3F3F46"', 'stroke="#CBD5E1"', $svg);
    $svg = str_replace('fill="#3F3F46"', 'fill="#64748B"', $svg);
    $svg = str_replace('stroke="#71717A"', 'stroke="#94A3B8"', $svg);
    $svg = str_replace('fill="#71717A"', 'fill="#64748B"', $svg);
    $svg = str_replace('stroke="#E4E4E7"', 'stroke="#E2E8F0"', $svg);
    $svg = str_replace('stroke="#D4D4D8"', 'stroke="#CBD5E1"', $svg);
    
    // Light card fills: #F4F4F5, #FAFAFA, #18181B
    $svg = str_replace('fill="#F4F4F5"', 'fill="#F1F5F9"', $svg);
    $svg = str_replace('fill="#FAFAFA"', 'fill="#FFFFFF"', $svg);
    $svg = str_replace('fill="#18181B"', 'fill="#0F172A"', $svg);
    
    // Convert skeleton lines to high-fidelity rounded pills with pleasant slate/sky colors
    // Skeleton heading line (stroke-width 8-16)
    $svg = preg_replace('/stroke="#D4D4D8" stroke-width="1[0-9]"/', 'stroke="#0284C7" stroke-width="12" opacity="0.9"', $svg);
    $svg = preg_replace('/stroke="#94A3B8" stroke-width="1[0-9]"/', 'stroke="#0F172A" stroke-width="12"', $svg);
    
    // Add rx="8" or filter="url(#soft-shadow)" to large card rectangles
    $svg = preg_replace('/(<rect[^>]+width="[3-9]\d{2}"[^>]+height="[1-9]\d{2}"[^>]+fill="#FFFFFF")([^>]*>)/i', '$1 rx="12" filter="url(#soft-shadow)"$2', $svg);

    // Ensure all 01-dashboard specific hi-fi touches if it's 01
    if ($filename === '01-dashboard.svg' && file_exists(__DIR__ . '/generate_hifi_vector_01.php')) {
        require_once __DIR__ . '/generate_hifi_vector_01.php';
        $svg = getHiFiDashboardSvg();
    }

    // Save to both destinations
    foreach ($destDirs as $destDir) {
        file_put_contents($destDir . '/' . $filename, $svg);
    }

    $totalCount++;
    echo "Saved Hi-Fi Vector: {$filename} (" . strlen($svg) . " bytes)\n";
}

echo "Successfully built {$totalCount} 100% Vector Hi-Fi SVGs!\n";
