<!DOCTYPE html>
<?php $this->load->view('elements/admin_header');?>
	<body data-spy="scroll" data-target=".subnav" data-offset="50">
		<?php $this->load->view('elements/admin_menu');?>

		 <div class="container">
		 	<header></header>
			<?php $this->load->view($subview); ?>

		</div>
		<?php $this->load->view('elements/admin_footer');?>

	<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->
	</body>
</html>