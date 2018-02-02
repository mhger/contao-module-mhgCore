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
 * class mhg\Core
 */
class Core {

    /**
     * Checks itself to be on the correct server
     *
     * @param   void
     * @return  \mhg\Core
     */
    public function initializeSystem() {
        $this->loadProjectConfiguration();

        return $this;
    }

    /**
     * Loads the project configuration
     *
     * @param   void
     * @return  \mhg\Core
     */
    protected function loadProjectConfiguration() {
        if (file_exists(TL_ROOT . '/system/config/projectconfig.php')) {
            include TL_ROOT . '/system/config/projectconfig.php';
        }

        return $this;
    }

    /**
     * Hook. Adds referer entry to 404 log entries
     * 
     * @param   string $strText
     * @param   string $strFunction
     * @param   string $strCategory
     * @return  void
     */
    public function addLogEntry($strText, $strFunction, $strCategory) {
        if ($strFunction == 'PageError404 generate()') {
            $referrer = getenv('HTTP_REFERER');

            if (!empty($referrer)) {
                \Database::getInstance()->prepare("UPDATE tl_log SET referrer=? WHERE id=LAST_INSERT_ID()")
                        ->execute($referrer);
            }
        }
    }

    /**
     * Hook. FE / Frontend only.
     * 
     * @param   object $objPage
     * @param   object $objLayout
     * @param   object $objPageRegular
     * @return  object void
     */
    public function generatePage($objPage, $objLayout, $objPageRegular) {
        // toggle body class (nojs / js)
        $script = "<script>(function(){var e=document.getElementById('top');e.classList.toggle('nojs');e.classList.toggle('js');})();</script>";
        $objLayout->script.= $script;

        // add theme-color 
        $themeColor = deserialize($objLayout->themeColor);
        
        if (isset($themeColor[0]) && strlen($themeColor[0]) === 6) {
            $themeColor[0];
            $GLOBALS['TL_HEAD']['fontawesome'] = '<meta name="theme-color" content="#' . $themeColor[0] . '">';
        }
    }
}
