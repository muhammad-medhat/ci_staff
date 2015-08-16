<div id='info'>
<?php if($num_rows!=0){
  echo "عدد اعضاء هيئة التدريس $num_rows";  
} else {
  echo"لا يوجد نتائج";
}
?>
  
</div>
<div id='search_box' >
<?php echo form_open('staff/search')?>
<table>
<tr>
  <td class='data'>الاسم</td>
  <td><input type="text" name="name" placeholder='اول حروف من الاسم' /></td>
  <td></td>
</tr>
  <tr>
  </tr>
  <tr>
  </tr>
<tr>
  <td class='data'>الكلية</td>
  <td>
<select name="faculty" id="faculty_ddl">
  <option value=''>...</option>
  <?php foreach ($faculties_list as $f) { ?>
    <option value="<?php echo $f->id?>"><?php echo $f->arabic?></option>
  <?php } ?>  
</select>
  </td>
  <td></td>
</tr>
<tr>
  <td class='data'>القسم</td>
  <td>
<select name="section" id="sections">
  <option value=''>...</option>
  <?php //foreach ($sections as $sec) { ?>
    <option value="<?php// echo $sec->id?>"><?php //echo $sec->section?></option>
  <?php// } ?>  
</select>
  </td>
  <td></td>

</tr>
<tr>
  <td class='data'>الدرجة العلمية</td>
  <td>
  <select name="degree" id="">
  <option>...</option>
  <?php foreach ($degrees as $ad) { ?>
    <option value="<?php echo $ad->id?>"><?php echo $ad->name?></option>
  <?php } ?>  
</select>

  </td>
  <td>
    <input type="submit" value="search" class='search_button' />
  </td>
</tr>
</table>

<?php echo form_close(); ?>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#faculty_ddl').change(function(){
      fid = this.value;
      $.ajax({
        url:"<?php echo site_url('staff/get_sections/')?>/" + fid,
          dataType: "html", 
          success:function(response){
            //alert(response);
            load_sections(response);
          }
      });
      //alert('asdf' + fid + "ffff")
    });
  });
function load_sections(data){
  $('#sections').html(data);
 // var value = {};
 // for (var i = 0, l = data.length; i < l; i ++) {
 //   var v = data[i];
 //   //alert(v);
 //   //value.push(v);
 // }
 // //alert(value);
}
</script>
