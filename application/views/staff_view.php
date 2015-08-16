<style type="text/css" media="all">
  .sortable td{ 
    word-wrap:break-word; 
    width:150px;
    text-align:right;
}

.even{background-color: #e6f3f8;}  
.odd{background-color: #e1e1e1;}  
.sortable{
  width: 77%;
  margin-right: 144px;
  -webkit-box-shadow: 5px 4px 5px 0px #999;
}
</style>
<?php
$this->load->view("helpers/staff_search_view");
?>
<table class='sortable'>
<thead>
  <td>الاسم</td>
  <td>الكلية</td>
  <td>الدرجة</td>
  <td>القسم</td>
  <td>الموقع الشخصي </td>
</thead>
<tbody>
<?php foreach ($staff_list as $s) { ?>
  <tr>
    <td><a href='<?php echo site_url("staff/show_staff/$s->id")?>'><?php echo $s->name?></a></td>
    <td><?php echo $s->faculty?></td>
    <td><?php echo $s->degree?></td>
    <td><?php echo $s->section?></td>
    <td><a class='url' href='<?php echo $s->url?>' target='_blank' title="<?php echo $s->name?>"></a></td>
  </tr>
<?php } ?>
</tbody>
</table>
<?php echo $this->pagination->create_links();

