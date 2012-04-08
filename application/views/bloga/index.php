<?php $this->load->view('layouts/admin/header'); ?>
<body>
	  <?php if (isset($_SESSION['user'])) {
         $this->load->view('layouts/admin/user_menu');
      } 		
	?>
	<h1> Please Login</h1>
	<?php foreach ($data as $d):?>
	<ul>
		<li><?php echo $d->erabiltzailea_id ;?></li>
		<li><?php echo $d->izenburua ;?></li>
		<li><?php echo $d->edukia ;?></li>
	</ul>
	<?php endforeach;?>
	<?php echo validation_errors(); ?>
	<?php $this->load->view('layouts/admin/footer');?>
</body>
</html>