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

class Core
    {


    /**
     * Checks itself to be on the correct server
     *
     * @param   void
     * @return  \mhg\Core
     */
    public function initializeSystem()
        {
        $this->loadProjectConfiguration();

        return $this;
        }


    /**
     * Loads the project configuration
     *
     * @param   void
     * @return  \mhg\Core
     */
    protected function loadProjectConfiguration()
        {
        if( file_exists( TL_ROOT . '/system/config/projectconfig.php' ) )
            {
            include TL_ROOT . '/system/config/projectconfig.php';
            }

        return $this;
        }


    public function addLogEntry( $strText, $strFunction, $strCategory )
        {
        if( $strFunction == 'PageError404 generate()' )
            {
            $referrer = getenv( 'HTTP_REFERER' );

            if( !empty( $referrer ) )
                {
                \Database::getInstance()->prepare( "UPDATE tl_log SET referrer=? WHERE id=LAST_INSERT_ID()" )
                    ->execute( $referrer );
                }
            }
        }
    }