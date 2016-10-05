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

/**
 * main class
 */
class ModuleSearch extends \Contao\ModuleSearch
    {


    public function generate()
        {
        global $objPage;

        $return = parent::generate();

        // add Keywords to page title
        $strKeywords = trim( \Input::get( 'keywords' ) );
        $page = intval( \Input::get( 'page' ) );

        if( $strKeywords )
            {
            // remove insert tags
            $strKeywords = preg_replace( '/\{\{[^\}]*\}\}/', '', $strKeywords );
            $strKeywords = strip_tags( strip_insert_tags( $strKeywords ) );
            $strKeywords = filter_var( $strKeywords, FILTER_SANITIZE_STRING );
            $strKeywords = ucwords( $strKeywords );

            if( !empty( $strKeywords ) )
                {
                $pageTitle = $strKeywords;

                if( $page > 1 )
                    {
                    $pageTitle.= ' - ' . $GLOBALS['TL_LANG']['MSC']['page'] . ' ' . $page;
                    }

                $pageTitle.= ' | ' . $objPage->pageTitle;

                $objPage->pageTitle = $pageTitle;
                }
            }


        return $return;
        }
    }