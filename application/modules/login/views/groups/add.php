   <h1> Create group</h1>
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

   <?php echo form_open('login/groups/add'); ?>
   <p>
      <?php 
         echo form_label('Name: ', 'name');
         echo form_input('name', set_value('name'), 'id="name" autofocus');
      ?>
   </p>
   <p>
      <?php 
         $data_active = array(
            'name'=> 'active',
            'id' => 'active',
            'value' => 1,
            'checked' => TRUE,
            'style' => 'margin:10px',
         );
         
         echo form_label('Active: ', 'active');
         echo form_checkbox($data_active);

      ?>
   </p>
   <p>
      <?php echo form_submit('submit', 'Login'); ?>
   </p>
   <?php echo form_close(); ?>