<!doctype html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Simple TODO-List">
	
	<title>TODOs</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png?v=1"/>
	
	<link rel="stylesheet" href="css/public.css">
	<script src="js/jquery.min-3.1.0.js"></script>
</head>

<body>
<div class="content">
	<h1 align="center" class="header">TODO-List</h1>
	<div class="space_between_notes"></div>
	<div class="add_new_note" id="first_element">
		<form autocomplete="off" action="#">
			<div id="add_new_note_div">
				<div id="div_new_note_text">
					<input type="text" id="input_new_note">
				</div>
				<div id="div_new_note_submit">
					<input type="submit" value="Add Note" id="submit_button">
				</div>
			</div>
		</form>
	</div>
	<div class="space_between_notes"></div>

	<?php

	require("fetch_all_todos.php");

	?>

	<script type="text/javascript" src="js/helper.js"></script>
</div>
</body>

