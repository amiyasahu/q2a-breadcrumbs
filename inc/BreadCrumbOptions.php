<?php

    /**
     * Class BreadCrumbOptions
     */
    class BreadCrumbOptions
    {
        /**
         * @var
         */
        protected static $instance;

        protected $config;

        /**
         * @return Donut_Options
         */
        public static function getInstance()
        {
            return isset( self::$instance ) ? self::$instance : self::$instance = new self();
        }

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

        public function getConfig( $key )
        {
            return isset( $this->config[ $key ] ) ? $this->config[ $key ] : '';
        }
    }


    function breadcrumb_opt( $key )
    {
        return BreadCrumbOptions::getInstance()->getConfig( strtolower($key) );
    }