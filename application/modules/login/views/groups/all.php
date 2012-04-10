   <h1> Permisions groups</h1>
   <?php if (validation_errors()) { ?>
      <div class="message_error">
         <?php echo validation_errors();?> 
      </div>
   <?php } ?>
 
   <?php if ($this->session->flashdata('message_ok')) { ?>
   <div class="message_ok">
      <?php echo $this->session->flashdata('message_ok');?> 
   </div>
   <?php } ?>
<?php echo form_open('login/groups/all'); ?>
<table>
	<!-- Imprimir los grupos -->
	<tr>
		<td>&nbsp;</td>
		<?php $tds=0;
			  foreach ($groups as $group) { ?>	
			<td>
				<?php echo $group->name; 
			 		  $tds++; ?>
			</td>
		<? } ?>
	</tr>

	<!-- Imprime todos los permisos que hay -->
	<?php foreach ($permissions as $permission) {?>
		<tr>
			<td>
				<?php echo $permission->name; ?>
			</td>
			<?php foreach ($groups as $group) { 
				//echo $permissions_by_group[$i]['name'];
				if (in_array($group->id.'.'.$permission->id, $permissions_by_group)) $value=TRUE;
				else  $value=FALSE; ?>
		    	<td><?php echo form_checkbox($group->id.'.'.$permission->id, 
		    	       $group->id.'.'.$permission->id, $value ); ?></td>
			<?php } ?>
		</tr>
	<?php } ?>
</table>
<p>
	<?php echo form_submit('submit', 'Login'); ?>
</p>
<?php echo form_close(); ?>