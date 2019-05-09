<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=smoothiesShop;charset=UTF8',
    'root', 'troiswa',
    [
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
