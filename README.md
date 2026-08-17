![banner-1544x500](https://github.com/user-attachments/assets/2869b666-cc0f-4a97-97f5-579aa8baeecc)

# Dynamic Year Block

* Donate link: https://ubr.link/donate-wp
* Tags: year, dynamic, date, copyright, footer, block
* Tested up to: 7.1
* Requires at least: 6.4
* Requires PHP: 7.4
* Stable tag: 1.0.1
* License: GPL 2.0 or later

Auto update the copyright year in your website footer dynamically. At the turn of each year, the number will automatically change to reflect the current year.

# Installation

## Automatic installation:
1. Open any post or page in your WordPress.
2. Click the main plus icon (+), located at the upper left corner of the editor, to add a new block.
3. Type “Dynamic Year Block” in the search field.
4. Look for the plugin with this name in the list of available block plugins and click to install.
5. Wait for the installation process and the block will be available to use in your content. You can deactivate it in the “Plugins → All plugins” menu, in your WordPress admin dashboard.

## Manual Installation:
1. Upload the dynamic-year-block.zip file via the plugin page of WordPress by clicking “Add New” and selecting the zip from your local computer, or alternatively upload the decompressed `dynamic-year-block` folder to your `/wp-content/plugins/` directory on your server, via SFTP/FTP.
2. Activate the plugin through the “Plugins” menu in WordPress.
3. Search for the “Current Year” block in any block inserter within the block editor.
4. Optionally, customize the year format in the sidebar of the block editor. The plugin does not create menus or additional settings in the WordPress dashboard.

# Frequently Asked Questions

## Why would I need this?
This eliminates the need to manually edit the year of your website's copyright statement,  usually located at the bottom of each page.

## What is the recommended way to use it?
It is recommended to insert it in the footer template part of your block's theme, but it can be used anywhere in your content.

## Will this plugin hinder my website loading performance?
Not at all, the plugin is quite simple. It does not add any CSS or Javascript on its own. If you want to style the text in any way, you will use the Block Editor's native features to do so.

## Does this plugin collect any data from me or my users?
Absolutely not, the plugin respects your privacy. It's completely add-free and the code only uses core WordPress functions.

## Does this plugin work in the Classic Editor?
No, this plugin works exclusively in the Block Editor.

## The link to my privacy policy does not appear on the front end.
 The block works only with the native Privacy Policy page. You can create one under “Settings → Privacy”, clicking the “Create button” on the “Settings” tab. Also, make sure your Privacy Policy page is published.

## Is the included copyright notice enough to safeguard my website regarding legal issues?
Most probably not. While the plugin offers a basic copyright notice, it doesn't automatically solve all legal issues your website may have, nor does it constitute legal advice in any way. The site owner is solely responsible for ensuring that the website respects the law.

## Does the plugin use the client time (via Javascript) or the server time (via PHP) to update the year?
The plugin uses a WordPress core function ([`current_datetime`](https://developer.wordpress.org/reference/functions/current_datetime/)) to get your server time, using the timezone specified in the “Settings → General → Timezone” on your WordPress dashboard. So it is important to set your timezone in order to display the year correctly, especially at the turn of the year.

## Can page caching cause the previous year to remain visible?
The block is rendered dynamically whenever WordPress generates the page. However, a full-page cache or CDN may continue serving previously generated HTML until that cache expires or is purged. This behavior can occur with any caching solution, not only LiteSpeed Cache. Most caches expire or are invalidated normally, but if the previous year remains visible after January 1, purge the affected page or the full-page cache. The plugin intentionally does not bypass caching or require a vendor-specific ESI integration.

## How can I support the development of the Dynamic Year Block?
You can help with a [donation](https://ubr.link/donate-wp), by [visiting our website](https://epico.studio) or publishing a [positive review](https://wordpress.org/support/plugin/dynamic-year-block/reviews/#new-post), if you find it useful.

# WordPress 7.1 compatibility checklist

## Required before declaring compatibility

- [x] Run the JavaScript formatter and linter, then rebuild the production assets.
- [x] Confirm that the generated block icon retains `fill="currentColor"` and that the generated `render.php` contains the direct-access guard.
- [x] Test with a WordPress 7.1 Release Candidate in both the post editor and Site Editor, including insertion, editing, saving, reopening, and front-end rendering.
- [x] Test both year formats, text before and after the year, site-name and privacy-policy links, alignment, typography, borders, spacing, colors, gradients, and background images.
- [x] Test automatic insertion through Block Hooks and the existing per-template opt-out behavior.
- [x] Test existing saved block instances to confirm backward compatibility.
- [x] Run Plugin Check against the release package and verify that development files, previous ZIP files, hidden files, and `node_modules` are excluded.
- [x] Finalize the release package and prepare the Git and WordPress.org SVN release directories.

## Separate, optional follow-ups

- [ ] Evaluate the WordPress 7.1 `background.gradient` support in a separate change. Preserve rendering and editing of blocks saved with the legacy color-gradient support; do not migrate automatically.
- [ ] Replace global `wp.date.dateI18n()` usage with an explicit `@wordpress/date` import so the build declares the dependency directly.

