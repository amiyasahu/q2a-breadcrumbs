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

    class Ami_BreadcrumbModel
    {
        protected $_data = array();
        protected $_errors = array();

        /**
         * Get the value for the key from the private $_data array.
         *
         * Return false if the requested key does not exist
         *
         * @param string $key The key from the $_data array
         *
         * @return mixed
         */
        public function __get( $key )
        {
            $value = false;
            if ( array_key_exists( $key, $this->_data ) ) {
                $value = $this->_data[ $key ];
            }

            /*
            elseif(method_exists($this, $key)) {
              $value = call_user_func_array(array($this, $key), func_get_args());
            }
            */

            return $value;
        }

        /**
         * Set the value of one of the keys in the private $_data array.
         *
         * @param string $key The key in the $_data array
         * @param string $value The value to assign to the key
         *
         * @return boolean
         */
        public function __set( $key, $value )
        {
            $success = false;
            if ( array_key_exists( $key, $this->_data ) ) {
                $this->_data[ $key ] = $value;
                $success = true;
            }

            return $success;
        }

        /**
         * Return true if the given $key in the private $_data array is set
         *
         * @param string $key
         *
         * @return boolean
         */
        public function __isset( $key )
        {
            return isset( $this->_data[ $key ] );
        }

        /**
         * Set the value of the $_data array to null for the given key.
         *
         * @param string $key
         *
         * @return void
         */
        public function __unset( $key )
        {
            if ( array_key_exists( $key, $this->_data ) ) {
                $this->_data[ $key ] = null;
            }
        }

        /**
         * Return the private $_data array
         *
         * @return mixed
         */
        public function get_data()
        {
            return $this->_data;
        }

        /**
         * Return true if the given $key exists in the private $_data array
         *
         * @param string $key
         *
         * @return boolean
         */
        public function field_exists( $key )
        {
            return array_key_exists( $key, $this->_data );
        }

        public function copy_from( array $data )
        {
            foreach ( $data as $key => $value ) {
                if ( array_key_exists( $key, $this->_data ) ) {
                    $this->_data[ $key ] = $value;
                }
            }
        }

        public function clear()
        {
            foreach ( $this->_data as $key => $value ) {
                if ( $key == 'id' ) {
                    $this->_data[ $key ] = null;
                } else {
                    $this->_data[ $key ] = '';
                }
            }
        }

        public function add_error( $error_message )
        {
            if ( !empty( $error_message ) ) {
                $this->_errors[] = $error_message;
            }
        }

        public function clear_errors()
        {
            $this->_errors = array();
        }

        public function get_errors()
        {
            return $this->_errors;
        }

        public function get_error_lines( $glue = "\n" )
        {
            $error_lines = '';
            if ( count( $this->_errors ) ) {
                $error_lines = implode( $glue, $this->_errors );
            }

            return $error_lines;
        }

        public function is_valid()
        {
            return count( $this->_errors ) == 0;
        }
    }