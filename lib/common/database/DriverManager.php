<?php
/**
 * @final
 * @name DriverManager
 * @category Database;
 * @namespace Application\lib\database
 * @filesource DriverManager.php
 * @version 1.0.0
 * @author Danilo Rodrigues dos Santos <danilo_santosrs@hotmail.com>
 * @copyright 2016-2017 by the contributors
 * @license GNU GENERAL PUBLIC LICENSE (GPL) Version 2, June 1991
 **/

namespace Application\lib\database;

use Application\lib\common\StandardComponent;
use function Couchbase\defaultDecoder;


final class DriverManager extends DatabaseManager{

    private $listConnection;

    const DRIVER_TYPE_MYSQL = 0;
    const DRIVE_TYPE_POSTGRE = -1;

    /**
     * @ Dependency Injection
     * @trait
     */
    use StandardComponent;

    public function __construct(){
        self::init();
        $this->listConnection = array();
    }

    public function initEngine( $driverType = DriverManager::DRIVER_TYPE_MYSQL ){
        $idEngineConnection = NULL;
        switch( $driverType ){
            case DriverManager::DRIVER_TYPE_MYSQL:

                break;
            default:
                //
                break;
        }
    }

    public function getConnection(){
        //cod
    }

}