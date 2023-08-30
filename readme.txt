=== Dynamic Year Block – display a copyright notice in your footer with the current year ===
Contributors:      pagelab, epicostudio
Tags:              year, date, dynamic, copyright, footer, block
Tested up to:      6.3.1
Requires at least: 5.9
Requires PHP:      7.0
Stable tag:        0.6.1
License:           GPL 2.0 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Donate link:       https://ubr.link/donate-wp

A block that always displays the current year in your footer copyright notice.

== Description ==

The **Dynamic Year Block** will automatically update the copyright year in your website footer. At the turn of each year, the number will automatically change to reflect the current year, freeing you from manually editing the year every new year's eve.

The plugin works for both classic and block themes, but it is especially useful in the context of the **Site Editor**, where you can visually change the footer template part without messing with code. Just insert the Dynamic Year Block, enter your copyright notice and you're done. 💪

You can open [this WordPress Playground site](https://playground.wordpress.net/?plugin=dynamic-year-block) in your browser to quickly test it.

⚠️ **Important**: please configure your timezone in “Settings → General → Timezone” in your WordPress dashboard, so that the year displayed by the block matches your server time and the timezone set in WordPress.


== Installation ==

= Automatic installation: =
1. Open any post or page in your WordPress.
2. Click the main plus icon (+), located at the upper left corner of the editor, to add a new block.
3. Type “Dynamic Year Block” in the search field.
4. Look for the plugin with this name in the list of available block plugins and click to install.
5. Wait for the installation process and the block will be available to use in your content. You can deactivate it in the “Plugins → All plugins” menu, in your WordPress admin dashboard.

= Manual Installation: =
1. Upload the dynamic-year-block.zip file via the plugin page of WordPress by clicking “Add New” and selecting the zip from your local computer, or alternatively upload the decompressed `dynamic-year-block` folder to your `/wp-content/plugins/` directory on your server, via SFTP/FTP.
2. Activate the plugin through the “Plugins” menu in WordPress.
3. Search for the “Dynamic Year” block in any block inserter within the block editor.
4. Optionally, customize the year format in the sidebar of the block editor. The plugin does not create menus or additional settings in the WordPress dashboard.

== Frequently Asked Questions ==

= Why would I need this? =
This eliminates the need to manually edit the year of your website's copyright statement,  usually located at the bottom of each page.

= What is the recommended way to use it? =
It is recommended to insert it in the footer template part of your block theme, but it can be used anywhere in your content.

Also, you will probably want to use it within a **Row** block to make it appear horizontally with other text elements, as demonstrated in the fourth screenshot above.

= Is it possible to insert text before and after the current year? =
Yes, this has been possible since version 0.5.0. You can also align the text. If you do not see these options in the block inspector on your sidebar, update your plugin to the latest version.

= Will this plugin hinder my website loading performance? =
Not at all, the plugin is quite simple. It does not add any CSS or Javascript on its own. If you want to style the text in any way, you will use the Block Editor's native features to do so.

= Does this plugin collect any data from me or my users? =
Absolutely not, the plugin respects your privacy. It's completely add-free and the code only uses core WordPress functions.

= Does this plugin work in the Classic Editor? =
No, this plugin works exclusively in the Block Editor.

= Does the plugin use the client time (via Javascript) or the server time (via PHP) to update the year? =
The plugin uses a WordPress core function ([`current_datetime`](https://developer.wordpress.org/reference/functions/current_datetime/)) to get your server time, using the timezone specified in the “Settings → General → Timezone” on your WordPress dashboard. So it is important to set your timezone in order to display the year correctly, especially at the turn of the year.

= Where can I send feedback or support questions? =
Please reach out via the official [plugin support forum](https://wordpress.org/support/plugin/dynamic-year-block).

Feel free to ask questions, request new features or report bugs.

You can also follow the development of the plugin in the official Épico Studio [GitHub repository](https://github.com/EpicoStudio/dynamic-year-block), where you can see the complete code.

= How can I support the development of the Dynamic Year Block? =
You can help with a [donation](https://ubr.link/donate-wp), by [visiting our website](https://epico.studio) or publishing a [positive review](https://wordpress.org/support/plugin/dynamic-year-block/reviews/#new-post), if you find it useful.

== Screenshots ==

1. Searching for the Dynamic Year Block in the block inserter.
2. Block added in the footer copyright message.
3. Block settings: you can choose between a two-digit and four-digit year.
4. Adding the Dynamic Year Block block inside a Row block to display it horizontally with other blocks.


== Changelog ==

= 0.6.1 =
* Bug fix: the linked site title appears on the front-end as expected.
* Bug fix: preventing the default link behaviour on the editor window.
* Accessibility improvement: added the aria-current attribute for the site title link.

= 0.6.0 =
* Refactored the option to insert text before and after the current year.
* Added the option to insert the linked site title after the year.

= 0.5.0 =
* Added the option to insert text before and after the current year.
* Added the option to align the text within the block.

= 0.4.0 =
* Added support for gradients and alignments.
* Updated the code for WordPress version 6.3

= 0.3.0 =
* Added missing translation strings.
* Updated the code for WordPress version 6.2

= 0.2.0 =
* Added missing translation strings.
* Updated the code for WordPress version 6.1

= 0.1.0 =
* Initial release
