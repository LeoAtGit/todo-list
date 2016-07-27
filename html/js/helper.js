$("#submit_button").click(function() {
	$new_note = $("#input_new_note").val();
	$.post("/add_note.php",
		{ note: $new_note },
		function(data) {
			if (data) { //TODO: Error checking here!!!
	       			$("#input_new_note").val("");

				// data has the value "1 First Entry", we want to extract the first
				// number and display only the text afterwards. The number represents
				// the id of that note, which we need for safely deleting it
				$res = data.split(" ");
				$id = $res[0];
				$note = data.substring($id.length + 1);

				$("#first_element").after('<div class="space_between_notes"></div><div class="note" data-noteid="' + $id + '"><div class="checkbox"><img src="img/checkbox.png" /></div><div>' + $note + '</div></div>');
				$("div[data-noteid=" + $id + "] + div").hide().fadeIn(400);
				$("div[data-noteid=" + $id + "]").hide().fadeIn(400);
			}
		});
});

$(document).on("click", ".checkbox", function() {
	$id = $(this).parent().attr("data-noteid");
	$.post("/delete_note.php",
		{ id: $id },
		function(data) {
			if (data == "success") {
				$("div[data-noteid=" + $id + "] + div").fadeOut(400);
				$("div[data-noteid=" + $id + "]").fadeOut(400, function() {
						$("div[data-noteid=" + $id + "] + div").remove();
						$("div[data-noteid=" + $id + "]").remove();
					});
			}
		})
});

