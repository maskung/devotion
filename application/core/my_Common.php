<?php

    define('DS' , '/');
    require APPPATH . "/core/cake/file.php";

    /**
     * cake_log
     * @param message $msg
     * @param log type $type
     */
    function cake_log($msg, $type = "debug") {

        if (!is_string($msg)) {
            $msg = print_r($msg, true);
        }

        $path = APPPATH . "logs/";

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
