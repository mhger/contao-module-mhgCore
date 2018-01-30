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
        $strHeader = '';
        $strFooter = '';
        $key = \Input::get('key');

        switch ($key) {
            case 'credits':
                $objTemplate = new \Contao\BackendTemplate('be_mhg_header');
                $objTemplate->headline = $strHeadline ? $strHeadline : $GLOBALS['TL_LANG']['MOD']['mhgCore'];
                $strHeader = $objTemplate->parse();

                $objTemplate = new \Contao\BackendTemplate('be_mhg_footer');
                $strFooter = $objTemplate->parse();
                break;
            default:
                // get the default content
                $key = '';
                $strReturn = parent::welcomeScreen();
                break;
        }

        // add tab header
        $tabs = array(
            (object) array(
                'state' => '' === $key ? 'active' : '',
                'link' => 'contao/main.php',
                'label' => $GLOBALS['TL_LANG']['MSC']['dashboard']
            ),
            (object) array(
                'state' => 'credits' === $key ? 'active' : '',
                'link' => 'contao/main.php?key=credits',
                'label' => $GLOBALS['TL_LANG']['MSC']['credits']
            ),
        );

        $objTemplate = new \Contao\BackendTemplate('be_mhg_tabs');
        $objTemplate->tabs = (object) $tabs;
        $strHeader = $objTemplate->parse() . $strHeader;

        $strReturn = $strHeader . $strReturn;

        // add footer - if available
        $strReturn = $strReturn . $strFooter;

        return $strReturn;
    }
}
