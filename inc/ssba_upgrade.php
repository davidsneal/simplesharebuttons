<?php

function upgrade_ssba($arrSettings) {

	// add print button
	add_option('ssba_custom_print', '');
	
	// new for 3.8
	add_option('ssba_widget_text',	'Y');
	add_option('ssba_rel_nofollow',	'');

	// update version number
	update_option('ssba_version', '3.8');
}
	
?>