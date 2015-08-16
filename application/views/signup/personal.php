  <fieldset>
  <legend>بيانات التواصل</legend>
  <?php
$email   = $this->session->userdata('email');
$phone   = $this->session->userdata('phone');
$mobile  = $this->session->userdata('mobile');
$country = $this->session->userdata('country');
$city    = $this->session->userdata('city');
$address = $this->session->userdata('address');
$job     = $this->session->userdata('job');

//var_dump($this->session->userdata);
//echo "<hr>";


  echo form_input('email',    set_value('email'   , $email  ), 'placeholder="البريد الالكتروني"');
  echo form_input('phone',    set_value('phone'   , $phone  ), 'placeholder="رقم التليفون"');
  echo form_input('mobile',   set_value('mobile'  , $mobile ), 'placeholder="رقم الموبايل"');
  echo form_input('country',  set_value('country' , $country), 'placeholder="الدولة"');
  echo form_input('city',     set_value('city'    , $city   ), 'placeholder="المدينة"');
  echo form_input('address',  set_value('address' , $address), 'placeholder="العنوان"');
  echo form_input('job',      set_value('job'     , $job    ), 'placeholder="الوظيفة"');
?>
</fieldset>
