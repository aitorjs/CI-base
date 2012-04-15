   <h1> Please Login</h1>
   <?php if (validation_errors()) { ?>
      <div class="message_error">
         <?php echo validation_errors();?> 
      </div>
   <?php } ?>
 <?php //$this->load->config('base', TRUE);
     // var_dump($this->config->config['base']['email']);?>
   <?php if ($this->session->flashdata('message_ok')) { ?>
   <div class="message_ok">
      <?php echo $this->session->flashdata('message_ok');?> 
   </div>
   <?php } ?>

   <?php echo form_open('bloga/add'); ?>
    <p>
      <?php 
         echo form_label('ID Erabiltzailea: ', 'erabiltzailea_id');
          echo form_dropdown('erabiltzailea_id', $erabiltzaileak, 2);
        // echo form_input('motak_id', set_value('motak_id'), 'id="motak_id" autofocus');
      ?>
   </p>
     <p>
      <?php 
         echo form_label('Izenburua: ', 'izenburua');
         echo form_input('izenburua', set_value('izenburua'), 'id="izenburua" autofocus');
      ?>
   </p>
   <p>
      <?php 
         echo form_label('Edukia: ', 'edukia');
         echo form_textarea('edukia', set_value('edukia'), 'id="edukia" autofocus');
      ?>
      <button onClick="addText();">Add Editor to TEXTAREA</button> 
      <button onClick="removeText();">Remove Editor from TEXTAREA</button> 
   </p>

   <p>
      <?php echo form_submit('submit', 'Login'); ?>
   </p>
   <?php echo form_close(); ?>

   <script src="../js/nicEdit.js" type="text/javascript"></script>
   <!--<script>
   var area1, area2;


   function addText() {
      area2 = new nicEditor({fullPanel : true}).panelInstance('edukia');
      return false;
   }
   function removeText() {
      area2.removeInstance('edukia');
      return false;
   }
   </script>-->

   <script>
      new nicEditor({fullPanel : true}).panelInstance('edukia');
   </script>