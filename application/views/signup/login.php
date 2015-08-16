  <fieldset>
  <legend>بيانات الدخول</legend>

  <?php
$username = $this->session->userdata('username');
  echo form_input('username',   set_value('',    $username), 'placeholder="اسم المستخدم" ');
  echo form_password('password',   set_value('',    ''), 'placeholder="كلمة المرور"');
  echo form_password('retype',  set_value('',   ''), 'placeholder="تأكيد كلمة المرور"');
  ?>
  
  </fieldset>
