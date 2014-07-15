<?php

	class qa_html_theme_layer extends qa_html_theme_base {

		function head_custom()
		{
            require_once AMI_BREADCRUMBS_DIR . '/qa-breadcrumbs-admin.php' ;

			qa_html_theme_base::head_custom();
			$breadcrumb_css_url = qa_opt('site_url').'qa-plugin/q2a-breadcrumbs/breadcrumbs-style.css';
			$this->output('
					<style>
					'.file_get_contents(AMI_BREADCRUMBS_DIR.'/breadcrumbs-styles.css').'				
					'.qa_opt(q2a_breadcrumbs_admin::CUSTOM_CSS).'				
					</style>'
				     );
		}
		
	}
	?>

	
