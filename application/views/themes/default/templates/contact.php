<input type="hidden" name="title" value="Contact"/>
<div class="contact_main_container">
	<div class="red_highlight_text">
		<?php echo $this->lang->line('contact_page_title')?>
	</div>
	<div class="about_body_text">
		<?php echo $this->lang->line('contact_page_text')?>
	</div>
</div>
<form method="post" action="/contact" class="contact_form">
	<div class="form-group small-form-group">
		<label for="contact_name"><?php echo ucfirst($this->lang->line('name'))?>:</label>
		<input type="text" name="name" id="contact_name" placeholder="<?php echo ucfirst($this->lang->line('name'))?>" class="form-control"/>
	</div>
	<div class="form-group small-form-group">
		<label for="contact_email"><?php echo ucfirst($this->lang->line('email'))?>:</label>
		<input type="email" name="email" id="contact_email" placeholder="<?php echo ucfirst($this->lang->line('email'))?>" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="contact_message"><?php echo ucfirst($this->lang->line('message'))?>:</label>
		<textarea class="form-control" rows="5" placeholder="<?php echo ucfirst($this->lang->line('enter_message'))?>"></textarea>
	</div>
	<button type="submit" id="submit_button" class="btn btn_default"><?php echo ucfirst($this->lang->line('submit'))?></button>
</form>