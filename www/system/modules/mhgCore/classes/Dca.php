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

namespace mhg;


/**
 * class mhg\Dca
 * 
 * Modifications to DCA tables, fields and defintions 
 */
class Dca {

    /**
     * Alteration of multiple / all DCA palettes at once
     * 
     * @param   string|array $search
     * @param   string|array $replace
     * @param   string $strTable
     * @param   array $arrPalettes
     * @param   boolean $subpalettes
     * @return  void
     */
    public static function modifyPalettes($search, $replace, $strTable, array $arrPalettes = array(), $subpalettes = false) {
        $palette = $subpalettes ? 'subpalettes' : 'palettes';

        if (empty($arrPalettes)) {
            $arrPalettes = array_keys($GLOBALS['TL_DCA'][$strTable][$palette]);
            unset($arrPalettes['__selector__']);
        }

        foreach ($arrPalettes as $strPalette) {
            self::modifyPalette($search, $replace, $strTable, $strPalette, $subpalettes);
        }
    }

    /**
     * Wrapper method. Alteration of multiple / all DCA subpalettes at once
     * 
     * @param   string|array $search
     * @param   string|array $replace
     * @param   string $strTable
     * @param   array $arrPalettes
     * @param   boolean $subpalettes
     * @return  void
     */
    public static function modifySubpalettes($search, $replace, $strTable, array $arrPalettes = array(), $subpalettes = true) {
        return self::modifyPalettes($search, $replace, $strTable, $arrPalettes, $subpalettes);
    }

    /**
     * Modifies a single DCA palette
     * 
     * @param   string|array $search
     * @param   string|array $replace
     * @param   string $strTable
     * @param   string $strPalette
     * @param   boolean $subpalettes
     * @return  void
     */
    public static function modifyPalette($search, $replace, $strTable, $strPalette = 'default', $subpalettes = false) {
        $palette = $subpalettes ? 'subpalettes' : 'palettes';

        if ($strPalette !== '__selector__') {
            $subject = &$GLOBALS['TL_DCA'][$strTable][$palette][$strPalette];
            $subject = str_replace($search, $replace, $subject);
        }
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
     * @return void
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
     * @return void
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

        if ($add && is_array($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['eval'][$strKey])) {
            $GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['eval'][$strKey][] = $value;
        } elseif (true === $add) {
            $GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['eval'][$strKey].= ' ' . $value;
        } else {
            $GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['eval'][$strKey] = $value;
        }
    }
}
