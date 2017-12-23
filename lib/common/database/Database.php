<?php
/**
 * @interface
 * @name Database
 * @category Database;
 * @namespace Application\lib\database
 * @filesource Database.php
 * @version 1.0.0
 * @author Danilo Rodrigues dos Santos <danilo_santosrs@hotmail.com>
 * @copyright 2016-2017 by the contributors
 * @license GNU GENERAL PUBLIC LICENSE (GPL) Version 2, June 1991
 */

namespace Application\lib\database;

interface Database{

    /**
     * @method public [true | false] setAttribute(int $attrSymbol, mixed $value)
     * @param $attrSymbol
     * @param $value
     * @return bool
     */
    public function setAttribute($attrSymbol, $value);

    /**
     * @method public [String | NULL] getAttribute(int $attrSymbol, mixed $value)
     * @param $attrSymbol
     * @param $value
     * @return String
     */
    public function getAttribute($attrSymbol);
}

?>