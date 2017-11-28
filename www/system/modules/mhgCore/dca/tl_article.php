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
mhg\Dca::modifyPalettes(',space', '', 'tl_article');
mhg\Dca::modifyPalettes(',guests', ',hide,guests', 'tl_article');

/**
 * add DCA fields
 */
mhg\Dca::addField('tl_article', 'hide', array(
    'label' => &$GLOBALS['TL_LANG']['tl_article']['hide'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'w50'),
    'sql' => "char(1) NOT NULL default ''"
));
/**
 * alter DCA fields
 */
mhg\Dca::alterFieldValue('tl_article', 'published', 'default', 1);
