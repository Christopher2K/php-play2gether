<?php
require_once('module/Session.php');
Session::getInstance()->destroySession('user');

header('Location: index.php');