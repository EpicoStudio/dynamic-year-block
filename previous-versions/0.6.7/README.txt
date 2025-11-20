=== Dynamic Year Block – display a copyright notice in your footer with the current year ===
Contributors:      pagelab, epicostudio
Tags:              year, date, dynamic, copyright, footer
Tested up to:      6.8
Requires at least: 6.6
Requires PHP:      7.4
Stable tag:        0.6.7
License:           GPL 2.0 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Donate link:       https://ubr.link/donate-wp

A block that always displays the current year in your footer copyright notice.

== Description ==

🆕 **New features**: now you can add a background image and the link to your Privacy Policy page with a couple of clicks.

The **Dynamic Year Block** will automatically update the copyright year in your website footer. At the turn of each year, the number will automatically change to reflect the current year, freeing you from manually editing the year every new year's eve.

The plugin works for both classic and block themes, but it is especially useful in the context of the **Site Editor**, where you can visually change the footer template part without messing with code. Just insert the Dynamic Year Block, enter your copyright notice and you're done. 💪

You can open [this WordPress Playground site](https://playground.wordpress.net/?plugin=dynamic-year-block) in your browser to quickly test it.

⚠️ **Important**: please configure your timezone in “Settings → General → Timezone” in your WordPress dashboard, so that the year displayed by the block matches your server time and the timezone set in WordPress.

This is a community plugin that can always be downloaded for free without any paid subscription from [the official WordPress repository](https://wordpress.org/plugins/dynamic-year-block/).

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
With this plugin, you can insert a complete copyright statement in your website's footer, including the current year, a link to your privacy policy page, and additional text that you can customize at will. The plugin is highly customizable and works perfectly with your theme's design.

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

= The link to my privacy policy does not appear on the front end. =
The block works only with the native Privacy Policy page. You can create one under “Settings → Privacy”, clicking the “Create button” on the “Settings” tab. Also, make sure your Privacy Policy page is published.

= Does the plugin use the client time (via Javascript) or the server time (via PHP) to update the year? =
The plugin uses a WordPress core function ([`current_datetime`](https://developer.wordpress.org/reference/functions/current_datetime/)) to get your server time, using the timezone specified in the “Settings → General → Timezone” on your WordPress dashboard. So it is important to set your timezone in order to display the year correctly, especially at the turn of the year.

= Is the included copyright notice enough to safeguard my website regarding legal issues? =
Most probably not. While the plugin offers a basic copyright notice, it doesn't automatically solve all legal issues your website may have, nor does it constitute legal advice in any way. The site owner is solely responsible for ensuring that the website respects the law.

= Where can I send feedback or support questions? =
Please reach out via the official [plugin support forum](https://wordpress.org/support/plugin/dynamic-year-block).

Feel free to ask questions, request new features or report bugs.

You can also follow the development of the plugin in the official Épico Studio [GitHub repository](https://github.com/EpicoStudio/dynamic-year-block), where you can see the complete code.

= How can I support the development of the Dynamic Year Block? =
You can help with a [donation](https://ubr.link/donate-wp), by [visiting our website](https://epico.studio) or publishing a [positive review](https://wordpress.org/support/plugin/dynamic-year-block/reviews/#new-post), if you find it useful.

== Screenshots ==

1. Searching for the Dynamic Year Block in the block inserter.
2. Block added in the footer copyright message.
3. Block settings: you can choose between a two or four-digit year, as well as other useful options.
4. A single block to create your entire footer copyright notice.
5. Customizing the block.


== Changelog ==

= 0.6.7 =
* Improved block registration.

= 0.6.6 =
* Updated the code for WordPress version 6.8.
* Added support for wp_register_block_types_from_metadata_collection() to load the block more efficiently.
* Refactor the PHP code for better maintainability and legibility.

= 0.6.5 =
* Added support for a background image.
* Added a toggle in the UI to include the link for the Privacy Policy page.
* Removed support for the anchor (it's not supported for dynamic blocks yet).
* Updated the code for WordPress version 6.7.
* Complete review of the code using the official Plugin Check plugin.

= 0.6.4 =
* Security and reliability enhancements.
* Refactored the option that inserts the text after the current year to default to the privacy policy link.
* Updated the code for WordPress version 6.6.

= 0.6.3 =
* Updated the code for WordPress version 6.5.

= 0.6.2 =
* Added support for block hooks.
* Updated the code for WordPress version 6.4.

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
* Updated the code for WordPress version 6.3.

= 0.3.0 =
* Added missing translation strings.
* Updated the code for WordPress version 6.2.

= 0.2.0 =
* Added missing translation strings.
* Updated the code for WordPress version 6.1.

= 0.1.0 =
* Initial release
