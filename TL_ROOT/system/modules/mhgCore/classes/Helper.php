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

namespace mhg;


/**
 * class mhg\Compress
 */
class Helper {

    /**
     * 
     * @param   string $hl
     * @return  string
     * */
    public static function getSubheadlineLevel($hl) {
        $arrValues = array('h1' => 'h2', 'h2' => 'h3', 'h3' => 'h4', 'h4' => 'h5', 'h5' => 'h6', 'h6' => 'strong');

        $string = isset($arrValues[$hl]) ? $arrValues[$hl] : 'strong';

        return $string;
    }
}
