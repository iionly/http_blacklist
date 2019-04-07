<?php

$plugin = elgg_get_plugin_from_id('http_blacklist');
$plugin->counter = 0;

return elgg_ok_response('', elgg_echo('http_blacklist:success_reset'), REFERER);
