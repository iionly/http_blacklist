<?php

/**
 * http:blacklist plugin
 * @package http:blacklist
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author iionly
 * @website https://github.com/iionly
 *
 */

elgg_register_event_handler('init', 'system', 'http_blacklist_init');

function http_blacklist_init() {

	if(!elgg_is_logged_in() && elgg_get_plugin_setting("httpblkey", "http_blacklist")) {
		elgg_register_plugin_hook_handler('route', 'all', 'http_blacklist_router');
	}

	elgg_register_action('http_blacklist/reset', dirname(__FILE__) . '/actions/http_blacklist/reset.php', 'admin');
}

function http_blacklist_router($hook, $type, $return, $params) {

	/**
	 * Using of 'route', 'all' plugin hook inspired by Spam Login Filter plugin
	 * (also the code for reconstructing the URI is from this plugin)
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ray J
	 */

	// Which pages to block access to? Currently hard-coded...
    $protect_uris = ['register', 'forgotpassword', 'login'];

	// Reconstruct URI
	if (is_array($return['segments'])) {
		$parts = array_merge([$return['identifier']], $return['segments']);
		$uri = implode('/', $parts);
	} else {
		$uri = $return['identifier'];
	}

	// Do we have to proceed?
	if (!in_array($uri, $protect_uris)) {
		return $return;
	}

	/**
	 * code for query the IP at Project Honey Pot (http:bl) found at http://www.michel-kraemer.com/anti-spam-phpbb3
	 * Right now not much happens here apart from blocking (or redirecting) access if the IP is blacklisted
	 * More functionality maybe/likely in future versions of the http:blacklist plugin
	 */

	// Retrieve plugin settings
	$httpblkey = elgg_get_plugin_setting("httpblkey", "http_blacklist");
	if ($httpblkey) {
		$httpblmaxdays = elgg_get_plugin_setting("httpblmaxdays", "http_blacklist");
		if(!$httpblmaxdays) {
			$httpblmaxdays = 21;
		}
		$httpblmaxthreat = elgg_get_plugin_setting("httpblmaxthreat", "http_blacklist");
		if(!$httpblmaxthreat) {
			$httpblmaxthreat = 25;
		}
		$httpblhoneypot = elgg_get_plugin_setting("httpblhoneypot", "http_blacklist");

		// IP address of visitor
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		// Query this IP
		$result = explode(".", gethostbyname($httpblkey.".".implode(".", array_reverse(explode(".", $ip))).".dnsbl.httpbl.org"));

		if ($result[0] != 127) {
			//something went wrong or the IP is not in the database.
			//ignore this one.
			return $return;
		}

		// Evaluate the reply
		$days = $result[1];
		$threat = $result[2];

		// if $result[0] is equal 0 it's a known search engine. In this case $result[1] and $result[2] have different meanings
		if (($result[3] != 0) && ($days < $httpblmaxdays) && ($threat > $httpblmaxthreat)) {
			$plugin = elgg_get_plugin_from_id('http_blacklist');
			if (!$plugin->counter) {
				$plugin->counter = 0;
			}
			++$plugin->counter;

			if ($httpblhoneypot) {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$httpblhoneypot);
				exit;
			} else {
				ob_end_clean();
				header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
				echo "403 Forbidden";
				exit;
			}

			return false;
		}
	}
}
