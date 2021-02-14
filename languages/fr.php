<?php

return [
	'http_blacklist:httpblkey' => 'Entrez la clé API d\'Honey Pot : ',
	'http_blacklist:httpblkey:description' => '(Créer un compte gratuit sur http://www.projecthoneypot.org/ pour créer votre clé API)',
	'http_blacklist:httpblmaxdays' => 'Période en jours pour bloquer/réorienter les IP inscrits sur la liste noire :',
	'http_blacklist:httpblmaxdays:description' => '(valeur comprise entre 0 et 255 jours ; si une IP a été signalée à la liste noire pour la dernière fois au cours de cette période, elle sera traitée)',
	'http_blacklist:httpblmaxthreat' => 'Bloquer/diriger les IP figurant sur la liste noire avec un score de menace supérieur à ...',
	'http_blacklist:httpblmaxthreat:description' => '(valeur comprise entre 0 et 255 ; un score de menace plus élevé signifie une menace plus grave ; fixez ici la valeur seuil du score)',
	'http_blacklist:httpblhoneypot' => 'Votre site de pot de miel (facultatif). Entrez l\'URL sans http:// pour la redirection : ',
	'http_blacklist:httpblhoneypot:description' => '(plus d\'informations sur la mise en place d\'un site pot de miel sur le site du projet Honey Pot ; si vous ne fournissez pas d\'URL ici, les IP malveillantes seront bloquées au lieu d\'être redirigées)',
	'http_blacklist:counter' => 'Nombre de connexions bloquées ou redirigées : ',
	'http_blacklist:counter:description' => '(Le compteur indique le nombre de fois qu\'un accès aux pages de connexion, d\'enregistrement ou d\'oubli de mot de passe a été bloqué ou redirigé en raison d\'une entrée sur liste noire du visiteur)',
	'http_blacklist:reset' => 'Remettre le compteur à zéro',
	'http_blacklist:resetconfirm' => 'Vous voulez vraiment remettre le compteur à zéro ?',
	'http_blacklist:success_reset' => 'Le compteur a été remis à zéro.',
];