// Lakewood Printing — keep the social icons but stop them being empty/placeholder links.
// 1) Mobile menu (post 90, widget 36533a3): clear the generic facebook/instagram/pinterest.com placeholder URLs.
// 2) Must-use plugin: Elementor social-icons widgets render icons WITHOUT a URL as <span> instead of an
//    href-less <a>. Same classes, so the styling is unchanged. As soon as a real URL is entered, the icon is a normal link again.
// 3) Clear Elementor cache, then re-fetch pages to verify.
$report = [];

// 1) mobile menu placeholder links
$pid = 90; $done = 0;
$walk = function (array $els) use (&$walk, &$done) {
  foreach ($els as &$el) {
    if ($el['id'] === '36533a3') {
      foreach ($el['settings']['social_icon_list'] as &$item) {
        $item['link'] = ['url' => '', 'is_external' => '', 'nofollow' => '', 'custom_attributes' => ''];
        $done++;
      }
      unset($item);
    }
    if (!empty($el['elements'])) { $el['elements'] = $walk($el['elements']); }
  }
  return $els;
};
$new = $walk(json_decode(get_post_meta($pid, '_elementor_data', true), true));
$report['mobile_menu_links_cleared'] = $done;
if ($done) { $report['mobile_menu_saved'] = \Elementor\Plugin::$instance->documents->get($pid, false)->save(['elements' => $new]); }

// 2) must-use plugin
$dir = WP_CONTENT_DIR . '/mu-plugins';
wp_mkdir_p($dir);
$plugin = <<<'PHP'
<?php
/**
 * Plugin Name: Lakewood – link-less social icons
 * Description: Renders Elementor social icons that have no URL as plain icons (<span>) instead of empty links, so search engines don't see uncrawlable links. Icons with a real URL are untouched.
 */
add_filter('elementor/widget/render_content', function ($content, $widget) {
	if ($widget->get_name() !== 'social-icons') {
		return $content;
	}
	return preg_replace_callback('/<a\b([^>]*)>(.*?)<\/a>/is', function ($m) {
		if (preg_match('/\shref\s*=\s*["\'][^"\']+["\']/i', $m[1])) {
			return $m[0];
		}
		$attrs = preg_replace('/\s(?:href|target|rel)\s*=\s*("[^"]*"|\'[^\']*\')/i', '', $m[1]);
		return '<span' . $attrs . '>' . $m[2] . '</span>';
	}, $content);
}, 10, 2);
PHP;
$report['mu_plugin_written'] = (bool) file_put_contents($dir . '/lakewood-linkless-social-icons.php', $plugin);

// 3) clear caches
\Elementor\Plugin::$instance->files_manager->clear_cache();
wp_cache_flush();

// 4) verify (new requests load the mu-plugin)
foreach (['/', '/about-us/', '/what-we-print/', '/services/', '/contact-us/'] as $p) {
  $r = wp_remote_get(home_url($p) . '?cb=' . time(), ['timeout' => 25]);
  if (is_wp_error($r)) { $report[$p] = $r->get_error_message(); continue; }
  $b = wp_remote_retrieve_body($r);
  preg_match_all('/<a\b[^>]*>/i', $b, $a);
  preg_match_all('/<(a|span)\b[^>]*elementor-social-icon-[a-z]+[^>]*>/i', $b, $s);
  $report[$p] = [
    'code' => wp_remote_retrieve_response_code($r),
    'a_without_href' => count(array_filter($a[0], function ($x) { return !preg_match('/\shref=/i', $x); })),
    'blank_without_noopener' => count(array_filter($a[0], function ($x) { return stripos($x, '_blank') !== false && !preg_match('/noopener|noreferrer/i', $x); })),
    'social_icon_tags' => $s[0],
    'php_errors' => preg_match_all('/Fatal error|Parse error|Warning:/', $b),
  ];
}
return $report;
