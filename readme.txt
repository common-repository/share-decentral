=== Share Decentral ===
Contributors: NodeCode
Tags: social, share, buttons, like, decentral, facebook, twitter, google, google-plus, privacy, security, plugin, page, post
Requires at least: 3.0.1
Tested up to: 3.8.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The original Facebook, Twitter and Google+ Share Buttons, but without external connections. Simple plugin, pure HTML & CSS, no JavaScript.

== Description ==

This Plugin adds the original Facebook, Twitter and Google+ Share Buttons after your post content, but without establish external connections.

* simple, lightweight and secure
* no external connections before clicking, protects the privacy
* only HTML and CSS, no JavaScript, no external images
* better than "2 clicks for more privacy"-buttons

= Use in Template =

By default, the buttons are inserted after the content. If you want to prevent the automatic insert, you can insert the following code into the functions.php:
`<?php $share_decentral_auto = false; ?>`

The following functions are available in templates:

* `the_share_decentral($class)` – Displays the buttons on the template.
* `share_decentral($class)` – Returns the buttons as HTML code.

With the parameter `$class` (optional) you can add custom CSS classes, separated with white spaces.

Plugin by [NodeCode](http://nodecode.de/ "Node.js Tutorials (german / deutsch)")

== Installation ==

1. Upload `share-decentral` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Ready!

== Screenshots ==

1. Screenshot

== Changelog ==

= 1.0 =
* initial release