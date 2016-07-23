<?php

// password and username
require("credentials.php");

// establish a sql connection
$mysqli = new mysqli('127.0.0.1', $username, $password, 'tododb');
if ($mysqli->connect_errno) {
	echo "Sorry, couldn't connect to the Database";
	exit(1);
}

