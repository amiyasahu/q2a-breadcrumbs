<?php

/*
	Question2Answer (c) Gideon Greenspan
	Google Plus Badge (c) Amiya Sahu (developer.amiya@outlook.com)
	
	http://www.question2answer.org/

	
	File: qa-plugin/basic-adsense/qa-plugin.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Initiates Adsense widget plugin


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

/*
	Plugin Name: Breadcrumbs
	Plugin URI: https://github.com/amiyasahu/q2a-breadcrumbs
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