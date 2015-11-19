<input type="hidden" name="title" value="Contact"/>
<form method="post" action="/contact" class="contact_form">
	<div class="form-group">
		<label for="contact_name">Name:</label>
		<input type="text" name="name" id="contact_name" placeholder="Name" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="contact_email">Email:</label>
		<input type="email" name="email" id="contact_email" placeholder="Email" class="form-control"/>
	</div>
	<button type="submit" id="submit_button" class="btn btn_default">Submit</button>
</form>