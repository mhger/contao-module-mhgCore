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

mhg\Dca::modifyPalettes( ',space', '', 'tl_article' );

$GLOBALS['TL_DCA']['tl_article']['fields']['hide'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_article']['hide'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array( 'tl_class' => 'w50' ),
    'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = 1;



