<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Short Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/form_helper.html
 */

// ------------------------------------------------------------------------

/**
 * custom log
 *
 * @param message $msg
 * @param log type $type
 */
if ( ! function_exists('cake_log')) {

    require_once APPPATH . "helpers/cake/file.php";

    function cake_log($msg, $type = "debug") {

        if (!is_string($msg)) {
            $msg = print_r($msg, true);
        }

        $path = APPPATH . "/logs/" ;

        $debugTypes = array('notice', 'info', 'debug');

        if ($type == 'error' || $type == 'warning') {
            $filename = $path  . 'error.log';
        } elseif (in_array($type, $debugTypes)) {
            $filename = $path . 'debug.log';
        } else {
            $filename = $path . $type . '.log';
        }
        $output = date('Y-m-d H:i:s') . ' ' . ucfirst($type) . ': ' . $msg . "\n";

        $log = new File($filename, true);

        if ($log->writable()) {
            return $log->append($output);
        }

    }

}

/**
 * if ENVIRONMENT != "production"  passed variable is output
 * 
 * @param $output
 */
if ( ! function_exists('debug')) {
    function debug($output) {
        if (defined('ENVIRONMENT') && (ENVIRONMENT != "production")) {
            $trace = debug_backtrace();
            if (isset($trace[0])) {
                $trace[0]["file"] = str_replace(APPPATH, "", $trace[0]["file"]);
                print("<b>{$trace[0]["file"]}</b><br />(line <b>{$trace[0]["line"]}</b>)");
                print("<br />");
            }
            print_r($output);
            print("<br />");
        }
        return;
    }
}

/**
 * print_r() wrapper
 *
 * @param $var
 */
if ( ! function_exists('pr')) {
    function pr($var) {
        if (defined('ENVIRONMENT') && (ENVIRONMENT != "production")) {
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
    }
}

/**
 * htmlspecialchars() wrapper
 *
 * @param $text
 * @param $double
 * @param $charset
 */
if ( ! function_exists('h')) {
    function h($text, $double = true, $charset = null) {
        if (is_array($text)) {
            $texts = array();
            foreach ($text as $k => $t) {
                $texts[$k] = h($t, $double, $charset);
            }
            return $texts;
        } elseif (is_object($text)) {
            if (method_exists($text, '__toString')) {
                $text = (string)$text;
            } else {
                $text = '(object)' . get_class($text);
            }
        } elseif (is_bool($text)) {
            return $text;
        }

        static $default_charset = false;
        if ($default_charset === false) {
            // $default_charset = $this->config->item('charset');
            // if ($default_charset === null) {
                // $default_charset = 'UTF-8';
            // }
            $default_charset = 'UTF-8';

        }
        if (is_string($double)) {
            $charset = $double;
        }
        return htmlspecialchars($text, ENT_QUOTES, ($charset) ? $charset : $default_charset, $double);
    }
}

/**
 * echo
 *
 * @param $str		the output string
 */
if ( ! function_exists('e')) {
    function e($str) {
        echo $str;
    }
}

/**
 * Converts the slash of string to underscore, to remove the first and last of the underscore
 *
 * @param $string
 * @return string	string after conversion
 */
if ( ! function_exists('convert_slash')) {
    function convert_slash($string) {
        $string = trim($string, '/');
        $string = preg_replace('/\/\//', '/', $string);
        $string = str_replace('/', '_', $string);
        return $string;
    }
}

/**
 * Change the object to array
 * @param unknown_type $obj
 */
if ( ! function_exists('obj2arr'))
{
    function obj2arr($obj){

        if ( !is_object($obj) ) return $obj;

        $arr = (array) $obj;

        foreach ( $arr as &$a ){
            $a = obj2arr($a);
        }

        return $arr;
    }
}

/**
 * to re-recreat the array with a specific value to the key from the list of object
 *
 * @param $list   配列
 * @param $column カラム
 */
if ( ! function_exists('setcombine'))
{
    function setcombine($list, $column) {

        if ($list == null) {

            return;
        }

        $list2 = array();
        foreach ($list as $value) {

            $list2[$value->{$column}] = $value;
        }

        return $list2;
    }
}

/**
 * re-create the array with a specific value to the key from the list
 *
 * @param $list  
 * @param $column 
 */
if ( ! function_exists('setcombinelist'))
{
    function setcombinelist($list, $column) {

        if ($list == null) {

            return;
        }

        $list2 = array();
        foreach ($list as $value) {

            $list2[$value[$column]] = $value;
        }

        return $list2;
    }
}
