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
 * alter DCA pallettes
 */
mhg\Dca::modifyPalettes(',head', ',head,themeColor', 'tl_layout');
/**
 * alter DCA fields 
 */
mhg\Dca::alterFieldValue('tl_layout', 'cssClass', 'default', 'nojs layout_standard');
mhg\Dca::alterFieldValue('tl_layout', 'viewport', 'default', 'width=device-width,initial-scale=1.0,maximum-scale=1,minimum-scale=1,user-scalable=no');

/**
 * add DCA fields
 */
mhg\Dca::addField('tl_layout', 'themeColor', array(
    'label' => &$GLOBALS['TL_LANG']['tl_layout']['themeColor'],
    'inputType' => 'text',
    'eval' => array('maxlength' => 6, 'multiple' => true, 'size' => 1, 'colorpicker' => true, 'isHexColor' => false, 'decodeEntities' => true, 'tl_class' => 'w50 clr wizard'),
    'sql' => "varchar(23) NOT NULL default ''"
));
