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

mhg\Dca::modifyPalettes( ',gzipScripts', ',gzipScripts,compressCss,scriptLoadingDelayed', 'tl_settings' );

$GLOBALS['TL_DCA']['tl_settings']['fields']['compressCss'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['compressCss'],
    'inputType' => 'checkbox',
    'eval' => array( 'tl_class' => 'w50' )
);
