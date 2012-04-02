<?php $this->load->view('layouts/admin/header');?>
<body>
<h1><?php echo $heading;?></h1>
<?php if ($this->session->flashdata('message_ok')) { ?>
<div class="message_ok">
	<?php echo $this->session->flashdata('message_ok');?>	
</div>
<?php } ?>
<?php foreach ($data as $d):?>
<ul>
	<li><?php echo $d->izena ;?></li>
	<li><?php echo $d->email ;?></li>
	<li><?php echo $d->pasahitza ;?></li>
</ul>
<?php endforeach;?>
<?php $this->load->view('layouts/admin/footer');?>
</body>
</html>	