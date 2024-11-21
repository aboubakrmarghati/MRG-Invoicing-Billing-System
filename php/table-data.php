<?php

include 'database-connection.php';

$data_table = $pdo->query("SELECT * FROM `order_list`;")->fetchAll();
