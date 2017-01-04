<?php
require_once(__DIR__ . '/../module/CustomSoap.php');

class Communication {
    // CONST
    static $SMS_NIC = "br150098-ovh";
    static $SMS_PASSWORD = "Bibi60870!";
    static $SMS_ACCOUNT = "sms-br150098-1";
    static $SMS_FROM = "Sport2Get";

    private static $_sms_instance;
    private static $_sms_session;

    public static function getInstance() {
        if (is_null(self::$_sms_instance)) {
            self::$_sms_instance = new SoapClient("https://www.ovh.com/soapi/soapi-re-1.8.wsdl");
            self::$_sms_session = self::$_sms_instance->login(self::$SMS_NIC, self::$SMS_PASSWORD, "fr", FALSE);
        }
    }

    static function sendMail($mail, $titre, $message) {
        mail($mail, $titre, $message);
    }

    static function sendSms($telephone_number, $message) {
        if (is_null(self::$_sms_instance)) {
            self::$_sms_instance = new SoapClient("http://www.ovh.com/soapi/soapi-re-1.63.wsdl",
                [
                    'stream_context' => stream_context_create([
                            'ssl' => ['verify_peer' => FALSE, 'verify_peer_name' => FALSE, 'allow_self_signed' => TRUE]
                        ]
                    )]);

            self::$_sms_session = self::$_sms_instance->login(self::$SMS_NIC, self::$SMS_PASSWORD, "fr", FALSE);
        }

        self::$_sms_instance->telephonySmsSend(self::$_sms_session, self::$SMS_ACCOUNT, self::$SMS_FROM, $telephone_number, $message, "", "1", "", "");
    }

    static function logout() {
        if (!is_null(self::$_sms_instance)) {
            self::$_sms_instance->logout();
        }
    }
}