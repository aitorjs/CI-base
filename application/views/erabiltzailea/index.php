<h1><?php echo $heading;?></h1>
  <?php if (validation_errors() OR $this->session->flashdata('message_error')) { ?>
      <div class="message_error">
     	 <?php echo validation_errors();
               echo $this->session->flashdata('message_error');?> 
      </div>
   <?php } ?>
 
   <?php if ($this->session->flashdata('message_ok')) { ?>
   <div class="message_ok">
      <?php echo $this->session->flashdata('message_ok');?> 
   </div>
   <?php } ?>
<p><?php echo $pagination; ?> </p>
<?php foreach ($data as $d):?>
<ul>
	<li><?php echo $d->izena ;?></li>
	<li><?php echo $d->email ;?></li>
	<li><?php echo $d->pasahitza ;?></li>
</ul>
<?php endforeach;?>
 <p><?php echo $pagination; ?> </p>