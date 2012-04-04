   <h1> Please Login</h1>
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

