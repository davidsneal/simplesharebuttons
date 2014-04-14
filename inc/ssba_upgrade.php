<?php

function upgrade_ssba($arrSettings) {

	// add print button
	add_option('ssba_custom_print', '');

	// update version number
	update_option('ssba_version', '3.6');
}
	
?>