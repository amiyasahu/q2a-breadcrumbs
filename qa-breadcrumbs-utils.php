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

    function ami_get_li_template( $type, $index, $total_navs )
    {
        if ( ! !qa_opt( q2a_breadcrumbs_admin::DONT_USE_ICONS ) ) {

            $li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <span itemprop="title"> {{text}} </span></a></li>';

            if ( $index == $total_navs && ( !in_array( $type, array( 'questions', 'unanswered', 'users' ) ) || $index > 1 ) && qa_opt( q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM ) ) {
                $li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><span itemprop="title"> {{text}} </span></li>';
            }

        } else {
            $li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <i class="{{icon}}" ></i> <span itemprop="title"> {{text}} </span></a></li>';

            if ( $index == $total_navs && ( !in_array( $type, array( 'questions', 'unanswered', 'users' ) ) || $index > 1 ) && qa_opt( q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM ) ) {
                $li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><i class="{{icon}}" ></i> <span itemprop="title"> {{text}} </span> </li>';
            }

        }

        return $li_template;
    }

