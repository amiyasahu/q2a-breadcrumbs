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
                $args = array(
                    'url'  => qa_opt( 'site_url' ),
                    'text' => breadcrumb_lang( 'home' ),
                    'type' => 'home',
                );
                $this->generate_breadcrumb_part( $args );
            }

            /*Now create the breadcrumb as per the template*/
            switch ( $this->template ) {
                case 'not-found' :
                    $args = array(
                        'url'  => '#',
                        'text' => breadcrumb_lang( 'not_found' ),
                        'type' => $this->template,
                    );
                    $this->generate_breadcrumb_part( $args );

                    break;

                case 'question' :

                    $question_page = @$this->content['q_view'];
                    $cat = @$question_page['where'];

                    if ( !empty( $cat ) ) {
                        $categoryids = @$this->content['categoryids'];
                        if ( !empty( $categoryids ) ) {
                            foreach ( $categoryids as $categoryid ) {
                                $category_details = $this->get_category_details( $categoryid );
                                if ( count( $category_details ) ) {
                                    $args = array(
                                        'type' => 'cat',
                                        'text' => $category_details['title'],
                                        'url'  => $this->category_path( $category_details['backpath'] ),
                                    );
                                    $this->generate_breadcrumb_part( $args );
                                }
                            }
                        }
                    } else {
                        //if question is asked with out any categories
                        $args = array(
                            'type' => 'questions',
                            'text' => breadcrumb_lang( 'questions' ),
                            'url'  => qa_path_html( 'questions' ),
                        );
                        $this->generate_breadcrumb_part( $args );
                    }

                    if ( count( $question_page ) ) {

                        $q_title = @$question_page['raw']['title'];
                        $trunc_len = breadcrumb_opt( q2a_breadcrumbs_admin::TRUNCATE_LENGTH );

                        if ( $trunc_len <= 0 ) {
                            $trunc_len = strlen( $q_title );
                        }

                        $args = array(
                            'type' => 'question',
                            'url'  => qa_q_path( @$question_page['raw']['postid'], $q_title, true ),
                            'text' => $this->truncate( $q_title, $trunc_len ),
                        );
                        $this->generate_breadcrumb_part( $args );

                    }

                    break;
                case 'search' :

                    $args = array(
                        'url'  => qa_path_absolute( qa_request(), $_GET ),
                        'text' => breadcrumb_lang( 'searching_for' ) . qa_get( 'q' ),
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );

                    break;

                case 'tag' :
                case 'user' :

                    $args = array(
                        'url'  => qa_path_absolute( qa_request_part( 0 ) . 's' ),
                        'text' => breadcrumb_lang( qa_request_part( 0 ) ),
                        'type' => qa_request_part( 0 ),
                    );

                    $this->generate_breadcrumb_part( $args );

                    $args = array(
                        'url'  => qa_path_absolute( qa_request() ),
                        'text' => qa_request_part( 1 ),
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );

                    break;

                case 'questions' :
                case 'unanswered' :
                case 'tags' :
                case 'users' :
                case 'categories' :
                case 'activity' :
                case 'ask' :
                case 'account' :
                case 'login' :
                case 'register' :
                case 'forgot' :
                case 'messages' :
                case 'message' :
                case 'favorites' :

                    $args = array(
                        'url'  => qa_path_absolute( qa_request_part( 0 ) ),
                        'text' => breadcrumb_lang( $this->template ),
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );
                    break;

            }

            switch ( $this->template ) {
                case 'qa' :
                case 'questions' :
                case 'activity' :
                case 'categories' :

                    if ( $this->template == 'qa' && !$this->is_home() ) {
                        $args = array(
                            'type' => 'questions',
                            'text' => breadcrumb_lang( 'questions' ),
                            'url'  => qa_path_html( 'questions' ),
                        );
                        $this->generate_breadcrumb_part( $args );
                    }

                    $navs = qa_request_parts( $this->template == 'qa' ? 0 : 1 );

                    foreach ( $navs as $index => $nav ) {
                        //then it is showing categories
                        $category_details = $this->get_category_details_from_tags( $nav );

                        if ( count( $category_details ) ) {
                            $args = array(
                                'url'  => $this->category_path( $category_details['backpath'], qa_request_part( 0 ) . '/' ),
                                'text' => $category_details['title'],
                                'type' => $this->template,
                            );
                            $this->generate_breadcrumb_part( $args );
                        }
                    }
                    break;
                case 'users' :
                    $type = qa_request_part( 1 );
                    switch ( $type ) {
                        case 'special' :
                        case 'blocked' :
                            $text = breadcrumb_lang( $type );
                            break;
                        default :
                            $text = breadcrumb_lang( 'top_users' );
                            break;
                    }

                    $args = array(
                        'url'  => qa_path_absolute( qa_request(), $_GET ),
                        'text' => $text,
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );
                    break;
                case 'messages' :

                    $type = qa_request_part( 1 );
                    switch ( $type ) {
                        case 'sent' :
                            $text = breadcrumb_lang( 'sent' );
                            break;
                        default :
                            $text = breadcrumb_lang( 'inbox' );
                            break;
                    }

                    $args = array(
                        'url'  => qa_path_absolute( qa_request(), $_GET ),
                        'text' => $text,
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );

                    break;
                case 'message' :
                    $to = qa_request_part( 1 );
                    if ( strlen( $to ) ) {
                        $args = array(
                            'url'  => qa_path_absolute( qa_request(), $_GET ),
                            'text' => breadcrumb_lang( 'message_for_x', $to ),
                            'type' => $this->template,
                        );

                        $this->generate_breadcrumb_part( $args );
                    }
                    break;

                case 'user-wall' :
                case 'user-questions' :
                case 'user-answers' :
                case 'user-activity' :

                    $args = array(
                        'url'  => qa_path_absolute( qa_request_part( 0 ) . 's' ),
                        'text' => breadcrumb_lang( qa_request_part( 0 ) ),
                        'type' => qa_request_part( 0 ),
                    );

                    $this->generate_breadcrumb_part( $args );

                    $args = array(
                        'url'  => qa_path_absolute( implode( array_slice( qa_request_parts(), 0, 2 ), '/' ) ),
                        'text' => qa_request_part( 1 ),
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );

                    $args = array(
                        'url'  => qa_path_absolute( qa_request() ),
                        'text' => breadcrumb_lang( qa_request_part( 2 ) ),
                        'type' => $this->template,
                    );

                    $this->generate_breadcrumb_part( $args );

                    break;
            }

            switch ( $this->template ) {

                case 'questions' :
                    if ( count( qa_request_parts() ) == 1 ) {
                        $sort = qa_get( 'sort' );
                        switch ( $sort ) {
                            case 'hot' :
                                $text = breadcrumb_lang( 'hot' );
                                break;

                            case 'votes' :
                                $text = breadcrumb_lang( 'most_votes' );
                                break;

                            case 'answers' :
                                $text = breadcrumb_lang( 'most_answers' );
                                break;

                            case 'views' :
                                $text = breadcrumb_lang( 'most_views' );
                                break;

                            default :
                                $text = breadcrumb_lang( 'recent_que' );
                                break;

                        }
                        $args = array(
                            'url'  => qa_path_absolute( qa_request(), $_GET ),
                            'text' => $text,
                            'type' => $this->template,
                        );
                        $this->generate_breadcrumb_part( $args );
                    }
                    break;

                case 'unanswered' :
                    if ( count( qa_request_parts() ) == 1 ) {
                        $by = qa_get( 'by' );
                        switch ( $by ) {
                            case 'selected' :
                                $text = breadcrumb_lang( 'no_selected_ans' );
                                break;
                            case 'upvotes' :
                                $text = breadcrumb_lang( 'no_upvoted_ans' );
                                break;
                            default :
                                $text = breadcrumb_lang( 'no_ans' );
                                break;
                        }
                        $args = array(
                            'url'  => qa_path_absolute( qa_request(), $_GET ),
                            'text' => $text,
                            'type' => $this->template,
                        );
                        $this->generate_breadcrumb_part( $args );
                    }
                    break;

                case 'updates' :
                    if ( count( qa_request_parts() ) == 1 ) {
                        $show = qa_get( 'show' );
                        switch ( $show ) {
                            case 'favorites' :
                                $text = breadcrumb_lang( 'my_favorites' );
                                break;
                            case 'content' :
                                $text = breadcrumb_lang( 'my_content' );
                                break;
                            default :
                                $text = breadcrumb_lang( 'all_my_updates' );
                                break;
                        }

                        $args = array(
                            'url'  => qa_path_absolute( qa_request(), $_GET ),
                            'text' => $text,
                            'type' => $this->template,
                        );
                        $this->generate_breadcrumb_part( $args );
                    }
                    break;
            }

            $this->themeobject->output( '</ul>' );

        }

        public function is_home()
        {
            return empty( $this->request );
        }

        function get_category_details( $cat_id )
        {
            return ( qa_db_select_with_pending( qa_db_full_category_selectspec( $cat_id, true ) ) );
        }

        function category_path( $categorybackpath, $request = '' )
        {
            return qa_path_absolute( $request . implode( '/', array_reverse( explode( '/', $categorybackpath ) ) ) );
        }

        function get_category_details_from_tags( $tags )
        {
            return ( qa_db_select_with_pending( $this->db_category_selectspec( $tags ) ) );
        }

        function db_category_selectspec( $tags )
        {

            $identifiersql = 'tags=$';

            return array(
                'columns'   => array( 'categoryid', 'parentid', 'title', 'tags', 'qcount', 'content', 'backpath' ),
                'source'    => '^categories WHERE ' . $identifiersql,
                'arguments' => array( $tags ),
                'single'    => 'true',
            );

        }

        function truncate( $str, $len, $append = '...' )
        {
            $truncated = substr( $str, 0, $len );

            $last_space = strrpos( $truncated, ' ' );

            if ( $last_space !== false && $str != $truncated ) {
                $truncated = substr( $truncated, 0, $last_space );
            }

            if ( $truncated != $str ) {
                $truncated .= $append;
            }

            return $truncated;
        }

        /**
         * @param $args
         */
        private function generate_breadcrumb_part( $args )
        {
            $breadcrumb_part = new BreadcrumbPart( $args );
            $this->themeobject->output( $breadcrumb_part->get() );
        }
    }