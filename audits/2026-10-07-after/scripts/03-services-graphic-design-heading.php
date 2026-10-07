// Services page correction: restore the 4 Graphic Design card titles to h3 (h5 rendered slightly tighter),
// and fix the outline instead by promoting the "Graphic Design" section heading from h4 to h2.
// Its rendered colour (#333333, theme default) and letter-spacing are pinned so it looks the same as an h2.
$pid = 118;
$E = [
  'efb0cd4' => ['header_size' => 'h2', 'title_color' => '#333333', 'custom_css' => 'selector .elementor-heading-title{letter-spacing:normal}'],
  '80340cd' => ['title_size' => 'h3'],
  'd4e302a' => ['title_size' => 'h3'],
  '6bfaf67' => ['title_size' => 'h3'],
  '2cc40d2' => ['title_size' => 'h3'],
];
$found = [];
$walk = function (array $els) use (&$walk, $E, &$found) {
  foreach ($els as &$el) {
    if (isset($E[$el['id']])) { foreach ($E[$el['id']] as $k => $v) { $el['settings'][$k] = $v; } $found[] = $el['id']; }
    if (!empty($el['elements'])) { $el['elements'] = $walk($el['elements']); }
  }
  return $els;
};
$data = json_decode(get_post_meta($pid, '_elementor_data', true), true);
$new = $walk($data);
if (count($found) !== count($E)) { return ['SKIPPED: missing ids' => array_values(array_diff(array_keys($E), $found))]; }
$ok = \Elementor\Plugin::$instance->documents->get($pid, false)->save(['elements' => $new]);
\Elementor\Plugin::$instance->files_manager->clear_cache();
return ['saved' => $ok, 'edited' => $found];
