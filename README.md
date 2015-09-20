http:blacklist for Elgg 1.10 - 1.12 and Elgg 2.X
================================================

Latest Version: 1.10.3  
Released: 2015-09-20  
Contact: iionly@gmx.de  
License: GNU General Public License version 2  
Copyright: (c) iionly


Description
-----------

This plugin checks the IP addresses of site visitors against listings in the Project Honey Pot blacklist (http:bl). Currently, this is done only for logged-out visitors (+ bots/crawlers etc.) who visit the Login, Register or Lost Password pages. If a possible threatening IP is identified, it gets either blocked from accessing these pages or you can also redirect the access to a honeypot site that you have created.

For the plugin to work you need to register a (free) personal account at http://www.projecthoneypot.org and create your API key.


Installation
------------

1. If you have a previous version of the http:blacklist plugin installed, first remove the old http_blacklist plugin folder from your mod directory before copying/extracting the new version to your server,
2. Copy the http_blacklist plugin folder into you mod folder,
3. Enable the http:blacklist plugin in the admin section of your site,
4. Enter at least your http:bl API key on the plugin's settings page.
