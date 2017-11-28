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
 * alter DCA fields
 */
mhg\Dca::alterFieldValue('tl_layout', 'cssClass', 'default', 'nojs layout_standard');
mhg\Dca::alterFieldValue('tl_layout', 'viewport', 'default', 'width=device-width,initial-scale=1.0,maximum-scale=1,minimum-scale=1,user-scalable=no');
