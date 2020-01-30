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

    class Ami_BreadcrumbElement extends Ami_BreadcrumbModel
    {
        public function __construct( $params )
        {
            $this->_init();
            $this->copy_from( $params );

            if ( is_null( $this->class ) ) {
                $this->class = q2a_breadcrumbs_admin::BASE_CLASS . '-' . $this->type;
            }

            if ( is_null( $this->url ) ) {
                $this->url = '#';
            }

            return $this;
        }

        public function _init()
        {
            $this->_data = array(
                'breadcrumb_structure'        => '<li {{class}} itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" ><a href="{{url}}" itemprop="item" > <span itemprop="name"> {{text}} </span></a><meta itemprop="position" content="1" /></li>',
                'breadcrumb_structure_nolink' => '<li {{class}} itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" ><span itemprop="name"> {{text}} </span></li>',
                'type'                        => null,
                'text'                        => null,
                'url'                         => null,
                'class'                       => null,
                'is_last_elem'                => false,
            );

            return $this;
        }

        public function get()
        {
            $breadcrumb_structure = qa_opt( q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM ) && $this->is_last_elem() ?
                $this->breadcrumb_structure_nolink
                : $this->breadcrumb_structure;

            return strtr( $breadcrumb_structure, array(
                '{{class}}' => $this->class,
                '{{url}}'   => $this->url,
                '{{text}}'  => qa_html( $this->text ),
            ) );
        }

        public function is_last_elem()
        {
            return $this->is_last_elem;
        }
    }
