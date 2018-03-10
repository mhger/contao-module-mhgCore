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
mhg\Dca::alterPalettes('tl_page', 'robots,description', 'description,robots');

/**
 * alter DCA fields
 */
mhg\Dca::alterFieldValue('tl_page', 'language', 'default', 'de');

mhg\Dca::alterFieldValue('tl_page', 'published', 'default', 1);
mhg\Dca::alterFieldValue('tl_page', 'published', 'exclude', true);
mhg\Dca::alterFieldValue('tl_page', 'published', 'filter', true);
mhg\Dca::alterFieldValue('tl_page', 'published', 'flag', 1);

mhg\Dca::alterFieldEval('tl_page', 'pageTitle', 'tl_class', 'long');
