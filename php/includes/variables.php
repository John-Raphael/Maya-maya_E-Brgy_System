<?php
$form = new FormHandler;
$form->DB_CONNECTION = $db;
$file = new FileHandler();

$nosql = new NoSql;
$nosql->DB_CONNECTION = $db;

$session = new Session;

$server = new Server;