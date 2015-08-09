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

    /**
     * Class BreadCrumbOptions
     */
    class Ami_BreadCrumbOptions
    {
        /**
         * @var
         */
        protected static $instance;

        protected $config;

        /**
         * Constructor function
         */
        final private function __construct()
        {
            self::init();
        }

        protected function init()
        {
            $this->config = qa_get_options( array( q2a_breadcrumbs_admin::SHOW_HOME, q2a_breadcrumbs_admin::TRUNCATE_LENGTH ) );
        }

        /**
         * @return Donut_Options
         */
        public static function getInstance()
        {
            return isset( self::$instance ) ? self::$instance : self::$instance = new self();
        }

        public function getConfig( $key )
        {
            return isset( $this->config[ $key ] ) ? $this->config[ $key ] : '';
        }
    }


    function breadcrumb_opt( $key )
    {
        return Ami_BreadCrumbOptions::getInstance()->getConfig( strtolower( $key ) );
    }