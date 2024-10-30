=== Latest Content by Anything ===
Contributors: themecanvas
Donate link: https://displayposts.co.uk/donate/
Tags: shortcode, pages, posts, display, list 
Requires at least: 4.0
Tested up to: 6.5.2
Stable tag: 1.0.13
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display latest content by any taxonomy with shortcode.

== Description ==

This plugin allows you to display any content (posts, products, or custom post types) by any taxonomy using a simple shortcode.

This works with ANY Custom Post Type, Standard Posts or Woo Products.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `[latest_content_by_anything]` shortcode to display the latest content.

== Shortcode Options ==

- `num_items`: Number of items to display (default: 5).
- `post_type`: Type of content to display (default: post).
- `taxonomy`: Taxonomy to filter content by (optional).
- `term`: Term within taxonomy to filter content by (optional).
- `thumbnail_size`: Thumbnail size (default: thumbnail).
- `excerpt_length`: Excerpt length in words (default: 100).
- `display_titles`: Display titles (default: true).
- `layout`: Layout (default: vertical).
- `hide_price` : Hide or display price (true | false)

**Example :**

`[latest_content_by_anything post_type="post" num_posts=5]`

**Complete Example :**

`[latest_content_by_anything 
    num_items="5" 
    post_type="post" 
    taxonomy="category" 
    term="news" 
    thumbnail_size="thumbnail" 
    excerpt_length="100" 
    display_titles="true" 
    layout="vertical" 
    hide_price="false"
]`

**Full Documentation**

* [Documentation](https://displayposts.co.uk) we are working on the documentation daily to show examples of all scenarios
* [Feature Requests](https://displayposts.co.uk/feature-requests/)


== Changelog ==

= 1.0 =
* Initial release.

= 1.0.12 =
* Fixed Error with Woo Categories.
* Fixed Error with Woo Prices

= 1.0.13 =
* Minor Bug Fixes
* Improved availability to Docs

== Frequently Asked Questions ==

= How do I use this plugin? =
Simply use the `[latest_content_by_anything]` shortcode with appropriate options to display the latest content on your site.
= Does this work in Elementor? =
Whilst it does not have any specific Elementor functionality, the shortcode has been tested on Elementor & WP Bakery without any issues.

== Upgrade Notice ==

= 1.0 =
Initial release.



