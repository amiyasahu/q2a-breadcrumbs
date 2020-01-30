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

    class Ami_Breadcrumb extends Ami_BreadcrumbModel
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
            $this->themeobject->output( '<ul class="breadcrumb clearfix" itemscope itemtype="http://schema.org/BreadcrumbList">' );

            $this->generate_home_breadcrumb();

            /* 
             * Now create the breadcrumb as per the template
             */

            /*
             * =====================================================
             * Now generate the breadcrumbs for the base level pages
             * ======================================================
             */
            switch ( $this->template ) {
                case 'not-found' :
                    $this->generate_page_not_found_breadcrumb();
                    break;
                case 'question' :
                    $this->generate_question_page_breadcrumb();
                    break;
                case 'search' :
                    $this->generate_search_page_breadcrumb();
                    break;

                case 'tag' :
                case 'user' :
                    $this->generate_tag_and_user_breadcrumb( true );
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
                case 'answers' :
                case 'hot' :

                    $is_last_elem = false;
                    if ( !in_array( $this->template, array( 'users', 'questions', 'unanswered' ) ) && ( count( qa_request_parts() ) <= 1 ) ) {
                        $is_last_elem = true;
                    }

                    $this->generate_common_page_breadcrumb( $is_last_elem );
                    break;

            }

            /*
             * #############################################
             * Now Generate the breadcrumb of the sub pages
             * #############################################
             */
            switch ( $this->template ) {
                case 'qa' :
                case 'questions' :
                case 'activity' :
                case 'categories' :

                    if ( $this->template == 'qa' && !$this->is_home() ) {
                        $this->generate_question_breadcrumb();
                    }

                    $category_navs = qa_request_parts( $this->template == 'qa' ? 0 : 1 );

                    if ( count( $category_navs ) ) {
                        $category_details = $this->get_category_details_from_tags( $category_navs );
                        //Show all categories
                        if(count($category_details)){
                            foreach($category_details as $index => $category_detail){
                                $this->generate_category_breadcrumb( $category_detail, $this->template !== 'qa' ? ( qa_request_part( 0 ) . '/' ) : '', is_array_last_key( $category_details, $index ) );
                            }
                        }
                    }

                    break;

                case 'users' :

                    $this->generate_users_page_breadcrumb();
                    break;

                case 'messages' :

                    $this->generate_messages_page_breadcrumb();
                    break;

                case 'message' :

                    $this->generate_messge_pages_breadcrumb();
                    break;

                case 'user-wall' :
                case 'user-questions' :
                case 'user-answers' :
                case 'user-activity' :

                    $this->generate_tag_and_user_breadcrumb();
                    $this->generate_user_specific_pages_breadcrumb();
                    break;
            }

            /*
             * ##########################################################################
             * Now Generate the breadcrumb of the pages meant for sorting and other pages
             * ###########################################################################
             */
            switch ( $this->template ) {

                case 'questions' :
                    $this->generate_question_sorting_breadcrumb();
                    break;

                case 'unanswered' :
                    $this->generate_unanswered_sort_breadcrumbs();
                    break;

                case 'updates' :
                    $this->generate_sub_update_page_breadcrumbs();
                    break;
            }

            $this->themeobject->output( '</ul>' );

        }

        /**
         * Generate the breadcrumb for the home page
         * 
         * @return array
         */
        public function generate_home_breadcrumb()
        {
            if ( breadcrumb_opt( q2a_breadcrumbs_admin::SHOW_HOME ) ) {
                $args = array(
                    'url'  => qa_opt( 'site_url' ),
                    'text' => breadcrumb_lang( 'home' ),
                    'type' => 'home',
                );
                $this->generate_breadcrumb_element( $args );
            }

        }

        /**
         * Create the breadcrumb part object and shows on the browser
         * 
         * @param $args
         */
        public function generate_breadcrumb_element( $args, $is_last_element = false )
        {
            $breadcrumb_elem = new Ami_BreadcrumbElement( $args );

            if ( $is_last_element ) {
                $breadcrumb_elem->is_last_elem = true;
            }

            $this->themeobject->output( $breadcrumb_elem->get() );
        }

        /**
         * Returns the details about the category id specified
         *
         * @param $cat_ids
         *
         * @return array
         */
        private function get_category_details( $cat_ids )
        {
            if(is_array($cat_ids))
                $identifiersql = 'categoryid IN (#)';
            else
                $identifiersql = 'categoryid=#';

            $result = qa_db_query_sub("SELECT categoryid, title, backpath FROM ^categories WHERE $identifiersql", $cat_ids);

            if (!($result instanceof mysqli_result))
                return null;

            return qa_db_read_all_assoc($result, 'categoryid');
        }

        /**
         * Returns the link of the categoty
         * 
         * @param $categorybackpath
         * @param string $request
         * @return string
         */
        private function category_path( $categorybackpath, $request = '' )
        {
            return qa_path_absolute( $request . implode( '/', array_reverse( explode( '/', $categorybackpath ) ) ) );
        }

        /**
         * Truncate the String to a certain length
         * 
         * @param $str
         * @param $len
         * @param string $append
         * @return string
         */
        public function truncate( $str, $len, $append = '...' )
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
         * Check if the current page is home page or not
         * 
         * @return bool
         */
        public function is_home()
        {
            return empty( $this->request );
        }

        /**
         * Returns the category details using the slug
         * 
         * @param $tags
         * @return array
         */
        function get_category_details_from_tags( $tags )
        {
            $result = $this->db_category_select_sql( $tags ) ;

            if (!($result instanceof mysqli_result))
                return null;

            return qa_db_read_all_assoc($result, 'categoryid');
        }

        /**
         * Returns the select specification
         * 
         * @param $tags
         * @return array
         */
        function db_category_select_sql( $tags )
        {
            if(is_array($tags) && count($tags) > 1)
                $identifiersql = 'tags IN ($)';
            else
                $identifiersql = 'tags=$';

            return qa_db_query_sub("SELECT categoryid, title, backpath FROM ^categories WHERE $identifiersql" , $tags);
        }

        /**
         * Genarate Page Not found breadcrumb
         */
        public function generate_page_not_found_breadcrumb()
        {
            $args = array(
                'url'  => '#',
                'text' => breadcrumb_lang( 'not_found' ),
                'type' => $this->template,
            );
            $this->generate_breadcrumb_element( $args, true );
        }


        /**
         * Generate Question page breadcrumb
         */
        public function generate_question_page_breadcrumb()
        {
            $question_page = @$this->content['q_view'];
            $cat = @$question_page['where'];

            if ( !empty( $cat ) ) {
                // question is asked under a category
                $this->generate_categories_breadcrumb_question_page();
            } else {
                // question is asked with out any categories
                $this->generate_question_breadcrumb();
            }

            if ( count( $question_page ) ) {

                $q_title = @$question_page['raw']['title'];
                $trunc_len = (int) breadcrumb_opt( q2a_breadcrumbs_admin::TRUNCATE_LENGTH );

                $args = array(
                    'type' => 'question',
                    'url'  => qa_q_path( @$question_page['raw']['postid'], $q_title, true ),
                    'text' => ( $trunc_len > 0 ) ? $this->truncate( $q_title, $trunc_len ) : $q_title,
                );
                $this->generate_breadcrumb_element( $args, true );
            }
        }

        /**
         * Generate the categories breadcrumb for the question page
         */
        public function generate_categories_breadcrumb_question_page(){
            $categoryids = @$this->content['categoryids'];
            if ( !count( $categoryids ) ) {
                return;
            }

            $category_details = $this->get_category_details( $categoryids );
            if ( !count( $category_details ) ) {
                return;
            }

            // need to re-order the $category_details that we received from database
            $ordered_category_details = array();
            foreach($categoryids as $categoryid){
                $ordered_category_details[$categoryid] = $category_details[$categoryid];
            }
            
            foreach ( $ordered_category_details as $category_detail ) {
                $this->generate_category_breadcrumb( $category_detail );
            }
        }

        /**
         * Generate Category element breadcrumb
         *
         * @param $category_detail
         */
        public function generate_category_breadcrumb( $category_detail, $base_request = '', $is_last_elem = false )
        {
            $args = array(
                'url'  => $this->category_path( $category_detail['backpath'], $base_request ),
                'text' => $category_detail['title'],
                'type' => $this->template,
            );
            $this->generate_breadcrumb_element( $args, $is_last_elem );
        }

        /**
         * Generate the question element breadcrumb
         */
        public function generate_question_breadcrumb()
        {
            $args = array(
                'type' => 'questions',
                'text' => breadcrumb_lang( 'questions' ),
                'url'  => qa_path_html( 'questions' ),
            );
            $this->generate_breadcrumb_element( $args );
        }

        /**
         * Generate breadcrumbs for the search page
         */
        public function generate_search_page_breadcrumb()
        {
            $args = array(
                'url'  => qa_path_absolute( $this->request, $_GET ),
                'text' => breadcrumb_lang( 'searching_for' ) . qa_get( 'q' ),
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, true );
        }

        /**
         * Generate the breadcrumbs for the tag and the user page
         * 
         * @param bool|false $is_last_elem
         */
        public function generate_tag_and_user_breadcrumb( $is_last_elem = false )
        {
            $args = array(
                'url'  => qa_path_absolute( qa_request_part( 0 ) . 's' ),
                'text' => breadcrumb_lang( qa_request_part( 0 ) ),
                'type' => qa_request_part( 0 ),
            );

            $this->generate_breadcrumb_element( $args );

            $args = array(
                'url'  => qa_path_absolute( implode( array_slice( qa_request_parts(), 0, 2 ), '/' ) ),
                'text' => qa_request_part( 1 ),
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, $is_last_elem );

            return $args;
        }

        /**
         * Generate breadcrumbs for the common pages
         */
        public function generate_common_page_breadcrumb( $is_last_elem = false )
        {
            $args = array(
                'url'  => qa_path_absolute( qa_request_part( 0 ) ),
                'text' => breadcrumb_lang( $this->template ),
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, $is_last_elem );
        }

        /**
         *  Generate breadcrumb for the users page
         */
        public function generate_users_page_breadcrumb()
        {
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
                'url'  => qa_path_absolute( $this->request, $_GET ),
                'text' => $text,
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, true );
        }

        /**
         * Generate breadcrumb for the messages sub-page
         */
        public function generate_messages_page_breadcrumb()
        {
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
                'url'  => qa_path_absolute( $this->request, $_GET ),
                'text' => $text,
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, true );
        }

        /**
         * Generate breadcrumbs for the PM page
         */
        public function generate_messge_pages_breadcrumb()
        {
            $to = qa_request_part( 1 );
            if ( strlen( $to ) ) {
                $args = array(
                    'url'  => qa_path_absolute( $this->request, $_GET ),
                    'text' => breadcrumb_lang( 'message_for_x', $to ),
                    'type' => $this->template,
                );

                $this->generate_breadcrumb_element( $args, true );
            }
        }

        /**
         * Genetate breadcrumbs for the user specific pages like user-answers , user-wall etc.
         */
        public function generate_user_specific_pages_breadcrumb()
        {
            $args = array(
                'url'  => qa_path_absolute( $this->request ),
                'text' => breadcrumb_lang( qa_request_part( 2 ) ),
                'type' => $this->template,
            );

            $this->generate_breadcrumb_element( $args, true );
        }

        /**
         *  Genarate breadcrumbs for the questions page subnavigations
         */
        public function generate_question_sorting_breadcrumb()
        {
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
                    'url'  => qa_path_absolute( $this->request, $_GET ),
                    'text' => $text,
                    'type' => $this->template,
                );
                $this->generate_breadcrumb_element( $args, true );
            }
        }

        /**
         * Genarates the breadcrumb for unanswered page sub navigations
         */
        public function generate_unanswered_sort_breadcrumbs()
        {
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
                    'url'  => qa_path_absolute( $this->request, $_GET ),
                    'text' => $text,
                    'type' => $this->template,
                );
                $this->generate_breadcrumb_element( $args, true );
            }
        }

        /**
         * Generates breadcrumb for the updates page sub navigations
         */
        public function generate_sub_update_page_breadcrumbs()
        {
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
                    'url'  => qa_path_absolute( $this->request, $_GET ),
                    'text' => $text,
                    'type' => $this->template,
                );
                $this->generate_breadcrumb_element( $args, true );
            }
        }
    }
