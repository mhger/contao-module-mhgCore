<?php
/**
 * Contao 3 Extension [mhgCore]
 *
 * Copyright (c) 2017 Medienhaus Gersöne UG (haftungsbeschränkt) | Pierre Gersöne
 *
 * @package     mhgCore
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 * @link        https://www.medienhaus-gersoene.de Medienhaus Gersöne - Agentur für Neue Medien: Web, Design & Marketing
 * @license     LGPL-3.0+
 */
/**
 * Define constants
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('LB')) {
    define('LB', "\r\n");
}

if (!defined('SERVER_NAME')) {
    define('SERVER_NAME', getenv('SERVER_NAME'));
}

if (!defined('SERVER_IP')) {
    define('SERVER_IP', getenv('SERVER_ADDR'));
}


/**
 * Define functions
 */
if (!function_exists('_p')) {


    /**
     * Simple debugger with backtrace
     *
     * @param mixed $input
     * @param bool $output
     * @return NULL|string
     */
    function _p($buffer, $return = false, $html = true) {
        $string = print_r($buffer, true);

        /**
         * add location the output is initiated from
         */
        if (true) {
            $i = 0;
            $trace = debug_backtrace();
            $i = isset($trace[$i]['function']) && $trace[$i]['function'] == '_p' ? $i++ : $i;

            $string = sprintf('Output from file %s:%s' . LB, $trace[$i]['file'], $trace[$i]['line']) . $string;
        }

        /**
         *  wrap with debug container
         */
        if ($html) {
            $string = '<div class="debug"><pre>' . $string . '</pre></div>';
        }

        /**
         *  return the output
         */
        if ($return) {
            return $string;
        }

        if (DEVMODE || $GLOBALS['TL_CONFIG']['displayErrors']) {
            echo $string;
        }

        return NULL;
    }
}

/**
 * Register global hooks
 */
$GLOBALS['TL_HOOKS']['addLogEntry'][] = array('mhg\Core', 'addLogEntry');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('mhg\Core', 'initializeSystem');


/**
 * Register frontend hooks
 */
if (TL_MODE == 'FE') {
    $GLOBALS['TL_HOOKS']['getCombinedFile'][] = array('mhg\Compress', 'getCombinedFile');
}


/**
 * global backend changes
 */
if (TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'system/modules/mhgCore/assets/css/style.css';
}


/**
 * Predefine MHG Globals
 */
if (!is_array($GLOBALS['TL_MHG'])) {
    $GLOBALS['TL_MHG'] = array();
}    