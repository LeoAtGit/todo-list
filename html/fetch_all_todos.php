<?php

require("db.php");

$result = $mysqli->query("SELECT id, note FROM notes WHERE viewable = 1;");
if (!$result) {
	echo "Couldn't get your notes.";
	echo "Exiting...";
	exit(1);
}

$notes = $result->fetch_all();
$notes = array_reverse($notes);

foreach ($notes as $note) {
	echo '<div class="note" data-noteid="' . $note[0] . '">';
		echo '<div class="checkbox">';
			echo '<img src="img/checkbox.png" />';
		echo '</div>';
		echo '<div>';
			echo htmlspecialchars($note[1]);
		echo '</div>';
	echo '</div>';

	echo '<div class="space_between_notes"></div>';
}

