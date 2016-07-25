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

// get the latest entry
$res = $mysqli->query("SELECT * FROM `notes` WHERE viewable = 1 ORDER BY `id` DESC LIMIT 1 ");
if (!$res) {
	echo "Couldn't get the last added note.";
	echo "$mysqli->error";
	exit(4);
}

$final_result = $res->fetch_all();

// echo back the data to the jquery script, which will immediately display it
echo $final_result[0][0] . " " . htmlspecialchars($final_result[0][1]);

$mysqli->close();
exit(0);

