<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

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

    /* don't allow this page to be requested directly from browser */
    if ( !defined( 'QA_VERSION' ) ) {
        header( 'Location: /' );
        exit;
    }

    class qa_html_theme_layer extends qa_html_theme_base
    {

        function head_custom()
        {
            qa_html_theme_base::head_custom();
            if ( $this->template != 'admin' ) {
                $this->output( '
						<style>
						' . qa_opt( q2a_breadcrumbs_admin::CUSTOM_CSS ) . '
						</style>'
                );
            }

        }

        // registering scripts and css
        function head_css()
        {
            qa_html_theme_base::head_css();
            if ( $this->template != 'admin' ) {
                $breadcrumb_css_url = $this->get_css_file_for_theme( qa_opt( 'site_theme' ), qa_path_to_root() . 'qa-plugin/' . AMI_BREADCRUMBS_FOLDER . '/css/' );
                //$breadcrumb_css_url = qa_path_to_root() . 'qa-plugin/' . AMI_BREADCRUMBS_FOLDER . '/css/breadcrumbs-styles.css';
                $this->output( '<link rel="stylesheet" TYPE="text/css" href="' . $breadcrumb_css_url . '"/>' );
            }
        }

        private function get_css_file_for_theme( $theme_name, $css_base_dir = null )
        {
            $mapper = $this->css_files_mapper();

            $css_file = array_key_exists( strtolower( $theme_name ), $mapper )
                ? $mapper[ strtolower( $theme_name ) ]
                : $mapper['default'];

            return !is_null( $css_base_dir ) ? $css_base_dir . $css_file : $css_file;
        }

        private function css_files_mapper()
        {
            return array(
                'snowflat' => 'SnowFlat.css',
                'donut'    => 'donut.css',
                'default'  => 'default.css',
            );
        }
    }


	
