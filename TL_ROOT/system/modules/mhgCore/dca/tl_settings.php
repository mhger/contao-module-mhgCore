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
/**
 * alter DCA palettes
 */
mhg\Dca::modifyPalettes(',gzipScripts', ',gzipScripts,compressCss', 'tl_settings');

/**
 * add DCA fields
 */
mhg\Dca::addField('tl_settings', 'compressCss', array(
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['compressCss'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'w50')
));
