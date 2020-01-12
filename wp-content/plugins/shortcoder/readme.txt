=== Shortcoder ===
Contributors: vaakash
Author URI: https://www.aakashweb.com/
Plugin URI: https://www.aakashweb.com/wordpress-plugins/shortcoder/
Tags: shortcode, html, javascript, shortcodes, snippets, posts, pages, widgets, insert, adsense, ads, code
Donate link: https://www.paypal.me/vaakash/
License: GPLv2 or later
Requires PHP: 5.3
Requires at least: 4.4
Tested up to: 5.3.2
Stable tag: 5.1

Create custom "Shortcodes" easily for HTML, JavaScript snippets and use the shortcodes within posts, pages & widgets.

== Description ==

Shortcoder plugin allows to create a custom shortcodes for HTML, JavaScript and other snippets. Now the shortcodes can be used in posts/pages and the snippet will be replaced in place.

= Create custom shortcodes easily =
1. Give a name for the shortcode
1. Paste the HTML/JavaScript as content
1. Save !
1. Now insert the shortcode `[sc name="my_shortcode"]` in your post/page.
1. **Voila !** You got the HTML/Javascript in your post.

= Features =

* Create **"custom shortcodes"** easily and use them within WordPress
* Use any kind of **HTML** as Shortcode content.
* Insert: **Custom parameters** in shortcode
* Insert: **WordPress parameters** in shortcode
* Multiple editors: Code, Visual and text modes.
* Globally disable the shortcode when not needed.

= An example usage =

1. Create a shortcode named "adsenseAd" in the Shortcoder admin page.
1. Paste the adsense code in the box given and save it.
1. Use `[sc name="adsenseAd"]` in your posts and pages.
1. Tada !!! the ad code is replaced and it appears in the post.
1. Now you can edit the ad code at one place and the code is updated in all the locations where the shortcode is used.

* Using this idea, shortcodes can be created for frequently used snippets.
* You can also add [custom parameters](https://www.aakashweb.com/docs/shortcoder-doc/) (like `%%id%%`) inside the snippets, and change it's value like `[sc name="youtube" id="GrlRADfvjII"]`

= Resources =

* [Documentation](https://www.aakashweb.com/docs/shortcoder-doc/)
* [FAQs](https://www.aakashweb.com/docs/shortcoder-doc/)
* [Support/Report bugs](https://www.aakashweb.com/forum/)

== Installation ==

1. Extract the zipped file and upload the folder `Shortcoder` to to `/wp-content/plugins/` directory.
1. Activate the plugin through the `Plugins` menu in WordPress.
1. Open the admin page from the "Shortcoder" link in the navigation menu.

== Frequently Asked Questions ==

Please visit the [plugin documentation page](https://www.aakashweb.com/docs/shortcoder-doc/) for complete list of FAQs.

= What are the allowed characters for shortcode name ? =

Allowed characters are alphabets, numbers, hyphens and underscores.

= My shortcode is not working in my page builder ! =

Please check with your page builder plugin to confirm if the block/place/area where the shortcode is being used can execute shortcodes. If yes, then shortcode should work fine just like regular WordPress shortcodes.

= My shortcode is not working ! =

Please check the following if you notice that the shortcode content is not printed or when the output is not as expected.

* Please verify if the shortcode content is printed. If shortcode content is not seen printed, check the shortcode settings to see if any option is enabled to restrict where and when shortcode is printed. Also confirm if the shortcode name is correct and there is no duplicate `name` attribute for the shortcode.
* If shortcode is printed but the output is not as expected, please try the shortcode content in an isolated environment and confirm if the shortcode content is working correctly as expected. Sometimes it might be external factors like theme, other plugin might conflict with the shortcode content being used.
* There is a known limitation in shortcodes API when there is a combination of unclosed and closed shortcodes. Please refer [this document](https://codex.wordpress.org/Shortcode_API#Unclosed_Shortcodes) for more information.

== Screenshots ==

1. Shortcoder admin page.
2. Editing a shortcode.
3. "Insert shortcode" popup to select and insert shortcodes.
4. A shortcode inserted into post.
5. Shortcoder block for Gutenberg editor.
6. Shortcoder executed in the post.

[More Screenshots](https://www.aakashweb.com/wordpress-plugins/shortcoder/)

== Changelog ==

= 5.1 =
* New: Import/Export link added to the shortcoder list page.
* Fix: `empty()` was throwing error at some places for users using PHP 5.5 below as function return value was passed to it.
* Fix: Shortcoder QTTags button was loading in frontends.
* Fix: "Insert shortcode" popup was hidden behind in theme customizer page.
* Fix: `array_key_exists` array but bool given warning.
* Fix: Hide comments metabox in shortcode edit page as it was shown in certain conditions.

= 5.0.4 =
* Fix: `script` and `style` tags stripped after 4.x upgrade. New migration will run in this version and shortcode content will now be fixed.

= 5.0.3 =
* Fix: Shortcode content is not escaped when code editor is used. This is requirement because `post_content` behaves strangely when user has rich editing enabled.

= 5.0.2 =
* Fix: Shortcodes inside shortcode content not getting executed.
* Fix: Disable Gutenberg block for older not supported WordPress versions.

= 5.0.1 =
* Fix: Code editor escaping HTML characters.
* Fix: `get_current_screen()` undefined.
* Fix: Code editor breaks if there is any other plugin which loads codemirror.
* Fix: `tools.php` is not found.

= 5.0 =
* New: Brand new version. Plugin rewritten from scratch.
* New: Shortcoder block for the block editor.

= 4.4 =
* New: Insert shortcode automatically adds "closing tag" if the shortcode has enclosed content parameter.
* Fix: Codemirror has been updated to latest version.

= 4.3 =
* New: Edit shortcode name after creating.
* New: Post modified date parameter added.
* Fix: Date parameters now display in site language.

= 4.2 =
* Fix: Some plugins fail to fire onload JS event since it was overwritten by shortcoder.
* Fix: Javascript in insert shortcode popup not working in IE 11.
* Fix: Missing parenthesis while calling `is_year`.
* Fix: Widgets page not loading insert shortcode popup.
* Fix: Removed settings emoji icon from plugin actions list.
* Fix: Load latest version 5.42.0 of codemirror.
* Fix: Updated minimum required WordPress version.

= 4.1.9 =
* Fix: Minor UI refinements for better experience.
* Fix: Import error where some exported JSON files have 0 as EOF.

= 4.1.8 =
* New: Insert custom fields in shortcode content.
* Fix: Removed comments in shortcode output

= 4.1.7 =
* New: Categorize, search and filter shortcodes using "tags".
* New: Last used shortcode editor will be saved along with shortcode.
* New: Enclosed shortcode content can now be used as shortcode parameter.
* New: Active line highlight has been enabled for code editor.
* Fix: Codemirror has been updated to latest version.
* Fix: Minor admin interface enhancements.

= 4.1.6 =
* New: Date variables can noe be added into shortcode content.
* Fix: Error "trying to get property of non-object" is handled.

= 4.1.5 =
* New: Bloginfo variables can now be added into shortcode content.

= 4.1.4 =
* New: Codemirror powered syntax highlighted shortcode content code editor (beta).

= 4.1.3 =
* Fix: Shortcode names with not-allowed characters cannot be edited/deleted.
* New: Shortcode imports made can now be fresh or overwritten.
* New: Only users with `manage_options` capability will see "edit shortcode" option in insert window.
* Fix: Import failure with UTF-8 characters.
* Fix: Case sensitive search in admin pages.
* Fix: Minor admin interface changes.

= 4.1.2 =
* New: Search box for shortcodes in admin page.

= 4.1.1 =
* Fix: HTTP 500 error because of syntax error in import module.

= 4.1 =
* New: Import/export feature for shortcodes.
* Fix: Visual editor is now disabled by default.
* Fix: Added instructions in admin page.

= 4.0.3 =
* New: Added feature to sort created shortcodes list.
* Fix: HTML errors in admin page

= 4.0.2 =
* Fix: Sometimes `get_current_screen()` was called early in some setups. 

= 4.0.1 =
* Fix: Servers with PHP version < 5.5 were facing HTTP 500 error because of misuse of PHP language construct in code.

= 4.0 =
* New: Plugin rewritten from scratch.
* New: Brand new administration page
* New: Shortcode vissibility settings, show/hide in desktop/mobile devices
* New: Insert WordPress information into shortcode content.
* Fix: Insert shortcode window is not loading.
* Fix: Unable to delete the shortcodes

(Older changelogs are removed from this list)

== Upgrade Notice ==

Version 5.0 is a major release.