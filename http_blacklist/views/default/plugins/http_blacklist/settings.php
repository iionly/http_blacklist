<?php

$plugin = elgg_extract("entity", $vars);

if (!$plugin->counter) {
	$plugin->counter = 0;
}
$counter_reset = elgg_view("output/confirmlink", array('href' => elgg_get_site_url() . "action/http_blacklist/reset",
					'text' => elgg_echo('http_blacklist:reset'),
					'confirm' => elgg_echo('http_blacklist:resetconfirm'),
					'class' => 'elgg-button elgg-button-action'
));

if (!$plugin->httpblmaxdays) {
	$plugin->httpblmaxdays = 21;
}

if (!$plugin->httpblmaxthreat) {
	$plugin->httpblmaxthreat = 25;
}

?>
<div>
	<?php
		echo '<label>'.elgg_echo('http_blacklist:counter').$plugin->counter.'</label>';
		echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:counter:description').'</div>';
		echo '<div>'.$counter_reset.'</div>';
	?>
</div>
<div>
	<?php
		echo '<label>'.elgg_echo('http_blacklist:httpblkey').'</label>';
		echo elgg_view("input/text", array("name" => "params[httpblkey]", "value" => $plugin->httpblkey));
		echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:httpblkey:description').'</div>';
	?>
</div>
<div>
	<?php
		echo '<label>'.elgg_echo('http_blacklist:httpblmaxdays').'</label>';
		echo elgg_view("input/text", array("name" => "params[httpblmaxdays]", "value" => $plugin->httpblmaxdays));
		echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:httpblmaxdays:description').'</div>';
	?>
</div>
<div>
	<?php
		echo '<label>'.elgg_echo('http_blacklist:httpblmaxthreat').'</label>';
		echo elgg_view("input/text", array("name" => "params[httpblmaxthreat]", "value" => $plugin->httpblmaxthreat));
		echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:httpblmaxthreat:description').'</div>';
	?>
</div>
<div>
	<?php
		echo '<label>'.elgg_echo('http_blacklist:httpblhoneypot').'</label>';
		echo elgg_view("input/text", array("name" => "params[httpblhoneypot]", "value" => $plugin->httpblhoneypot));
		echo '<div class="elgg-subtext">'.elgg_echo('http_blacklist:httpblhoneypot:description').'</div>';
	?>
</div>
