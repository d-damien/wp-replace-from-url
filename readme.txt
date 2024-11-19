=== Replace from URL ===
Contributors: d-damien
Tags: url, replace, parameter
Requires at least: 6.0
Requires PHP: 8.1
License: MIT

Fill a displayed string with URL parameters.

== Description ==
Here is the use-case I had in mind when building this.
You want to display a series of forms (with an "id" parameter in their URL) in an iframe, but they are too big and would need their own page.
But you also want this page to be part of the site to have the WP menus still available.

Assuming your forms are at https://abc.com/forms/{id}/show, here is how you could use the shortcode :

[replace_from_url str='<iframe src="https://abc.com/stuff/{id}/show"></iframe>' params='{"id": "\d+"}' prefix='rfu_']

If you reach the page https://mysite.com/myforms?rfu_id=556

This will display :
<iframe src="https://abc.com/stuff/556/show"></iframe>

== Parameters ==
* str : The parameterized string (possibly HTML) you want to have filled. Parameters must be enclosed like {this}.
* params : Serialized JSON object with key = param name, and value = validation regex. Have something as constrained as possible for security, such as \d+ or \w+.
* prefix : To avoid conflicting with other page parameters, a prefix is possible. For example with "rfu_", your page then needs to be reached with https://mysite.com/myforms?rfu_id=556 etc


== Changelog ==
= 0.1.0 =
* Init features with configurable param names & regex, and prefix to avoid namespace collisions.

