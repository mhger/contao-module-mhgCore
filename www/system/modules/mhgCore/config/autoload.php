<?php
/**
 * Contao 3 Extension [mhgCore]
 *
 * Copyright (c) 2016 Medienhaus Gersöne UG | Pierre Gersöne
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary licence
 */

/**
 * Register namespace
 */
ClassLoader::addNamespace('mhg');

/**
 * Register the classes
 */
ClassLoader::addClasses( array
    (
    // Classes
    'mhg\Compress' => 'system/modules/mhgCore/classes/Compress.php',
    'mhg\Core' => 'system/modules/mhgCore/classes/Core.php',
    'mhg\Dca' => 'system/modules/mhgCore/classes/Dca.php',
    // Modules
    'mhg\ModuleSearch' => 'system/modules/mhgCore/modules/ModuleSearch.php',
) );
