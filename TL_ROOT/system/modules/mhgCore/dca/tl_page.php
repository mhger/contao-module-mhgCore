<?php
/**
 * MHG Contao 3 Extension
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary
 * @copyright   Copyright (c) 2015 Medienhaus Gersöne UG
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 */
// palettes
$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace(
    'robots,description', 'description,robots', $GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] );

// language
$GLOBALS['TL_DCA']['tl_page']['fields']['language']['default'] = 'de';
// published
$GLOBALS['TL_DCA']['tl_page']['fields']['published']['default'] = 1;
$GLOBALS['TL_DCA']['tl_page']['fields']['published']['exclude'] = true;
$GLOBALS['TL_DCA']['tl_page']['fields']['published']['filter'] = true;
$GLOBALS['TL_DCA']['tl_page']['fields']['published']['flag'] = 1;
// pageTitle
$GLOBALS['TL_DCA']['tl_page']['fields']['pageTitle']['eval']['tl_class'] = 'long';

