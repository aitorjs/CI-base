<!DOCTYPE html>
<?php $this->load->view('elements/header');?>
	<body>
	
	<div class="wrapper">
		<header>
			<div class="logo">Logo</div>
		</header>
		<?php $this->load->view('elements/menu');?>

		<div id="content">

			<?php $this->load->view($subview); ?>

		</div>
		<footer><?php $this->load->view('elements/footer');?></footer>
	</div>

	<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->
	</body>
</html>