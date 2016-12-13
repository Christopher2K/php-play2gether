<?php
    class Connection {

        private static $_instance;

        const DSN_PROD = 'mysql:dbname=play2gether;host=91.121.145.93';
        const DSN_DEV = 'mysql:dbname=play2getherdev;host=91.121.145.93';
        const USER = 'webgdpmiage1';
        const PASSWORD = 'gestiondeprojet';


        public static function getInstance() {
            if (is_null(self::$_instance)) {
                try {
                    self::$_instance = new PDO(self::DSN_DEV, self::USER, self::PASSWORD);
                } catch (PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                    self::$_instance = false;
                }
            }

            return self::$_instance;
        }
    }