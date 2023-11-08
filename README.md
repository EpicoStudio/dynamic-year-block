![banner-1544x500-2024](https://github.com/EpicoStudio/dynamic-year-block/assets/1451087/617b9b26-e8db-43a4-8237-14b1d28cfa2f)

# Dynamic Year Block

* Donate link: https://ubr.link/donate-wp
* Tags: year, dynamic, date, copyright, footer, block
* Tested up to: 6.4
* Requires at least: 5.9
* Requires PHP: 7.0
* Stable tag: 0.6.2
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

## Does the plugin use the client time (via Javascript) or the server time (via PHP) to update the year?
The plugin uses a WordPress core function ([`current_datetime`](https://developer.wordpress.org/reference/functions/current_datetime/)) to get your server time, using the timezone specified in the “Settings → General → Timezone” on your WordPress dashboard. So it is important to set your timezone in order to display the year correctly, especially at the turn of the year.

## How can I support the development of the Dynamic Year Block?
You can help with a [donation](https://ubr.link/donate-wp), by [visiting our website](https://epico.studio) or publishing a [positive review](https://wordpress.org/support/plugin/dynamic-year-block/reviews/#new-post), if you find it useful.


