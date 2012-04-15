<body>
	
	<h1> Please Login</h1>
	<?php echo validation_errors(); ?>
	<?php foreach ($data as $d):?>
	<ul>
		<li><?php echo $d->erabiltzailea_id ;?></li>
		<li><?php echo $d->izenburua ;?></li>
		<li><?php echo $d->edukia ;?></li>
	</ul>
	<?php endforeach;?>
	<p><?php echo $pagination; ?> </p>
</body>
</html>