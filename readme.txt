=== WP Themes by Screensize ===
Contributors: adamsargant
Donate link: http://www.sitecoders.net/wordpress-plugins/wp-themes-by-screensize/
Tags: themes, screensize, screenwidth, width, browser
Requires at least: 3.0.1
Tested up to: 3.2.1
Stable tag: 0.1.1

WP Themes by Screensize will allow you to determine which of two wordpress themes to display to the site visitor depending on their browser width

== Description ==

As of January 2011, some 86% of web users were using a browser with a screenwidth of greater than 1024. Conversely, 14% of users were using a browser less than 1024 wide. If you are coding a wordpress theme that is going to be static width, rather than fluid, this leaves you with limited choices. Do you

a) design for greater than 1024 to exploit the width used by the 86%, and thereby risk annoying 14% of your visitors or do you

b) design for less than 1024 and fail to exploit the maximum design area?

With WP Themes by Screensize you can now do both. WP Themes by Screensize will allow you to determine which theme to display to the site visitor depending on their browser width. If the width is determined to be above a specific threshold, which you set, it will display one theme. If it is below that threshold, it will display a different one, giving you the opportunity to create a modified theme to use in each case.

The plugin uses non identifying cookies and javascript… if either of these are not enabled the plugin degrades smoothly to the basic installed theme. The cookie period can be set to anything you want, so that if the user changes their browser size after that time, on the next page change the new settings are detected.

== Installation ==

1. Download `WP_Themes_by_Screensize.zip` from the Wordpress repository
2. Unzip the file
3. Upload the unzipped directory `WP_Themes_by_Screensize` to the `/wp-content/plugins/` directory
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Choose the cutoff browser width and the two themes you wish to use at Settings -> WP Themes by Screensize

== Frequently Asked Questions ==

= Why does the plugin use cookies =

I didn't want to be checking every new page to see what the screenwidth was. On the other hand, I wanted to be able to accomodate changes in browser size whiole someone was viewing the site. Setting the cookie duration will set the interval between checks. If it is set to say 60 seconds, the browser width will be checked on the first new page or page refresh after that time.

== Screenshots ==

1. Admin panel

== Changelog ==

= 0.1 =
* launch version

== Upgrade Notice ==

= 0.1 =
Launch version

