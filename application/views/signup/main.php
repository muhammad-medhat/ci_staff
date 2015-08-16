<fieldset>
<legend>البيانات الاكاديمية</legend>
<?php
  $name       = $this->session->userdata('name'); 
  $fid        = $this->session->userdata('fid'); 
  $gid        = $this->session->userdata('gid'); 
  $year       = $this->session->userdata('graduation_year'); 
  $department = $this->session->userdata('department'); 
  $division   = $this->session->userdata('division'); 
  $certificate_type_id = $this->session->userdata('certificate_type_id'); 




  echo form_input('name', set_value('name', $name), 'placeholder="الاسم كاملا"');
  
  echo "<select name='faculty'>";
    foreach ($faculties_list as $f) {
      $selected='';
      if($fid == $f->id)
        $selected='selected';
      echo "<option value='$f->id' $selected>$f->arabic</option>";
    }
  echo "</select>";

  echo form_input('year', set_value('year', $year), 'class="year" maxlength="4" onkeypress="return isNumber(event)" placeholder="سنة التخرج" style="width:60px"');
    echo "<select name='grade_id'>";
  foreach ($grades as $gr) {
    $selected='';
    if($gid==$gr->id)
      $selected='selected';
    echo "<option value='$gr->id' $selected>$gr->arabic</option>";
  }
    echo "</select>";

  echo form_input('department', set_value('department', $department), 'placeholder="القسم"');
  echo form_input('division', set_value('division', $division), 'placeholder="الشعبة"');

  echo "<select name='ac_level'>";
  $selected='';
    foreach ($ac_degrees as $ac) {
      $selected='';
      if($certificate_type_id == $ac->id){
        $selected='selected';
      }
      echo "<option value='$ac->id' $selected>$ac->arabic</option>";
    }
  echo "</select>";
  //var_dump($this->session->userdata('') );

  
    ?>
  </fieldset>
