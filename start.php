<?php

/**
 * http:blacklist plugin
 * @package http:blacklist
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author iionly
 * @website https://github.com/iionly
 *
 */

use Elgg\HttpBlacklist\RouterHttpBlacklist;

elgg_register_plugin_hook_handler('route:rewrite', 'register', [RouterHttpBlacklist::class, 'routeHttpBlacklist'], 100);
elgg_register_plugin_hook_handler('route:rewrite', 'login', [RouterHttpBlacklist::class, 'routeHttpBlacklist'], 101);
elgg_register_plugin_hook_handler('route:rewrite', 'forgotpassword', [RouterHttpBlacklist::class, 'routeHttpBlacklist'], 102);
