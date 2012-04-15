	<h1> Bloga</h1>
	<ul>
		<li><a href="<?php base_url() ?>/by_erabiltzailea/<?php echo $erabiltzailea['id']; ?>"><?php echo $erabiltzailea['izena']; ?></a></li>
		<li><?php echo $bloga['izenburua'] ?></li>
		<li><?php echo $bloga['edukia'] ?></li>
	</ul>
	<?php echo validation_errors(); ?>