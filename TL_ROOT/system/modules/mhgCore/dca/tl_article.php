<?php
/**
 * Contao 3 Extension [mhgCore]
 *
 * Copyright (c) 2018 Medienhaus Gersöne UG (haftungsbeschränkt) | Pierre Gersöne
 *
 * @package     mhgCore
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 * @link        https://www.medienhaus-gersoene.de Medienhaus Gersöne - Agentur für Neue Medien: Web, Design & Marketing
 * @license     LGPL-3.0+
 */
/**
 * alter DCA pallettes
 */
mhg\Dca::alterPalettes('tl_article', array(',keywords', ',author', ',space'), array('', ',author,keywords', ''));

/**
 * alter DCA fields
 */
mhg\Dca::alterFieldValue('tl_article', 'published', 'default', 1);
