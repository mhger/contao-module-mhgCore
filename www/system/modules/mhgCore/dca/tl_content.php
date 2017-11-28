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
 * alter DCA pallettes and subpalettes
 */
mhg\Dca::modifyPalettes(array(',space', ',imagemargin', ',floating', ',caption'), '', 'tl_content');
mhg\Dca::modifySubpalettes(array(',space', ',imagemargin', ',floating', ',caption'), '', 'tl_content');
mhg\Dca::modifyPalettes(',alt', ',alt,caption', 'tl_content');
mhg\Dca::modifySubpalettes(',alt', ',alt,caption', 'tl_content');
mhg\Dca::modifyPalettes(',size', ',size,floating', 'tl_content');
mhg\Dca::modifySubpalettes(',size', ',size,floating', 'tl_content');

/**
 * alter DCA fields
 */
mhg\Dca::alterFieldEval('tl_content', 'headline', 'tl_class', 'long');
mhg\Dca::alterFieldEval('tl_content', 'size', 'tl_class', 'clr', true);
mhg\Dca::alterFieldEval('tl_content', 'imageUrl', 'tl_class', 'clr', true);
