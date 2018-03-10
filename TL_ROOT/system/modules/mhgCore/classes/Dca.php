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

namespace mhg;


/**
 * class mhg\Dca
 * 
 * Modifications to DCA tables, fields and defintions 
 */
class Dca {

    /**
     * @param   string $strTable
     * @param   array|string $varSelector
     * @return  void
     */
    public static function addSelector($strTable, $varSelector) {
        if (is_array($varSelector)) {
            foreach ($varSelector as $strSelector) {
                self::addSelector($strSelector, $strTable);
            }
        } elseif (is_string($varSelector) && !in_array($varSelector, $GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'])) {
            $GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'][] = $varSelector;
        }
    }

    /**
     * 
     * @param   string $strTable
     * @param   string $strSubject
     * @param   array|string $varPalettes
     * @param   bool $isSubpalette
     * @return  void 
     */
    public static function appendPalettes($strTable, $strSubject, $varPalettes = '', $isSubpalette = false) {
        $strType = self::getPaletteType($isSubpalette);
        $arrPalettes = self::getPalettesArray($strTable, $varPalettes, $isSubpalette);

        foreach ($arrPalettes as $strPalette) {
            if ($strPalette == '__selector__') {
                continue;
            }

            $GLOBALS['TL_DCA'][$strTable][$strType][$strPalette].= $strSubject;
        }
    }

    /**
     * Modifies a single DCA palette
     * 
     * @param   string $strTable
     * @param   string|array $varSearch
     * @param   string|array $varReplace
     * @param   string $strPalette
     * @param   boolean $isSubpalette
     * @return  void
     */
    public static function alterPalette($strTable, $varSearch, $varReplace, $strPalette = 'default', $isSubpalette = false) {
        if ($strPalette !== '__selector__') {
            $strType = self::getPaletteType($isSubpalette);

            $strSubject = &$GLOBALS['TL_DCA'][$strTable][$strType][$strPalette];
            $strSubject = str_replace($varSearch, $varReplace, $strSubject);
        }
    }

    /**
     * Alteration of multiple / all DCA palettes at once
     * 
     * @param   string $strTable
     * @param   string|array $varSearch
     * @param   string|array $varReplace
     * @param   array|string $varPalettes
     * @param   boolean $isSubpalette
     * @return  void
     */
    public static function alterPalettes($strTable, $varSearch, $varReplace, $varPalettes = '', $isSubpalette = false) {
        $arrPalettes = self::getPalettesArray($strTable, $varPalettes, $isSubpalette);

        foreach ($arrPalettes as $strPalette) {
            if ($strPalette == '__selector__') {
                continue;
            }

            self::alterPalette($strTable, $varSearch, $varReplace, $strPalette, $isSubpalette);
        }
    }

    /**
     * Wrapper method. Alteration of multiple / all DCA subpalettes at once
     * 
     * @param   string $strTable
     * @param   string|array $varSearch
     * @param   string|array $varReplace
     * @param   array|string $varPalettes
     * @param   boolean $subpalettes
     * @return  void
     */
    public static function alterSubpalettes($strTable, $varSearch, $varReplace, $varPalettes = '', $subpalettes = true) {
        self::alterPalettes($strTable, $varSearch, $varReplace, $varPalettes, $subpalettes);
    }

    /**
     * Wrapper method. Adds a new field to the given DCA table.
     * 
     * @param   string $strTable
     * @param   string $strField
     * @param   array $arrField
     * @return  void
     */
    public static function addField($strTable, $strField, array $arrField) {
        self::alterField($strTable, $strField, $arrField);
    }

    /**
     * Alters / replaces a single field for the given DCA table.
     * 
     * @param   string $strTable
     * @param   string $strField
     * @param   mixed $value
     * @return  void
     */
    public static function alterField($strTable, $strField, $value) {
        $GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $value;
    }

    /**
     * Alters / replaces a single field value for the given DCA table.
     * 
     * @param   string $strTable
     * @param   string $strField
     * @param   mixed $value
     * @return  void
     */
    public static function alterFieldValue($strTable, $strField, $strKey, $value) {
        $GLOBALS['TL_DCA'][$strTable]['fields'][$strField][$strKey] = $value;
    }

    /**
     * Alters / replaces a single field eval value for the given DCA table.
     * 
     * @param   string $strTable
     * @param   string $strField
     * @param   mixed $value
     * @param   boolean $add
     * @return void
     */
    public static function alterFieldEval($strTable, $strField, $strKey, $value, $add = false) {
        $varSubject = &$GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['eval'][$strKey];

        if ($add && is_array($varSubject)) {
            $varSubject[] = $value;
        } elseif (true === $add) {
            $varSubject.= ' ' . $value;
        } else {
            $varSubject = $value;
        }
    }

    /**
     * Adds a single DCA palette or subpalette
     * 
     * @param   string $strTable
     * @param   string $strPalette
     * @param   string $strSubject
     * @param   boolean $isSubpalette
     * @return  void
     */
    public static function addPalette($strTable, $strPalette, $strSubject, $isSubpalette = false) {
        $strType = self::getPaletteType($isSubpalette);
        $GLOBALS['TL_DCA'][$strTable][$strType][$strPalette] = $strSubject;
    }

    /**
     * Adds a single DCA subpalette and also adds the required selector.
     * Wrapper method.
     * 
     * @param   string $strTable
     * @param   string $strPalette
     * @param   string $strSubject
     * @return  void
     */
    public static function addSubpalette($strTable, $strPalette, $strSubject) {
        self::addSelector($strTable, $strSubject);
        self::addPalette($strTable, $strPalette, $strSubject, true);
    }

    /**
     * Returns the type of palettes
     * 
     * @param   boolean $isSubpalette
     * @return  string
     */
    protected static function getPaletteType($isSubpalette = false) {
        return $isSubpalette ? 'subpalettes' : 'palettes';
    }

    /**
     * Returns the palettes keys as array
     * 
     * @param   string $strTable
     * @param   mixed $varPalettes
     * @param   boolean $isSubpalette
     * @return  array
     */
    protected static function getPalettesArray($strTable, $varPalettes, $isSubpalette = false) {
        $strType = self::getPaletteType($isSubpalette);

        if (empty($varPalettes)) {
            $arrPalettes = array_keys($GLOBALS['TL_DCA'][$strTable][$strType]);
        } elseif (is_string($varPalettes)) {
            $arrPalettes = array($varPalettes);
        } else {
            $arrPalettes = array();
        }

        return $arrPalettes;
    }
}
