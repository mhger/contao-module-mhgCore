<?php
/**
 * Contao 3 Extension [mhgCore]
 *
 * Copyright (c) 2016 Medienhaus Gersöne UG | Pierre Gersöne
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary licence
 */

$GLOBALS['TL_DCA']['tl_log']['fields']['referrer'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_log']['referrer'],
    'search' => true,
    'sql' => "text NULL"
);
