http:blacklist for Elgg 1.9
Latest Version: 1.9.2
Released: 2014-05-22
Contact: iionly@gmx.de
License: GNU General Public License version 2
Copyright: (c) iionly


This plugin checks the IP addresses of site visitors against listings in the Project Honey Pot blacklist (http:bl). Currently, this is done only for logged-out visitors (+ bots/crawlers etc.) who visit the Login, Register or Lost Password pages. If a possible threatening IP is identified, it gets either blocked from accessing these pages or you can also redirect the access to a honeypot site that you have created.

For the plugin to work you need to register a (free) personal account at http://www.projecthoneypot.org and create your API key.



Installation:

1. Copy the http_blacklist plugin folder into you mod folder,
2. Enable the http:Blacklist plugin in the admin section of your site,
3. Enter at least your http:bl API key on the plugin's settings page.



Changelog:

1.9.2:

- Separate release for Elgg 1.9 to fix BC-breaking issue in 'route' plugin hook ($return['handler'] is now $return['identifier']).

1.8.2:

- Separation of plugin releases for Elgg 1.8 and Elgg 1.9 due to BC-breaking changes in 'route' plugin hook introduced in Elgg 1.9. For the Elgg 1.8 version there's no changes in the code but only this README file is updated.

1.8.1:

- Counter for number of blocked/redirected page accesses added. Counter is displayed on http:blacklist plugin settings page and can be reset.

1.8.0:

- Initial release for Elgg 1.8 and 1.9.
