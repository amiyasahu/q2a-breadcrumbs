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

    if ( !defined( 'QA_VERSION' ) ) { // don't allow this page to be requested directly from browser
        header( 'Location: ../../' );
        exit;
    }

    class q2a_breadcrumbs_widget
    {


        function allow_template( $template )
        {
            return ( $template != 'admin' );
        }

        function allow_region( $region )
        {
            $allow = false;
            switch ( $region ) {
                case 'main':
                case 'full':
                    $allow = true;
                    break;
            }

            return $allow;
        }

        function output_widget( $region, $place, $themeobject, $template, $request, $qa_content )
        {
            $args = array(
                'themeobject' => $themeobject,
                'content'     => $qa_content,
                'template'    => $template,
                'request'     => $request,
            );

            $themeobject->output('<div class="breadcrumb-wrapper">');
            $breadcrumb = new Ami_Breadcrumb( $args );
            $breadcrumb->generate();
            $themeobject->output('</div>');
        }
    }

    /*

        Omit PHP closing tag to help avoid accidental output

    */
