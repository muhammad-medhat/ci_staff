<style type="text/css">

</style>
<fieldset>
<p>تم التسجيل لكن يجب عليك تحميل صورة من شهادة التخرج ليتم مراجعتها قبل القبول </p>
<?php
  $name       = $this->session->userdata('reg_name'); 
  $user_id    = $this->session->userdata('reg_user_id'); 
  $alumni_id  = $this->session->userdata('reg_alumni_id'); 
  $fid        = $this->session->userdata('reg_fid'); 
  $gid        = $this->session->userdata('reg_gid'); 
  $year       = $this->session->userdata('reg_graduation_year'); 
  $department = $this->session->userdata('reg_department'); 
  $division   = $this->session->userdata('reg_division'); 
  $certificate_type_id = $this->session->userdata('reg_certificate_type_id'); 

?>
<legend>بيانات التسجيل</legend>
  <table>
<?php
$alumni_id = $registered_user_data[1][1];
?>
    <?php //echo"<p class='query'>$alumni_id</p>"//foreach ($registered_user_data as $key=>$value) {?>
<?php for($i = 2; $i<17; $i++) {?>
    <tr>
      <td class='data'><?php echo $registered_user_data[$i][2] ?></td>
      <td><?php echo $registered_user_data[$i][1]?></td>
    </tr>
<?php } ?>
    <?php //} foreach ?>
  </table>
<fieldset>
<legend>رفع الشهادة</legend>
  <?php
echo form_open_multipart("alumni/upload_cert/$alumni_id");
      //echo "<p>يجب عمل مسح ضوئي لشهادة التخرج او الافادة قبل التسجيل</p>";
      $data_upload=array(
        'name'=>'certeficate', 
        'class'=>'file'
      );
      
?>
<label class="cabinet"> 
  <?php echo form_upload($data_upload ); ?>
</label>
<?php
      echo form_submit('upload', 'رفع الشهادة', 'class="upload"');
    echo form_close();
  ?>
</fieldset>
  </fieldset>
