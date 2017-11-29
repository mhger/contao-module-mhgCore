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
mhg\Dca::modifyPalettes(array(',keywords', ',author', ',space'), array('', ',author,keywords', ''), 'tl_article');

/**
 * alter DCA fields
 */
mhg\Dca::alterFieldValue('tl_article', 'published', 'default', 1);
