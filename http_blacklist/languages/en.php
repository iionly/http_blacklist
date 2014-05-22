<?php

return array(
	'http_blacklist:httpblkey' => 'Enter your Project Honey Pot API key: ',
	'http_blacklist:httpblkey:description' => '(Register a free account at http://www.projecthoneypot.org/ and create your personal API key)',
	'http_blacklist:httpblmaxdays' => 'Period in days to block/redirect blacklisted IPs: ',
	'http_blacklist:httpblmaxdays:description' => '(value between 0 and 255 days; if an IP has been reported to the blacklist last within this period it gets dealed with)',
	'http_blacklist:httpblmaxthreat' => 'Block/redirect blacklisted IPs with a threat score higher than...',
	'http_blacklist:httpblmaxthreat:description' => '(value between 0 and 255; a higher threat score means a more serious threat; set the threshold value here for the score)',
	'http_blacklist:httpblhoneypot' => 'Your honeypot site (optional). Enter URL without http:// for the redirect: ',
	'http_blacklist:httpblhoneypot:description' => '(more info about setting up a honeypot site at the Project Honey Pot website; if you don\'t provide a URL here the malicious IPs get blocked instead of redirected)',
	'http_blacklist:counter' => 'Number of accesses blocked or redirected: ',
	'http_blacklist:counter:description' => '(The counter shows the number of times an access to the login, register or forgotpassword pages was blocked or redirected due to a blacklist entry of the visitor)',
	'http_blacklist:reset' => 'Reset counter',
	'http_blacklist:resetconfirm' => 'Do you really want to reset the counter to zero?'
);