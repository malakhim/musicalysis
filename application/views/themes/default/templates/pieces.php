<input type="hidden" name="title" value="Pieces"/>

<div class="page-header"><h1><?php echo $this->lang->line('index')?> <small><?php echo $this->lang->line('pieces_instructions')?> (Maybe search bar here?)</small></h1></div>

<div class="table-responsive">
	<table class="table">
		<thead>
			<th><?php echo $this->lang->line('title')?></th>
			<th><?php echo $this->lang->line('composer')?></th>
			<th><?php echo $this->lang->line('year')?></th>
		</thead>
		<tbody>
		<?php if (!empty($pieces)):?>
			<?php foreach($pieces as $p):?>
				<td><?php echo $p->title?></td>
				<td><?php echo $p->composer_surname.", ".$p->composer_firstname?></td>
				<td><?php echo $p->year?></td>
			<?php endforeach?>
		<?php else:?>
			<tr>
				<td colspan="3">
					<?php echo $this->lang->line('no_results_found')?>
				</td>
			</tr>
		<?php endif?>
		</tbody>
	</table>
</div>