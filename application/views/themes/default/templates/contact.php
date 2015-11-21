<input type="hidden" name="title" value="Contact"/>
<script type="text/javascript" src="/assets/themes/default/js/contact.js"></script>
<?php if(isset($success)):?>
	<div class="alert alert-<?php if($success):?>success<?php else:?>danger<?php endif?> fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>
			<?php if($success):?>
				<?php echo ucfirst($this->lang->line('success'));?>
			<?php else:?>
				<?php echo ucfirst($this->lang->line('error'));?>
			<?php endif?>!
		</strong>
			<?php if($success):?>
				<?php echo ($this->lang->line('email_success'));?>
			<?php elseif(!$success):?>
				<?php echo ($this->lang->line('email_failure'));?>
			<?php else:?>
				<?php echo ($this->lang->line('email_error'));?>
			<?php endif?>
	</div>
<?php endif?>
<div class="contact_main_container col-sm-12">
	<div class="red_highlight_text">
		<?php echo $this->lang->line('contact_page_title')?>
	</div>
	<div class="about_body_text">
		<?php echo $this->lang->line('contact_page_text')?>
	</div>
</div>

<form method="post" action="/contact" class="contact_form">
	<div class="form-group col-sm-6 has-feedback">
		<label for="contact_name"><?php echo ucfirst($this->lang->line('name'))?>:</label>
		<input type="text" name="name" id="contact_name" placeholder="<?php echo ucfirst($this->lang->line('name'))?>" class="form-control"/>
	</div>
	<div class="form-group col-sm-6 has-feedback">
		<label for="contact_email"><?php echo ucfirst($this->lang->line('email'))?>:</label>
		<input type="email" name="email" id="contact_email" placeholder="<?php echo ucfirst($this->lang->line('email'))?>" class="form-control"/>
	</div>
	<div class="form-group has-feedback col-sm-12" >
		<label for="contact_message"><?php echo ucfirst($this->lang->line('message'))?>:</label>
		<textarea class="form-control" rows="5" placeholder="<?php echo ucfirst($this->lang->line('enter_message'))?>" id="contact_message"></textarea>
	</div>
	<button type="submit" id="submit_button" class="btn btn_default"><?php echo ucfirst($this->lang->line('submit'))?></button>
</form>