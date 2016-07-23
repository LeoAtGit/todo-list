$("#submit_button").click(function() {
			$.post("/add_note.php", { note: $("#input_new_note").val() });
		});

