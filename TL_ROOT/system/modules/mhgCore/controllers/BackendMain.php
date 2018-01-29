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
 * Overwrite main backend controller.
 */
class BackendMain extends \Contao\BackendMain {

    /**
     * Extend / modfiy the welcome screen
     *
     * @return string
     */
    protected function welcomeScreen() {
        // get the default content
        $strReturn = parent::welcomeScreen();

        // add header
        $objTemplate = new \Contao\BackendTemplate('be_mhg_header');
        $objTemplate->headline = $GLOBALS['TL_LANG']['MOD']['mhgCore'];
        $strHeader = $objTemplate->parse();

        $strReturn = $strHeader . $strReturn;

        // add footer
        $objTemplate = new \Contao\BackendTemplate('be_mhg_footer');
        $strFooter = $objTemplate->parse();

        $strReturn = $strReturn . $strFooter;

        return $strReturn;
    }
}
