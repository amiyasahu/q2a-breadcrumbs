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

		qa_html_theme_base::head_custom();
		if($this->template!='admin'){
			$this->output('
						<style>
						'.qa_opt(q2a_breadcrumbs_admin::CUSTOM_CSS).'				
						</style>'
			     );
		}
		
	}
	// registering scripts and css
	function head_css()
	{
		qa_html_theme_base::head_css();
		$breadcrumb_css_url = qa_opt('site_url').'qa-plugin/'.AMI_BREADCRUMBS_FOLDER.'/css/breadcrumbs-styles.css';
        $this->output('<link rel="stylesheet" TYPE="text/css" href="'.$breadcrumb_css_url.'"/>');
        $fa_cdn = qa_opt(q2a_breadcrumbs_admin::FA_CDN) ;
        if (qa_opt(q2a_breadcrumbs_admin::USE_FA_CDN) && !empty($fa_cdn)) {
        	$this->output('<link rel="stylesheet" TYPE="text/css" href="'.$fa_cdn.'"/>');
        } else {
			$icons = qa_opt('site_url').'qa-plugin/'.AMI_BREADCRUMBS_FOLDER.'/css/font-awesome.min.css';
	        $this->output('<link rel="stylesheet" TYPE="text/css" href="'.$icons.'"/>');
        }
	}
}


	
