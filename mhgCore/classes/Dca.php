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
namespace mhg;

class Dca
    {


    /**
     * 
     * @param type $search
     * @param type $replace
     * @param type $strTable
     * @param array $arrPalettes
     * @param type $subpalettes
     */
    public static function modifyPalettes( $search, $replace, $strTable, array $arrPalettes = array(), $subpalettes = false )
        {
        $palette = $subpalettes ? 'subpalettes' : 'palettes';

        if( empty( $arrPalettes ) )
            {
            $arrPalettes = array_keys( $GLOBALS['TL_DCA'][$strTable][$palette] );
            unset( $arrPalettes['__selector__'] );
            }

        foreach( $arrPalettes as $strPalette )
            {
            self::modifyPalette( $search, $replace, $strTable, $strPalette, $subpalettes );
            }
        }


    public static function modifySubpalettes( $search, $replace, $strTable, array $arrPalettes = array(), $subpalettes = true )
        {
        return self::modifyPalettes( $search, $replace, $strTable, $arrPalettes, $subpalettes );
        }


    /**
     * 
     * @param type $search
     * @param type $replace
     * @param type $strTable
     * @param type $strPalette
     * @param type $subpalettes
     */
    public static function modifyPalette( $search, $replace, $strTable, $strPalette = 'default', $subpalettes = false )
        {
        $palette = $subpalettes ? 'subpalettes' : 'palettes';

        if( $strPalette !== '__selector__' )
            {
            $subject = &$GLOBALS['TL_DCA'][$strTable][$palette][$strPalette];
            $subject = str_replace( $search, $replace, $subject );
            }
        }


    /**
     * 
     * @param type $strTable
     * @param type $strField
     * @param type $value
     */
    public static function alterField( $strTable, $strField, $value )
        {
        $GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $value;
        }


    /**
     * 
     * @param type $strTable
     * @param type $strField
     * @param array $arrField
     */
    public static function addField( $strTable, $strField, array $arrField )
        {
        $GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrField;
        }
    }