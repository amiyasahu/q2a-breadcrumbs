<?php

    class Breadcrumb extends BreadcrumbModel
    {
        public function __construct( $params )
        {
            $this->_init();
            $this->copy_from( $params );

            return $this;
        }

        public function _init()
        {
            $this->_data = array(
                'themeobject' => null,
                'template'    => null,
                'content'     => null,
                'request'     => null,
            );

            return $this;
        }

        public function generate()
        {
            $this->themeobject->output( '<ul class="breadcrumb clearfix">' );

            if ( breadcrumb_opt( q2a_breadcrumbs_admin::SHOW_HOME ) ) {

            }

            $this->themeobject->output( '</ul>' );

        }

    }