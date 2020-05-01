<?php

/*
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "wordpress";
$password   = "wordpress";
$dbname     = "tracker";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );