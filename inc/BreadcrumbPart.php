<?php

    class BreadcrumbPart extends BreadcrumbModel
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
                'breadcrumb_structure'        => '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <span itemprop="title"> {{text}} </span></a></li>',
                'breadcrumb_structure_nolink' => '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><span itemprop="title"> {{text}} </span></li>',
                'type'                        => null,
                'text'                        => null,
                'url'                         => null,
                'class'                       => null,
                'is_last_elem'                => false,
            );

            return $this;
        }

        public function is_last_elem()
        {
            return $this->is_last_elem;
        }

        public function get()
        {
            $breadcrumb_structure = qa_opt( q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM ) && $this->is_last_elem() ?
                $this->breadcrumb_structure_nolink
                : $this->breadcrumb_structure;

            return strtr( $breadcrumb_structure, array(
                '{{class}}' => $this->class,
                '{{url}}'   => $this->url,
                '{{text}}'  => $this->text,
            ) );
        }
    }