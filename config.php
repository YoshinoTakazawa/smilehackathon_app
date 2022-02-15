<?php

define('DSN', 'mysql:dbname=hackathon2021;host=localhost;charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('SITE_URL', 'http://localhost/team15/');

error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(1440, '/');