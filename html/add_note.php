<?php

require("db.php");

$note = isset($_POST["note"]) ? $_POST["note"] : null;

if ($note === "" || $note === null) {
	exit(0);
}

// prepare the statement (taken from php.net)
if (!($stmt = $mysqli->prepare("INSERT INTO notes (note, viewable) VALUES (?, 1)"))) {
	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	$mysqli->close();
	exit(1);
}

if (!$stmt->bind_param("s", $note)) {
	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	$mysqli->close();
	exit(2);
}

if (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	$mysqli->close();
	exit(3);
}

$mysqli->close();
exit(0);

