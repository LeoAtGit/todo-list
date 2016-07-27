<?php

require("db.php");

$id = isset($_POST["id"]) ? $_POST["id"] : null;

if ($id === "" || $id === null) {
	exit(0);
}

// prepare the statement (taken from php.net)
if (!($stmt = $mysqli->prepare("UPDATE notes SET viewable = 0 WHERE id = ?"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	$mysqli->close();
	exit(1);
}

if (!$stmt->bind_param("i", $id)) {
	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	$mysqli->close();
	exit(2);
}

if (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	$mysqli->close();
	exit(3);
}

echo "success";
$mysqli->close();
exit(0);

