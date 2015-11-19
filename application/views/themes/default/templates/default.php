<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $template_name?>">
    <head>
    	<meta charset="utf-8">
        <title><?php echo $title; ?></title>
    	<?php echo script_tag('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')?>

        <?php if(isset($header_vars) && $header_vars != null && !empty($header_vars)):
                foreach($header_vars as $header_var):
                    echo $header_var;
                endforeach;
            endif;?>
        <?php echo script_tag($main_js)?>
        <?php echo link_tag($main_css)?>
    </head>
 
    <body>
        <!-- <header> -->
               <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" id="logo" href="/"><?php echo $this->lang->line('musicalysis')?></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                      <li class="<?php if(strtolower($template_name) === strtolower($this->lang->line('home'))):echo 'active';endif?>"><a href="/"><?php echo $this->lang->line('home')?><span class="sr-only">(current)</span></a></li>
                        <li class="<?php if(strtolower($template_name) === strtolower($this->lang->line('about'))):echo 'active';endif?>"><a href="/about" ><?php echo $this->lang->line('about')?></a></li>
                       <li class="<?php if(strtolower($template_name) === strtolower($this->lang->line('pieces')) || strtolower($template_name) === strtolower($this->lang->line('piece'))):echo 'active';endif?>"><a href="/pieces"><?php echo $this->lang->line('pieces')?></a></li>
                       <li class="<?php if(strtolower($template_name) === strtolower($this->lang->line('contact'))):echo 'active';endif?>"><a href="/contact"><?php echo $this->lang->line('contact')?></a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                         <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                      </form>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav> 
        <!-- </header> -->
        <div class="container body-container">
            <?php echo $body; ?>
        </div>
        <footer>
        </footer>
    </body>
</html>