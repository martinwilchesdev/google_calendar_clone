<?php

// 1. conectar servidor local mysql
$connection = new mysqli('localhost', 'root', 'password', 'calendar');
$connection->set_charset('utf8mb4');
