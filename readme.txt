=== Plugin Name ===
Contributors: hallsofmontezuma
Donate link: http://semperfiwebdesign.com
Tags: security, securityscan, chmod, permissions, admin, administration, authentication, database, dashboard, post, notification, password, plugin, posts
plugins, private, protection, tracking, wordpress
Requires at least: 2.0
Tested up to: 2.5
Stable tag: 2.2.49

Scans your WordPress installation for security vulnerabilities.

== Description ==

Scans your WordPress installation for security vulnerabilities and suggests
corrective actions.

-passwords<br />
-file permissions<br />
-database security<br />
-version hiding

**Future Releases**

*one-click change file/folder permissions<br />
*test for XSS vulnerabilities<br />
*intrusion detection/prevention<br />
*lock out/log incorrect login attempts<br />
*user enumeration protection<br />
*WordPress admin protection/security*

== Installation ==

1. Create backup.
2. Upload the zip file to the `/wp-content/plugins/` directory
3. Unzip.
4. Activate the plugin through the 'Plugins' menu in WordPress


Please let me know any bugs, improvements, comments, suggestions.

== Frequently Asked Questions ==

= How do I change the file permissions on my WordPress installation?  =

From the linux command line (for advanced users):
    chmod xxx filename.ext
    (replace xxx with with the permissions settings for the file or folder)

From your FTP client:
    Most FTP clients, such as filezilla, etc, allow for changing file
permissions.  Please consult your clients documentation for your specific
directions.

For more information, please visit http://codex.wordpress.org/Changing_File_Permissions

= Why do I need to hide my version of WordPress?  =

Alot of attackers and automated tools will try and determine software versions
before launching exploit code. Removing your WordPress blog version may
discourage some attackers and certainly will mitigate virus and worm programs
that rely on software versions.

NOTE: Hiding your version of WordPress may break any plugins you have which
are version dependant.

== Screenshots ==

1. file/directories permissions check
2. password tools

== WordPress Security ==

<strong>Plugin currently in BETA version.

== WordPress Security ==

Security Scanner:

1. Scans Wordpress installation for file/directory permissions vulnerabilites
1. Recommends corrective actions
1. Scans for general security vulnerabilities

Join the BETA testers group if:

* you have experience as a software tester
* you have no experience as a software tester
* you have a WordPress installation dedicated for testing
* you have a general enthusiasm for WordPress use and/or development


Visit our homepage at [Semper Fi Web Design](http://semperfiwebdesign.com/ "Raleigh Web Design") or our plugin page at [Semper Fi Plugins][sf plugins].
We look forward to hearing your comments and suggestions.

[sf plugins]: http://semperfiwebdesign.com/wordpress/plugins
            "Raleigh Web Design"

> WordPress Security Scanner for *2.3, 2.5*. Although if you're using lower
> than 2.3 you should go ahead and install it because of **security**.

`<?php code(); // backticks ?>`
