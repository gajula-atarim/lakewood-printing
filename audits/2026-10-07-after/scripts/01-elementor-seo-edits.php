// Lakewood Printing — SEO fixes to Elementor page data (headings, anchor text, content depth).
// Run once through Atarim execute-php. Safe-guards:
//  - the original _elementor_data of every touched post is copied to option lw_seo_bak_<id> (first run only)
//  - a post is only saved if EVERY expected element id was found; otherwise it is skipped untouched
//  - saves go through Elementor's document API (creates a revision, regenerates CSS)

$T64 = 'globals/typography?id=b652734'; // kit h3 style (FONT 64)
$T48 = 'globals/typography?id=e675662'; // kit h4 style (FONT 48)
$T24 = 'globals/typography?id=6ca5bb9'; // kit h6 style (FONT 24)
$C_SEC = 'globals/colors?id=secondary'; // kit h3 colour

$hide_text_css = 'selector .elementor-button-text{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important}';
$icon_box_css = 'selector .elementor-icon-box-title{letter-spacing:normal}';

// edits[post_id][element_id] = ['s' => settings to set, 'g' => __globals__ keys to set]
$edits = [
  43 => [ // Home
    'fc5668d' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T48]],
    'd3a611f' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    'e49b892' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    '9608e75' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    '3687e08' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    'b9dca20' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    'dd9e97d' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    'c99d3b3' => ['s' => ['title_size' => 'h3', 'custom_css' => $icon_box_css]],
    'f1ae693' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    '89a27ec' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    '7865b1b' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    'ef55e83' => ['s' => ['text' => 'Explore our services']],
  ],
  114 => [ // About Us
    'f966f71' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    'ba3cf24' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    'b45b25a' => ['s' => ['text' => 'Explore our services']],
    'cb8083c' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    '556f585' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    '2008867' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    'db882f3' => [],
  ],
  116 => [ // What We Print
    '7560794' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    '5d71807' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T48]],
    '4256692' => ['s' => ['link' => ['url' => 'https://online.fliphtml5.com/aalqc/2026-Print-Ideas-Guide_V5_LAKEWOOD-v4/', 'is_external' => 'on', 'nofollow' => '', 'custom_attributes' => 'rel|noopener']]],
    'ddcc250' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    '66337c6' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    'd57b30a' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    'ad170eb' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T48]],
    '06e5c86' => [],
  ],
  118 => [ // Services
    '0ac2a5a' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    'e5055de' => ['s' => ['header_size' => 'h3'], 'g' => ['typography_typography' => $T24]],
    'c3e9310' => ['s' => ['header_size' => 'h3'], 'g' => ['typography_typography' => $T24]],
    'd918675' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    'c5273dc' => ['s' => ['header_size' => 'h3'], 'g' => ['typography_typography' => $T24]],
    'cd083c5' => ['s' => ['header_size' => 'h3'], 'g' => ['typography_typography' => $T24]],
    '80340cd' => ['s' => ['title_size' => 'h5']],
    'd4e302a' => ['s' => ['title_size' => 'h5']],
    '6bfaf67' => ['s' => ['title_size' => 'h5']],
    '2cc40d2' => ['s' => ['title_size' => 'h5']],
    '4016128' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
  ],
  120 => [ // Contact Us
    'f797898' => ['s' => ['header_size' => 'p'], 'g' => ['typography_typography' => $T24]],
    '6bdf7f1' => ['s' => ['header_size' => 'h2'], 'g' => ['typography_typography' => $T64, 'title_color' => $C_SEC]],
    '9a25440' => [],
  ],
  8 => [ // Header template: icon-only mobile menu button gets screen-reader text
    'a3c6994' => ['s' => ['text' => 'Menu', 'custom_css' => $hide_text_css]],
  ],
];

// inserts[post_id][after_element_id] = list of paragraphs; each becomes a text-editor widget cloned from that element's settings
$inserts = [
  114 => ['db882f3' => [
    '<p>Lakewood Printing is a division of Lakewood Corporation Pty Ltd and is 100% Australian owned and operated. We are people-to-people and business-to-people printers: we take the time to listen, understand what each project needs and work with you until your print is delivered as you imagined.</p>',
    '<p>Our services cover high-speed digital printing in colour and black and white, offset printing for larger print runs, and graphic design for customers who need artwork created from scratch or refined. We print flyers and leaflets, brochures, booklets and magazines, posters, business cards, letterheads and envelopes, table and takeaway menus, calendars, invitations, presentation folders, training manuals and corflute signs, and we also offer photocopying, scanning and contract printing.</p>',
    '<p>We use sustainable practices and materials to reduce our impact, and our team works to your deadlines without compromising on quality. To talk about your next project, call 0449 107 547 or email info@lakewood.net.au.</p>',
  ]],
  116 => ['06e5c86' => [
    '<p>Smaller jobs and urgent projects suit digital printing, which prints directly from your file onto the paper stock of your choice with no setup fees. Larger runs suit offset printing, where the unit cost falls as the quantity grows and you get consistent, high-quality results with vibrant colour.</p>',
    '<p>If your artwork isn\'t ready, our design team can create it from scratch or refine what you have, and make sure it is optimised for the printing method and materials you choose. Browse the electronic flipbook above for the full product range, or call 0449 107 547 or email info@lakewood.net.au for a quick, personalised quote.</p>',
  ]],
  120 => ['9a25440' => [
    '<p>You can also email us at info@lakewood.net.au. Our postal address is PO Box 222, Essendon North, Victoria 3041.</p>',
    '<p>To help us prepare an accurate quote, tell us what you would like printed, the quantity, the size and paper stock you have in mind, any finishing requirements and your deadline. If your artwork is ready, let us know the file format. If it isn\'t, our graphic design team can create it from scratch or refine what you already have.</p>',
    '<p>We print business cards, flyers, brochures, booklets, posters, menus, calendars, invitations, presentation folders, letterheads and corflute signs. We recommend digital printing for short runs and urgent jobs, and offset printing for larger quantities, where the unit cost is lower.</p>',
  ]],
];

$apply = function (array $els, array $E, array $I, array &$found, array &$log) use (&$apply) {
  $out = [];
  foreach ($els as $el) {
    $id = $el['id'] ?? '';
    if (array_key_exists($id, $E)) {
      $found[$id] = true;
      if (!isset($el['settings']) || !is_array($el['settings'])) { $el['settings'] = []; }
      foreach (($E[$id]['s'] ?? []) as $k => $v) { $el['settings'][$k] = $v; }
      if (!empty($E[$id]['g'])) {
        $g = (isset($el['settings']['__globals__']) && is_array($el['settings']['__globals__'])) ? $el['settings']['__globals__'] : [];
        $el['settings']['__globals__'] = array_merge($g, $E[$id]['g']);
      }
      if (!empty($E[$id])) { $log[] = "edited $id"; }
    }
    if (!empty($el['elements']) && is_array($el['elements'])) {
      $el['elements'] = $apply($el['elements'], $E, $I, $found, $log);
    }
    $out[] = $el;
    if (isset($I[$id])) {
      foreach ($I[$id] as $n => $html) {
        $new = ['id' => substr(md5('lw-seo-' . $id . '-' . $n), 0, 7), 'elType' => 'widget', 'settings' => $el['settings'], 'elements' => [], 'widgetType' => 'text-editor'];
        $new['settings']['editor'] = $html;
        $out[] = $new;
        $log[] = "inserted {$new['id']} after $id";
      }
    }
  }
  return $out;
};

$report = [];
foreach ($edits as $pid => $E) {
  $raw = get_post_meta($pid, '_elementor_data', true);
  $data = is_string($raw) ? json_decode($raw, true) : $raw;
  if (!is_array($data)) { $report[$pid] = 'SKIPPED: could not decode _elementor_data'; continue; }
  if (get_option('lw_seo_bak_' . $pid, null) === null) {
    add_option('lw_seo_bak_' . $pid, is_string($raw) ? $raw : wp_json_encode($raw), '', 'no');
  }
  $found = []; $log = [];
  $new = $apply($data, $E, $inserts[$pid] ?? [], $found, $log);
  $missing = array_values(array_diff(array_keys($E), array_keys($found)));
  if ($missing) { $report[$pid] = ['SKIPPED: element ids not found' => $missing]; continue; }
  $method = 'document';
  $doc = \Elementor\Plugin::$instance->documents->get($pid, false);
  $ok = $doc ? $doc->save(['elements' => $new]) : false;
  if (!$ok) {
    update_post_meta($pid, '_elementor_data', wp_slash(wp_json_encode($new)));
    $method = 'meta';
  }
  $report[$pid] = ['saved_via' => $method, 'changes' => $log];
}
\Elementor\Plugin::$instance->files_manager->clear_cache();
return $report;
