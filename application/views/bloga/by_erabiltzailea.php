<!--
	TODO: HTM5eko etiketak sartu 
	TODO: Elemnent batzuk sartu header, footer sartzeko

-->

<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1><?php echo $heading;?></h1>
<?php foreach ($data as $d):?>
<ul>
	<li><?php echo $d->erabiltzailea_id ;?></li>
	<li><?php echo $d->izenburua ;?></li>
	<li><?php echo $d->edukia;?></li>
	<li><a href="../../etiketa/by/<?php echo $d->etiketa_id;?>"><?php echo $d->izena;?></a></li>
</ul>
<?php endforeach;?>
</body>
</html>