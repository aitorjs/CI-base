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
   
   <?php echo form_open('erabiltzailea/update/'.$erabiltzailea['id']); ?>
   <p>
      <?php 
         echo form_label('Groups: ', 'groups_id');
          echo form_dropdown('groups_id', $groups_id, $erabiltzailea['group_id']);
        // echo form_input('motak_id', set_value('motak_id'), 'id="motak_id" autofocus');
      ?>
    </p>
     <p>
      <?php 
         echo form_label('Name: ', 'izena');
         echo form_input('izena', $erabiltzailea['izena'], 'id="izena" autofocus');
      ?>
   </p>
   <p>
      <?php 
         echo form_label('Email Address: ', 'email');
         echo form_input('email', $erabiltzailea['email'], 'id="email" autofocus');
      ?>
   </p>

   <p>
      <?php 
         echo form_label('Password:', 'pasahitza');
         echo form_password('pasahitza', '', 'id="pasahitza"');
         if (!empty($erabiltzailea['pasahitza'])) {
            echo "<span style='background-color:blue;color:white;padding:3px;'>Tiene contraseña</span>";
         } else {
           echo "<p style='background-color:red;color:white;padding:3px;'>No Tiene contraseña</p>";
         }
      ?>
   </p>

   <p>
      <?php echo form_submit('submit', 'Login'); ?>
   </p>
   <?php echo form_close(); ?>

   <?php echo validation_errors(); ?>

