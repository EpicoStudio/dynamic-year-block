=== Dynamic Year Block ===
Contributors:      Márcio Duarte
Tags:              gutenberg, block, blocks, year, current, copyright, footer
Tested up to:      6.0
Requires at least: 5.9
Requires PHP:      7.0
Stable tag:        1.0.0
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Donate link:       https://www.paypal.com/donate/?business=38CHEXT22X57J&no_recurring=0&item_name=Thanks+for+donating%21&currency_code=BRL

A block that always displays the current year.

== Description ==

Auto update the copyright year in your website footer dynamically. At the turn of each year, the number will automatically change to reflect the current year.

== Installation ==

1. Upload the `dynamic-year-block` folder to your `/wp-content/plugins/` directory or alternatively upload the dynamic-year-block.zip file via the plugin page of WordPress by clicking “Add New” and selecting the zip from your local computer.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Search for the “Current year” block in any block inserter within the block editor.

== Frequently Asked Questions ==
= Where can I send feedback or support questions? =
Please reach out via the official [plugin support forum](https://wordpress.org/support/plugin/dynamic-year-block).

= Is there a Github repo for this plugin? =

Yes, there is, [visit the GitHub repo](https://github.com/Uberfacil/dynamic-year-block).

= Is this a static or a dynamic block? =

This is a dynamic block, as it is recommended to set the current year dinamically, based on your server time in conjunction with your specific timezone.

= Does the plugin use the client (via Javascript) or the server time (via PHP) to update the year? =

The plugin uses a WordPress core function ([`current_datetime`](https://developer.wordpress.org/reference/functions/current_datetime/)) to get your server time with using timezone specified in the “Settings → General → Timezone” on your WordPress dashboard, so it is important to set your timezone in order to display the year correctly, especially at the turn of the year.

== Screenshots ==

1. Adding the block in the footer template.
2. Block options.

== Changelog ==

= 0.1.0 =
* Initial release
