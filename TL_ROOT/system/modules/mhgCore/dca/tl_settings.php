<?php
/**
 * mx|byte Contao 3 Extension
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary
 * @copyright   Copyright (c) 2015 Medienhaus Gersöne UG
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 */
mhg\Dca::modifyPalettes( ',gzipScripts', ',gzipScripts,compressCss,scriptLoadingDelayed', 'tl_settings' );

$GLOBALS['TL_DCA']['tl_settings']['fields']['compressCss'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['compressCss'],
    'inputType' => 'checkbox',
    'eval' => array( 'tl_class' => 'w50' )
);
