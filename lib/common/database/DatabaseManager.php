<?php
/**
 * @abstract
 * @name DatabaseManager
 * @category Database;
 * @namespace Application\lib\database
 * @filesource DatabaseManager.php
 * @version 1.0.0
 * @author Danilo Rodrigues dos Santos <danilo_santosrs@hotmail.com>
 * @copyright 2016-2017 by the contributors
 * @license GNU GENERAL PUBLIC LICENSE (GPL) Version 2, June 1991
 */

namespace Application\lib\database;

use Application\lib\database\Database;

abstract class DatabaseManager implements Database{

    /**
     * @property
     * @var hostServer
     * @name hostServer
     * @property-read
     * @property-write
     * @access private
     */
    protected $hostServer;

    /**
     * @property
     * @var serverPort
     * @name serverPort
     * @property-read
     * @property-write
     * @access private
     */
    protected $serverPort;

    /**
     * @property
     * @var databaseUser
     * @name databaseUser
     * @property-read
     * @property-write
     * @access private
     */
    protected $databaseUser;

    /**
     * @property
     * @var databasePassword
     * @name databasePassword
     * @property-read
     * @property-write
     * @access private
     */
    protected $databasePassword;

    /**
     * @staticvar
     * @var HOST_SERVER
     * @name HOST_SERVER
     * @access public
     */
    const HOST_SERVER = 0;

    /**
     * @staticvar
     * @var SERVER_PORT
     * @name SERVER_PORT
     * @access public
     */
    const SERVER_PORT = 1;

    /**
     * @staticvar
     * @var DATABASE_USER
     * @name DATABASE_USER
     * @access public
     */
    const DATABASE_USER = 2;

    /**
     * @staticvar
     * @var DATABASE_PASSWORD
     * @name DATABASE_PASSWORD
     * @access public
     */
    const DATABASE_PASSWORD = 3;

    /**
     * @method public [true | false] setAttribute(int $attrSymbol, mixed $value)
     * @param $attrSymbol
     * @param $value
     * @return bool
     */
    public function setAttribute($attrSymbol, $value){

        if (!is_int($attrSymbol)) {
            return false;
        }

        switch ($attrSymbol) {
            case 0:
                $this->hostServer = $value;
                break;
            case 1:
                $this->serverPort = $value;
                break;
            case 2:
                $this->databaseUser = $value;
                break;
            case 3:
                $this->databasePassword = $value;
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * @method public [String | NULL] getAttribute(int $attrSymbol, mixed $value)
     * @param $attrSymbol
     * @param $value
     * @return String
     */
    public function getAttribute($attrSymbol){

        if (!is_int($attrSymbol)) {
            return NULL;
        }

        $pptyValue = '';
        switch ($attrSymbol) {
            case 0:
                $pptyValue = $this->hostServer;
                break;
            case 1:
                $pptyValue = $this->serverPort;
                break;
            case 2:
                $pptyValue = $this->databaseUser;
                break;
            case 3:
                $pptyValue = $this->databasePassword;
                break;
            default:
                return NULL;
                break;
        }

        return $pptyValue;
    }
}

?>