<?php
    class Connection {

        private static $_instance;

        const DSN_PROD = 'mysql:dbname=play2gether;host=91.121.145.93';
        const DSN_V2 = 'mysql:dbname=play2getherv2;host=91.121.145.93';
        const DSN_DEV = 'mysql:dbname=play2getherdev;host=91.121.145.93';
        const USER = 'webgdpmiage1';
        const PASSWORD = 'gestiondeprojet';


        public static function getInstance() {
            if (is_null(self::$_instance)) {
                try {
                    self::$_instance = new PDO(self::DSN_V2, self::USER, self::PASSWORD);
                    self::$_instance->exec('SET NAMES utf8');
                } catch (PDOException $e) {
                    echo 'La connexion à la BDD a échouée : ' . $e->getMessage();
                    self::$_instance = false;
                }
            }

            return self::$_instance;
        }
    }