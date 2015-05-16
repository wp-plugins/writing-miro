=== Plugin Name ===
Contributors: Valentin Despa
Tags: distraction-free, editor, writing, focus, fullscreen, preview
Requires at least: 4.0.0
Tested up to: 4.2.2
Stable tag: 1.0.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A distraction free writing plugin for WordPress which removes any impediments when you are writing something.

== Description ==

A distraction free writing plugin for WordPress which removes any impediments when you are writing something.

You can focus on writing and forget about the rest.

Some of the feature include:

*   "Background" - Change it anytime to fit your mood.
*   "Music" (planned) as you type, relaxing music is being played in the background
*   "Typewriter" (planned) makes you remember the good 'ol times when you had a typewriter.

    This plugin is not a new invention. It has been inspired by:

*   Distraction Free Writing in WordPress (currently no longer available).
    See https://en.support.wordpress.com/distraction-free-writing/
*   Ommwriter (for Mac and Windows)

== Installation ==

This section describes how to install the plugin and get it working.

1. Unzip the archive to a folder called `writingMiro`.
2. Upload the folder `writingMiro` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Check `Settings` > `Writing Miro` to make changes to the plugin.
5. In your editor, click the "Distraction-free writing mode".

== Frequently Asked Questions ==

= Why can I not use if in PHP 5.2 =

This plugin is build using modern PHP features, such as namespaces, which are not available in PHP 5.2. Trying to run
it in this version will cause fatal errors.

Also PHP 5.2 is rather old, slower and may have security issues. Consider updating to a more recent PHP version.

== Screenshots ==

1. Easy to start. Just click the "Distraction-free writing mode" button.
2. Focus on writing, no distractions.

== Changelog ==

= 1.0.2 =
Fixes a problem with the plugin settings page (settings from other plugins were displayed as well)

= 1.0.1 =
Fixes an incompatibility with sg-cachepress (headers already sent by)

= 1.0.0 =
* Initial version with basic functionality.