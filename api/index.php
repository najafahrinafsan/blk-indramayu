<?php

ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

error_log('DEBUG: api/index.php mulai dijalankan');

require __DIR__ . '/../public/index.php';