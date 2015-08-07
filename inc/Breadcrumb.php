<?php

    class Breadcrumb extends BreadcrumbModel
    {
        public function __construct( $params )
        {
            $this->_init();
            $this->copy_from( $params );

            return $this;
        }

        private function _init()
        {
            $this->_data = array(
                'id' => null,
            );

            return $this;
        }

    }