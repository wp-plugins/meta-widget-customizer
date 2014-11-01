=== Meta Widget Customizer ===
Contributors: benohead, amazingweb-gmbh
Donate link: http://benohead.com/wordpress-meta-widget-customizer/
Tags: meta,widget,customize,custom,links,hide,sidebar
Requires at least: 2.8
Tested up to: 4.0
Stable tag: 0.6.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a customizable meta widget for the sidebar

== Description ==

This plugin provides an alternative to the WordPress Meta widget. It also shows by default the same 5 links (register, login or logout, entries RSS, comments RSS and the link to wordpress.org. But it allows you to hide the ones you do not want to see.

Additionally it allows displaying a few other links:
- A password lost link
- Edit this page/post link
- Dashboard (site admin) link
- XHTML validator link

These three links can also be hidden or shown. They will also only display if appropriate (depending on whether the user is logged in, which its rights, the type of page...).

The third improvement is that you can add any number of additional links by selecting a links category to be displayed in the meta box.

Instead of the login/register/password lost links, you can also have a tabbed sub-widget providing all these in-page (not as a link but as a functionality in the widget itself)

You can also display entries from a configurable RSS feed, include a Google search box and allow the site to be translated.

== Installation ==

1. Upload `meta-widget-customizer.php.php` to the `/wp-content/plugins/` directory or a subfolder (e.g. `/wp-content/plugins/meta-widget-customizer/`)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the widget (Meta Widget Customizer) to your sidebar
4. Select which links you want to have displayed

== Frequently Asked Questions ==

= How can I contact you with a complaint, a question or a suggestion? =
Send an email to henri.benoit@gmail.com

== Screenshots ==

1. This screenshot shows how the widget looks like in the widget administration.

2. How the widget looks like with the tabbed login/register/lost password, the entries RSS link and a custom link.

== Changelog ==

= 0.6.3 =
Use standard redirect for password lost

= 0.6.2 =
Fixed warnings and notices in debug mode
Fixed redirect issue
Remove WordPress test cookie

= 0.6.1 =
No functionality change. Just fixed version numbers

= 0.6 =
Fixed problem with sites that are not hosted on the root directory
Fixed empty tabs and only shows tabs which are relevant
Fixed problem with iframes
Better adapts to the site look&feel

= 0.5 =
Added translation support using Google translate

= 0.4 =
Added Google search box and in-widget login, register, lost password UI.

= 0.3 =
Added support for displaying entries from a configurable RSS feed as well as for:
- XHTML validator link

= 0.2 =
Added support for displaying the links from a specified link category as well as for:
- A password lost link
- Edit this page/post link
- Dashboard (site admin) link

= 0.1 =
First version only supporting hiding the default links.

== Upgrade Notice ==

n.a.
