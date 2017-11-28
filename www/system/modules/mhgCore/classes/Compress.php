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
 * class mhg\Compress
 */
class Compress {

    /**
     * Hook. 
     * 
     * @param   string $content
     * @param   string $strKey
     * @param   string $mode
     * @param   array $arrFile
     * @return  string
     */
    public function getCombinedFile($content, $strKey, $mode, $arrFile) {
        // compress css files
        if ($mode === \Contao\Combiner::CSS && $GLOBALS['TL_CONFIG']['compressCss']) {
            $content = $this->_compressCss($content);
        }

        // compress javascript files
        if ($mode === \Contao\Combiner::JS) {
            $content = $this->_compressJs($content);
        }

        return $content;
    }

    /**
     * Compress input css
     *
     * @param   string $input
     * @return  string
     */
    protected function _compressCss($input) {
        $str = $input;

        // remove comments
        $str = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $str);
        // remove tabs, spaces, newlines, etc.
        $str = str_replace(array("\n\r", "\r\n", "\r", "\n", "\t", '    ', '   ', '  '), ' ', $str);

        // css specials
        $str = str_replace(array(" >", " > ", "> "), '>', $str);
        $str = str_replace(array(" +", " + ", "+ "), '+', $str);
        $str = str_replace(array(" {", "{ "), '{', $str);
        $str = str_replace(array("; }", ";}"), '}', $str);
        $str = str_replace(": ", ':', $str);
        $str = str_replace(", ", ',', $str);
        $str = str_replace(" }", '}', $str);
        $str = str_replace(" 0px", ' 0', $str);
        $str = str_replace(" 0.", ' .', $str);
        $str = str_replace(",0.", ',.', $str);

        return $str;
    }

    /**
     * Compress input JavaScript
     *
     * @param   string $input
     * @return  string
     */
    protected function _compressJs($input) {
        $str = $input;
        /* remove comments */
        #$str = preg_replace( "/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $str );
        /* remove tabs, spaces, newlines, etc. */
        // "\n\r", "\r\n", "\r", "\n",
        $str = str_replace(array("\t", '    ', '   ', '  '), ' ', $str);
        /* remove other spaces before/after ) */
        $str = preg_replace(array('(( )+\))', '(\)( )+)'), ')', $str);

        $str = str_replace(array(" = ", " =", "= "), '=', $str);
        $str = str_replace(array(" ; ", " ;", "; "), ';', $str);
        $str = str_replace(array(" : ", " :", ": "), ':', $str);
        $str = str_replace(array(" , ", " ,", ", "), ',', $str);
        $str = str_replace(array(" { ", " {", "{ "), '{', $str);
        $str = str_replace(array("; }", ";}", ";} "), '}', $str);
        $str = str_replace(array(" } ", " }", "} "), '}', $str);
        $str = str_replace(array(" ? ", " ?", "? "), '?', $str);

        $str = str_replace("if (", 'if(', $str);
        $str = str_replace("function (", 'function(', $str);
        $str = str_replace(array("} else { ", "} else{", "}else {"), '}else{', $str);

        return $str;
    }
}
