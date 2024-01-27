<?php
require 'database.php';

session_start();
session_destroy();
header('location: signin');
die();
?>
