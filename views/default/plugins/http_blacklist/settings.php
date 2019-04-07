<?php

$plugin = elgg_extract("entity", $vars);

$counter_reset = elgg_view("output/url", [
	'href' => elgg_get_site_url() . "action/http_blacklist/reset",
	'text' => elgg_echo('http_blacklist:reset'),
	'confirm' => elgg_echo('http_blacklist:resetconfirm'),
	'class' => 'elgg-button elgg-button-action'
]);

echo '<div><label>'.elgg_echo('http_blacklist:counter').$plugin->counter.'</label>';
echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:counter:description').'</div>';
echo '<div>'.$counter_reset.'</div></div>';

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('http_blacklist:httpblkey'),
	'#help' => elgg_echo('http_blacklist:httpblkey:description'),
	'name' => 'params[httpblkey]',
	'value' => $plugin->httpblkey,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('http_blacklist:httpblmaxdays'),
	'#help' => elgg_echo('http_blacklist:httpblmaxdays:description'),
	'name' => 'params[httpblmaxdays]',
	'value' => $plugin->httpblmaxdays,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('http_blacklist:httpblmaxthreat'),
	'#help' => elgg_echo('http_blacklist:httpblmaxthreat:description'),
	'name' => 'params[httpblmaxthreat]',
	'value' => $plugin->httpblmaxthreat,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('http_blacklist:httpblhoneypot'),
	'#help' => elgg_echo('http_blacklist:httpblhoneypot:description'),
	'name' => 'params[httpblhoneypot]',
	'value' => $plugin->httpblhoneypot,
]);
