<style type="text/css" >

/*
 * #pubs{}
#personal_data{}
#*/
.even{   background-color: #e6f3f8;}
.odd{    background-color: #e1e1e1;}

#pubs li{
    padding: 5px;
    margin-right: -41px;
}
#pubs ul{
  
  list-style-type:none;
  width: 500px;
}
#pubs .info{margin-right:27%}
</style>
<?php
//echo $this->db->last_query();
?>
<div id='personal_data'>
      <table class='single' >
        <tr>
          <td colspan='2'>
            <h1><?php echo $staff_member->name?></h1>
          </td>
        </tr>
        <tr>
          <td class='label'>الكود </td>
          <td class='data'><?php echo $staff_member->staff_id?></td>
        </tr>
        <tr>
          <td class='label'>الاسم</td>
          <td class='data'><?php echo $staff_member->name?></td>
        </tr>

        <tr>
          <td class='label'>الكلية:</td>
          <td class='data'><?php echo $staff_member->faculty?></td>
        </tr>
        <tr>
          <td class='label'>القسم</td>
          <td class='data'><?php echo $staff_member->section ?></td>
        </tr>
        <tr>
          <td class='label'>الدرجة </td>
          <td class='data'><?php echo $staff_member->degree?></td>
        </tr>
<!--
        <tr>
          <td>ملف السيرة الذاتيه</td>
          <td><a href='cvurl/<?php echo $staff_member->cv?>'>تحميل</a></td>
        </tr>
-->
        <tr>
           <td class='label'>الموثع الشحضي</td>
           <td class='data'><a class='url' href='<?php echo $staff_member->url?>'></a></td>
        </tr>
        <tr>
          <td  colspan='2'>
            <input class='back' type='button' value='عودة' onclick='history.go(-1);'/>
          </td>
        </tr>
      </table>
</div>
<div id='pubs'>
<h2>المنشورات العلمية</h2>

<p class='info'>يمكنك متابعة صفحة ابحاث المؤلف من خلال عنوان صفحته على 
<a href='<?php echo auth_url .'/' .$staff_member->idauth?>' target='_blank'>موقع جامعة الاسكندرية</a>
</p>
<ul id='pubs_list' class='single'>
<?php $i = 0; ?>
<?php foreach($pubs as $p){ ?>
  <?php if( isset($p->title) ){ ?>
   <?php $class = ($i%2 == 0)?'even':'odd'?>
    <li class="<?php echo $class?>"><?php echo $p->title?></li>
<?php $i++; 
    } //end if?>
<?php } //end foreach?>
  </ul>
  <p>عدد الابحاث <?php echo $i?></p>

</div>
