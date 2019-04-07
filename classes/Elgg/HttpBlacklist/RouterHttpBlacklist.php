<?php

namespace Elgg\HttpBlacklist;

class RouterHttpBlacklist {

	public static function routeHttpBlacklist(\Elgg\Hook $hook) {
		$return = $hook->getValue();

		if (!is_array($return)) {
			return;
		}

		if (elgg_is_logged_in()) {
			return $return;
		}

		$httpblkey = elgg_get_plugin_setting("httpblkey", "http_blacklist");
		if (!$httpblkey) {
			return $return;
		}

		$httpblmaxdays = elgg_get_plugin_setting("httpblmaxdays", "http_blacklist");
		$httpblmaxthreat = elgg_get_plugin_setting("httpblmaxthreat", "http_blacklist");
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

		return $return;
	}
}
