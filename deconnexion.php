<?php
require_once(__DIR__.'/module/Session.php');
Session::getInstance()->destroySession('user');


header('Location: index.php');