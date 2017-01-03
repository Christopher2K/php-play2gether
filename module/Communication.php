<?php

    class Communication {
        // CONST 
        static $SMS_NIC = "br150098-ovh";
        static $SMS_PASSWORD = "Bibi60870!";
        static $SMS_ACCOUNT = "sms-br150098-1";
        static $SMS_FROM ="Sport2Get";

        private static $_sms_instance;

        public static function getInstance() {
            if (is_null(self::$_sms_instance)) {
                    self::$_sms_instance = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");
                    self::$_sms_session = self::$_sms_session->login(self::$SMS_NIC, self::$SMS_PASSWORD ,"fr", false);
            }
        }
        
        static function sendMail() {

        }

        static function sendSms($telephone_number, $message) {
            if (is_null(self::$_sms_instance)) {
                    self::$_sms_instance = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");
                    self::$_sms_session = self::$_sms_session->login(self::$SMS_NIC, self::$SMS_PASSWORD ,"fr", false);
            }

            self::$_sms_instance->telephonySmsSend(self::$_sms_session, self::$SMS_ACCOUNT, self::$SMS_FROM, $telephone_number, $message, "", "1", "", "");
        }

        static function logout() {
            if (!is_null(self::$_sms_instance)) {
                self::$_sms_instance->logout();
            }
        }
    }