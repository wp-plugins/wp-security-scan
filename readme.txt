=== Plugin Name ===
Contributors: hallsofmontezuma
Donate link: http://semperfiwebdesign.com
Tags: security, securityscan, chmod, permissions
Requires at least: 2.3
Tested up to: 2.5
Stable tag: .3.4

Scans your WordPress installation for security vulnerabilities.

== Description ==

Scans your WordPress installation for security vulnerabilities and suggests
corrective actions.

  -passwords
  -file permissions

Currently in <b>beta</b>, so use at your own risk if you like testing plugins.

== Installation ==

1. Upload `securityscan.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

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

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
