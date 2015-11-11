<?php
Class Database{


    /**
     * @var $pdo
     */
    private static $instance;


    public static function getInstance(){
        if(!self::$instance){
                self::$instance = new PDO("mysql:host=localhost;dbname=mvc_tutorial;charset=UTF-8","root","");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

}