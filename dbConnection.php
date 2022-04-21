<?php
$DATBASE_SERVER_NAME = 'localhost';
$DATABASE_USERNAME   = 'root';
$DATABASE_PASSWORD   = '';
$DATABASE_ACCESSNAME = 'project monitoring system';
$connection = mysqli_connect($DATBASE_SERVER_NAME,$DATABASE_USERNAME,$DATABASE_PASSWORD,$DATABASE_ACCESSNAME);
if(!$connection){
   die("Connection failed: " . mysqli_connect_error());
}