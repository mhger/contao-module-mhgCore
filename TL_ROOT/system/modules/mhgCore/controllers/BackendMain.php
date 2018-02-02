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
 * Extendes main backend controller.
 */
class BackendMain extends \Contao\BackendMain {

    /**
     * Extend / modfiy the welcome screen
     *
     * @return string
     */
    protected function welcomeScreen() {
        $varCallback = null;
        $activeTab = BackendController::getActiveTab(welcomeScreen);

        // first generate tabs
        $arrTabs = array();
        foreach ($GLOBALS['TL_MHG']['backend']['welcomeScreen']['tabs'] as $tab => $callback) {
            $varCallback = $tab === $activeTab ? $callback : $varCallback;

            $arrTabs[] = (object) array(
                        'state' => $tab === $activeTab ? 'active' : '',
                        'link' => static::addToUrl('key=' . $tab, true),
                        'label' => $GLOBALS['TL_LANG']['MSC']['dashboard'] // [$tab]
            );
        }

        $objTemplate = new \BackendTemplate('be_mhg_tabs');
        $objTemplate->tabs = (object) $arrTabs;
        $strReturn = $objTemplate->parse();

        // generate body
        if ($activeTab === 'default') {
            $strReturn.= parent::welcomeScreen();
        } else {
            if (is_callable($varCallback)) {
                $objCallback = new $varCallback[0];
                $strReturn.= $objCallback->{$varCallback[1]}();
            }

            $objTemplate = new \Contao\BackendTemplate('be_mhg_footer');
            $strReturn.= $objTemplate->parse();
        }

        return $strReturn;
    }

    /**
     * @param   void
     * @return  string
     */
    public function generateCredits() {
        $objTemplate = new \Contao\BackendTemplate('be_mhg_header');
        $objTemplate->headline = $GLOBALS['TL_LANG']['MOD']['mhgCore'];
        $strReturn = $objTemplate->parse();

        return $strReturn;
    }
}
