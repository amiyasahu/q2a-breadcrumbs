<?php

    class BreadcrumbPart extends BreadcrumbModel
    {
        private $breadcrumb_structure = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <span itemprop="title"> {{text}} </span></a></li>';
        private $breadcrumb_structure_nolink = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><span itemprop="title"> {{text}} </span></li>';

        public function __construct( $params )
        {
            $this->_init();
            $this->copy_from( $params );

            return $this;
        }

        public function _init()
        {
            $this->_data = array(
                'type'         => null,
                'text'         => null,
                'url'          => null,
                'is_last_elem' => false,
            );

            return $this;
        }

        public function is_last_elem()
        {
            $this->is_last_elem = true ;
            return $this ;
        }

    }