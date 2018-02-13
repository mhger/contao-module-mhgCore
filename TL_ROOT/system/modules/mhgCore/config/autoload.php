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
 * Register namespace
 */
ClassLoader::addNamespace('mhg');

/**
 * Register the classes
 */
ClassLoader::addClasses(array
    (
    // Classes
    'mhg\Compress' => 'system/modules/mhgCore/classes/Compress.php',
    'mhg\Core' => 'system/modules/mhgCore/classes/Core.php',
    'mhg\Dca' => 'system/modules/mhgCore/classes/Dca.php',
    'mhg\Exception' => 'system/modules/mhgCore/classes/Exception.php',
    // Controllers
    'mhg\BackendController' => 'system/modules/mhgCore/controllers/BackendController.php',
    'mhg\BackendMain' => 'system/modules/mhgCore/controllers/BackendMain.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array(
    // Backend
    'be_main_info' => 'system/modules/mhgCore/templates/backend',
    'be_mhg_header' => 'system/modules/mhgCore/templates/backend',
    'be_mhg_footer' => 'system/modules/mhgCore/templates/backend',
    'be_mhg_tabs' => 'system/modules/mhgCore/templates/backend'
));
