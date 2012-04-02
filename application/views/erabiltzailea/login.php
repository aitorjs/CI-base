<?php $this->load->view('layouts/admin/header');?>
<body>
   <h1> Please Login</h1>
   <?php echo form_open('erabiltzailea/login'); ?>
   <p>
      <?php 
         echo form_label('Email Address: ', 'email');
         echo form_input('email', set_value('email'), 'id="email" autofocus');
      ?>
   </p>

   <p>
      <?php 
         echo form_label('Password:', 'pasahitza');
         echo form_password('pasahitza', '', 'id="pasahitza"');
      ?>
   </p>

   <p>
      <?php echo form_submit('submit', 'Login'); ?>
   </p>
   <?php echo form_close(); ?>

   <?php echo validation_errors(); ?>
   <?php $this->load->view('layouts/admin/footer');?>
</body>
</html>	

