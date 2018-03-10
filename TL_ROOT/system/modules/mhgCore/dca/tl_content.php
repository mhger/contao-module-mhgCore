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
mhg\Dca::alterPalettes('tl_content', array(',space', ',imagemargin', ',floating', ',caption'), '');
mhg\Dca::alterSubpalettes('tl_content', array(',space', ',imagemargin', ',floating', ',caption'), '');
mhg\Dca::alterPalettes('tl_content', ',alt', ',alt,caption');
mhg\Dca::alterSubpalettes('tl_content', ',alt', ',alt,caption');
mhg\Dca::alterPalettes('tl_content', ',size', ',size,floating');
mhg\Dca::alterSubpalettes('tl_content', ',size', ',size,floating');

/**
 * alter DCA fields
 */
mhg\Dca::alterFieldEval('tl_content', 'headline', 'tl_class', 'long');
mhg\Dca::alterFieldEval('tl_content', 'size', 'tl_class', 'clr', true);
mhg\Dca::alterFieldEval('tl_content', 'imageUrl', 'tl_class', 'clr', true);
