   <h1> Update groups</h1>
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
   
   <?php echo form_open('groups/update/'.$group['id']); ?>
   <p>
      <?php 
         echo form_label('Name: ', 'name');
         echo form_input('name', $group['name'], 'id="name" autofocus');
      ?>
   </p>
   <p>
      <?php
        
         $data_active = array(
            'name'=> 'active',
            'id' => 'active',
            'value' => $group['active'],
            'checked' => $group['active'],
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

   <?php echo validation_errors(); ?>

