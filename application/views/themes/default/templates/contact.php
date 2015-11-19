<input type="hidden" name="title" value="Contact"/>
<div class="main_container">
	<div class="red_highlight_text">
		Have something to say? We’d love to hear from you.
	</div>
	<div class="about_body_text">We welcome feedback, piece suggestions, general queries, and contributions! Do leave us a note and we will get back to you as soon as possible.
	</div>
</div>
<form method="post" action="/contact" class="contact_form">
	<div class="form-group small-form-group">
		<label for="contact_name">Name:</label>
		<input type="text" name="name" id="contact_name" placeholder="Name" class="form-control"/>
	</div>
	<div class="form-group small-form-group">
		<label for="contact_email">Email:</label>
		<input type="email" name="email" id="contact_email" placeholder="Email" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="contact_message">Message:</label>
		<textarea class="form-control" rows="5" placeholder="Enter your message here!"></textarea>
	</div>
	<button type="submit" id="submit_button" class="btn btn_default">Submit</button>
</form>