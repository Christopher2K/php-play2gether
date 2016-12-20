<?php

/**
 * Created by PhpStorm.
 * User: Tarek EL MARSSI
 * Date: 12/12/2016
 * Time: 13:01
 */
class Session
{
    static $instance;

    private function __construct()
    {
        session_start();
    }

    public static function getInstance(){
        if(!self::$instance) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function writeSession($key, $value){
        $_SESSION[$key]=$value;
    }


    public function readSession($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function destroySession($key){
        unset($_SESSION[$key]);
    }
}
?>