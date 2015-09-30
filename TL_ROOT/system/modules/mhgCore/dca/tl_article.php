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
mhg\Dca::modifyPalettes( ',space', '', 'tl_article' );

$GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = 1;
