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
                        'label' => $GLOBALS['TL_LANG']['MSC']['dashboard'][$tab]
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
    public function generateInfo() {
        $arrSections = array();

        $objTemplate = new \Contao\BackendTemplate('be_main_info');
        $arrSections[] = (object) array(
                    'id' => 'section_mhgCore',
                    'label' => $GLOBALS['TL_LANG']['MOD']['mhgCore'],
                    'links' => array(
                        (object) array(
                            'title' => $GLOBALS['TL_LANG']['MOD']['mhgCore'],
                            'icon' => 'system/modules/mhgCore/assets/img/mhg-icon.png',
                            'link' => 'https://www.medienhaus-gersoene.de',
                            'label' => $GLOBALS['TL_LANG']['MSC']['documentation'],
                            'external' => 1
                        ),
                    )
        );

        $arrSections[] = (object) array(
                    'id' => 'section_mhgModules',
                    'label' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['label'],
                    'links' => array(
                        (object) array(
                            'title' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgElements'],
                            'icon' => 'system/modules/mhgCore/assets/img/mhg-icon.png',
                            'link' => static::addToUrl('do=repository_catalog&view=mhgElements', true),
                            'label' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgElements']
                        ),
                        (object) array(
                            'title' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgEventsEasy'],
                            'icon' => 'system/modules/mhgCore/assets/img/mhg-icon.png',
                            'link' => static::addToUrl('do=repository_catalog&view=mhgEventsEasy', true),
                            'label' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgEventsEasy']
                        ),
                        (object) array(
                            'title' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgFontAwesome'],
                            'icon' => 'system/modules/mhgCore/assets/img/mhg-icon.png',
                            'link' => static::addToUrl('do=repository_catalog&view=mhgFontAwesome', true),
                            'label' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgFontAwesome']
                        ),
                        (object) array(
                            'title' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgNewsEasy'],
                            'icon' => 'system/modules/mhgCore/assets/img/mhg-icon.png',
                            'link' => static::addToUrl('do=repository_catalog&view=mhgNewsEasy', true),
                            'label' => $GLOBALS['TL_LANG']['MSC']['mhgModules']['mhgNewsEasy']
                        ),
                    )
        );


        $objTemplate->sections = $arrSections;

        $strReturn = $objTemplate->parse();

        return $strReturn;
    }
}
