<?php // Title of page. NOTE: THIS IS REQUIRED ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<input type="hidden" name="title" value="<?php echo $title?>"/>




<div id="ytplayer"></div>

<div id="notes-block">
    <?php foreach($pieces as $time):?>

     <span data-start-time="<?php echo ($time->start_time * 1000)?>" data-end-time="<?php echo ($time->end_time * 1000)?>">
       <?php echo trim($time->text)?>
   </span>
   <?php endforeach?>  
</div>

<div id="blurb">
<div id="intro">Overview:</div>
    <?php echo $overview?><br/>
    <?php if($trivia != null):?><div class="highlighted-text">Trivia:</div> <?php echo $trivia?><?php endif?>
</div>

<script type="text/javascript" src="/assets/themes/default/js/playing.js"></script>