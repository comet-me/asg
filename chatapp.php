<!DOCTYPE html>
<html>
<head>
	<title>Simple Chat App</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#chat-form').submit(function(event) {
				event.preventDefault();
				$.ajax({
					url: 'insert_message.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(response) {
						$('#chat-messages').append(response);
						$('#message').val('');
					}
				});
			});
		});
	</script>
</head>
<body>
	<h1>Simple Chat App</h1>
	<div id="chat-messages"></div>
	<form id="chat-form">
		<label for="user">Name:</label>
		<input type="text" name="user" id="user"><br><br>
		<label for="message">Message:</label>
		<input type="text" name="message" id="message"><br><br>
		<button type="submit">Send</button>
	</form>
</body>
</html>
