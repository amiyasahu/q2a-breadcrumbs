<?php

/*
	Question2Answer (c) Gideon Greenspan
	Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

*/

/*
	Plugin Name: Q2A Breadcrumbs
	Plugin URI: http://amiyasahu.com
	Plugin Description: Provides a basic widget for displaying breadcrumbs 
	Plugin Version: 1.0
	Plugin Date: 2014-07-06
	Plugin Author: Amiya Sahu
	Plugin Author URI: http://www.amiyasahu.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.6
	Plugin Update Check URI: 
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	define('AMI_BREADCRUMBS_DIR', dirname(__FILE__));
	define('AMI_BREADCRUMBS_FOLDER', basename(dirname(__FILE__)));

	require_once AMI_BREADCRUMBS_DIR . "/qa-breadcrumbs-utils.php" ;
	
	qa_register_plugin_layer('qa-breadcrumbs-layer.php', 'Breadcrumbs Layer');	
	qa_register_plugin_module('module', 'qa-breadcrumbs-admin.php', 'q2a_breadcrumbs_admin', 'Breadcrumbs');
	qa_register_plugin_module('widget', 'qa-breadcrumbs-widget.php','q2a_breadcrumbs_widget','Breadcrumbs');
	qa_register_plugin_phrases('qa-breadcrumbs-lang-*.php', 'breadcrumbs');

/*
	Omit PHP closing tag to help avoid accidental output
*/