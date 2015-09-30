<?php
/**
 * mx|byte Contao 3 Extension
 *
 * @package     mhgCore
 * @link        http://www.medienhaus-gersoene.de
 * @license     propitary
 * @copyright   Copyright (c) 2015 Medienhaus Gersöne UG
 * @author      Pierre Gersöne <mail@medienhaus-gersoene.de>
 */
mhg\Dca::modifyPalettes( array( ',space', ',imagemargin', ',floating', ',caption' ), '', 'tl_content' );
mhg\Dca::modifySubpalettes( array( ',space', ',imagemargin', ',floating', ',caption' ), '', 'tl_content' );
mhg\Dca::modifyPalettes( ',alt', ',alt,caption', 'tl_content' );
mhg\Dca::modifySubpalettes( ',alt', ',alt,caption', 'tl_content' );
mhg\Dca::modifyPalettes( ',size', ',size,floating', 'tl_content' );
mhg\Dca::modifySubpalettes( ',size', ',size,floating', 'tl_content' );


$GLOBALS['TL_DCA']['tl_content']['fields']['size']['eval']['tl_class'].= ' clr';
$GLOBALS['TL_DCA']['tl_content']['fields']['imageUrl']['eval']['tl_class'].= ' clr';
