// Lakewood Printing — add security headers + correct JS MIME type in .htaccess (LiteSpeed).
// Backs the current .htaccess up outside the web root, then writes a marked block with insert_with_markers().
// Rollback: delete the "Lakewood SEO Security Headers" block, or restore the backup file.
// CSP is deliberately non-restrictive for scripts/styles (Elementor relies on inline code); frame-ancestors allows
// the site itself and Atarim's app so visual feedback keeps working. In modern browsers frame-ancestors takes
// precedence over X-Frame-Options.
require_once ABSPATH . 'wp-admin/includes/misc.php';
$file = ABSPATH . '.htaccess';
$backup = dirname(ABSPATH) . '/htaccess-backup-pre-seo-20261007';
if (!file_exists($backup)) { copy($file, $backup); }
$rules = [
  '<IfModule mod_headers.c>',
  'Header always set Strict-Transport-Security "max-age=31536000"',
  'Header always set X-Frame-Options "SAMEORIGIN"',
  'Header always set X-Content-Type-Options "nosniff"',
  'Header always set Referrer-Policy "strict-origin-when-cross-origin"',
  'Header always set Content-Security-Policy "upgrade-insecure-requests; frame-ancestors \'self\' https://*.atarim.io; base-uri \'self\'; object-src \'none\'"',
  '</IfModule>',
  '<IfModule mod_mime.c>',
  'AddType application/javascript .js .mjs',
  '</IfModule>',
];
$ok = insert_with_markers($file, 'Lakewood SEO Security Headers', $rules);
return ['written' => $ok, 'backup' => $backup, 'backup_exists' => file_exists($backup), 'htaccess' => file_get_contents($file)];
