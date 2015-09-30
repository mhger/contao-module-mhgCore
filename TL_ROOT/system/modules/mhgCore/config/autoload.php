<?php
/**
 * mhg Contao 3 Extension
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary
 * @copyright   Copyright (c) 2015 Medienhaus Gersöne UG
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 */
/**
 * Register the namespaces
 */
ClassLoader::addNamespaces( array
    (
    'mhg',
) );

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
