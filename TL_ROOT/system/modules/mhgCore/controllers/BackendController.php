<?php
/**
 * Contao 3 Extension [mhgCore]
 *
 * Copyright (c) 2018 Medienhaus Gersöne UG (haftungsbeschränkt) | Pierre Gersöne
 *
 * @package     mhgCore
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 * @link        https://www.medienhaus-gersoene.de Medienhaus Gersöne - Agentur für Neue Medien: Web, Design & Marketing
 * @license     LGPL-3.0+
 */

namespace mhg;


/**
 * class mhg\BackendController
 */
class BackendController {

    /**
     * @param   string $strController 
     * @param   string $strKey
     * @return  string
     */
    public static function getActiveTab($strController, $strKey = 'key') {
        // check and validate sources value
        $varValue = \Input::get($strKey);

        if (!isset($GLOBALS['TL_MHG']['backend'][$strController]['tabs'][$varValue])) {
            $varValue = null;
        }

        $varSession = isset($_SESSION['TL_MHG']['backend'][$strController]['tab']) ? $_SESSION['TL_MHG']['backend'][$strController]['tab'] : null;

        if (!isset($GLOBALS['TL_MHG']['backend'][$strController]['tabs'][$varSession])) {
            $varSession = null;
        }

        if (null === $varValue && null !== $varSession) {
            $varValue = $varSession;
        } elseif (null === $varValue && null === $varSession) {
            $varValue = 'default';
        }

        // store valid tab key to session if necessary
        if ($varValue !== $varSession) {
            $_SESSION['TL_MHG']['backend'][$strController]['tab'] = $varValue;
        }

        return $varValue;
    }
}
