   <h1> Please Login</h1>
   <?php if (validation_errors()) { ?>
      <div class="message_error">
         <?php echo validation_errors();?> 
      </div>
   <?php } ?>
 
   <?php if ($this->session->flashdata('message_ok')) { ?>
   <div class="message_ok">
      <?php echo $this->session->flashdata('message_ok');?> 
   </div>
   <?php } ?>

   <?php echo form_open('erabiltzailea/add'); ?>
    <p>
      <?php 
         echo form_label('Groups: ', 'groups');
          echo form_dropdown('groupa_id', $groups, 2);
        // echo form_input('motak_id', set_value('motak_id'), 'id="motak_id" autofocus');
      ?>
   </p>
     <p>
      <?php 
         echo form_label('Name: ', 'izena');
         echo form_input('izena', set_value('izena'), 'id="izena" autofocus');
      ?>
   </p>
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