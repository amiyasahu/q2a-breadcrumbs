<?php
/*
	Question2Answer (c) Gideon Greenspan
	Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)
*/

/* don't allow this page to be requested directly from browser */	
if (!defined('QA_VERSION')) {
		header('Location: /');
		exit;
}

class qa_html_theme_layer extends qa_html_theme_base {

	function head_custom()
	{
        require_once AMI_BREADCRUMBS_DIR . '/qa-breadcrumbs-admin.php' ;

		qa_html_theme_base::head_custom();

		$this->output('
				<style>
				'.qa_opt(q2a_breadcrumbs_admin::CUSTOM_CSS).'				
				</style>'
			     );
	}
	// registering scripts and css
	function head_css()
	{
		qa_html_theme_base::head_css();
		$breadcrumb_css_url = qa_opt('site_url').'qa-plugin/'.AMI_BREADCRUMBS_FOLDER.'/breadcrumbs-styles.css';
		$icons = qa_opt('site_url').'qa-plugin/'.AMI_BREADCRUMBS_FOLDER.'/icomoon.css';
        $this->output('<link rel="stylesheet" TYPE="text/css" href="'.$breadcrumb_css_url.'"/>');
        $this->output('<link rel="stylesheet" TYPE="text/css" href="'.$icons.'"/>');
	}
}


	
