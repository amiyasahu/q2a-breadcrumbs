<?php

/*
  Question2Answer (c) Gideon Greenspan
  Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

	http://www.question2answer.org/

	
	File: qa-plugin/basic-adsense/qa-basic-adsense.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Widget module class for AdSense widget plugin


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

	class q2a_breadcrumbs_admin {
    /*added the options as constants to avoid multiple occurances */
    const SHOW_HOME       = 'ami_breadcrumb_show_home' ;
    const TRUNCATE_LENGTH       = 'ami_breadcrumb_trunc_len' ;
    const SAVE_BUTTON       = 'ami_breadcrumb_save_btn' ;

		function allow_template($template)
		{
			return ($template!='admin');
		}
				
		function admin_form(&$qa_content)
		{
			$saved=false;
			
			if (qa_clicked(self::SAVE_BUTTON)) {	
              qa_opt(self::SHOW_HOME ,       !!qa_post_text(self::SHOW_HOME));
              qa_opt(self::TRUNCATE_LENGTH ,  qa_post_text(self::TRUNCATE_LENGTH));
        			$saved=true;
			}
			
			return array(
				'ok' => $saved ? qa_lang('breadcrumbs/settings_saved') : null,
				
				'fields' => array(
                    self::SHOW_HOME => array(
                              'label' => 'Show the home link ',
                              'type'  => 'checkbox',
                              'tags'  => 'name="'.self::SHOW_HOME.'"',
                              'value' => qa_opt(self::SHOW_HOME),
                    ),
                    self::TRUNCATE_LENGTH => array(
                              'label' => qa_lang('breadcrumbs/opt_truncate'),
                              'type'  => 'text',
                              'tags'  => 'name="'.self::TRUNCATE_LENGTH.'"',
                              'value' => qa_opt(self::TRUNCATE_LENGTH),
                    ),
        ),
				
				'buttons' => array(
      					array(
      						'label' => qa_lang('breadcrumbs/save_changes'),
      						'tags' => 'name="'.self::SAVE_BUTTON.'"',
      					),
				 ),
			);
		}
    function option_default($option) {

      switch($option) {
          case self::SHOW_HOME:
            return 1;
          case self::TRUNCATE_LENGTH:
            return 200 ;
          default : 
            return null;  
            
      }
    }

}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
