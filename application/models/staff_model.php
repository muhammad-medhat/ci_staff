<?php

class Staff_model extends CI_Model {

  var $staff_table; 
  var $staff_email_table; 
  var $faculties_table;
  var $degrees_table;
  var $sections_table;
  var $pubauth_table;
  var $publications_table;
  var $uploads_folder;

  function staff_model(){
    parent::__construct();
        $this->uploads_folder   = realpath(APPPATH .'uploads');
      $this->staff_table        = $this->db->dbprefix(staff_table);
      $this->staff_email_table  = $this->db->dbprefix(staff_email_table);
      $this->faculties_table    = $this->db->dbprefix(faculties_table);
      $this->degrees_table      = $this->db->dbprefix(degrees_table);
      $this->sections_table     = $this->db->dbprefix(sections_table);
      $this->pubauth_table      = $this->db->dbprefix(pubauth_table);
      $this->publications_table = $this->db->dbprefix(publications_table);
  }



  function get_num_search($_fid=0, $_degree=0, $_name='', $_section=0)
  {
    
    echo $_name;
        $q = "
      SELECT count(*) as number 
      FROM $this->staff_table s
      left join $this->faculties_table f on f.id=s.fid 
      left join $this->degrees_table d on d.id=s.degid 
      left join $this->sections_table sc on sc.id=s.secid 
      where 1=1";
      if($_fid!=0)
        $q .= " and f.id=$_fid";
      if($_degree!=0)
        $q .= " and d.id=$_degree";
      if($_name!='')
        $q .= " and s.name like'$_name%'";
      if($_section!=0)
        $q .= " and s.secid='$_section'";

    

      $query = $this->db->query($q);
      $result = $query->result();
    $cnt = $result[0];
      //echo"<div class='query'>num search " .$this->db->last_query() ."</div>";
    return $cnt->number;
  }

  function get_num_all()
  {
    $n = $this->db->count_all($this->staff_table);
    //echo"<div class='query'>num all the staff " .$this->db->last_query() ."</div>";

    return $n;
  }

  function get_all($_limit, $_offset, $_fid=0, $_degree=0, $_name='', $_section=0)
  {
    $q = "
      SELECT s.id, s.name, sd.url, sec.name as section, f.arabic as faculty, d.name as degree 
      FROM $this->staff_table s
      left join $this->faculties_table f on f.id=s.fid 
      left join $this->degrees_table d on d.id=s.degid 
      left join $this->sections_table sec on sec.id=s.secid  
      left join $this->staff_email_table sd on sd.sid=s.id 
      where 1=1 
      ";
     if($_fid!=0)
       $q .= " and f.id=$_fid";
     if($_degree!=0)
       $q .= " and d.id=$_degree";
     if($_name!='')
       $q .= " and s.name like'$_name%'";
     if($_section!='')
       $q .= " and s.secid='$_section'";

    $limit_string = ($_offset == '')? "limit $_limit":"limit $_offset, $_limit";
    

    $query = $this->db->query("$q $limit_string");
    //echo"<div class='query'>all the staff " .$this->db->last_query() ."</div>";
    return $query->result();
  
  }
  
  function get_faculties()
  {
    $this->db->select("id, arabic");
    $faculties = $this->db->get(faculties_table);
    return $faculties->result();
  }

  function get_degrees()
  {
    $this->db->select("id, name");
    //$this->db->where("order > ", "0");
    $deg = $this->db->get(degrees_table);
    return $deg->result();
  }

  function get_sections()
  {
    $this->db->select("id, section");
    //$this->db->where("order > ", "0");
    $deg = $this->db->get(staff_table);
    return $deg->result();
  }

  function get_fac_sections($_fid)
  {
    $this->db->select("id, name");
    $this->db->where("fid", $_fid);
    $deg = $this->db->get(sections_table);
    return $deg->result();

  }

  function get_faculty_name($_fid)
  {
    $this->db->select('arabic');
    $this->db->where('id',$_fid);
    $query = $this->db->get($this->faculties_table);
    $res = $query->result();
    //var_dump($res);
    $arr = $res[0];
    return $arr->arabic;
  }

  function get_degree_name($_fid)
  {
    $this->db->select('arabic');
    $this->db->where('id',$_fid);
    $query = $this->db->get($this->degrees_table);
    $res = $query->result();
    //var_dump($res);
    $arr = $res[0];
    return $arr->arabic;
  }


  function get_staff($_id)
  {
    $query = "select 
      s.id as staff_id, 
      s.name,
      s.cvfilename as cv,
      s.idauth,
      d.name as degree, 
      f.arabic as faculty, 
      sc.name as section, 
      sd.url
      from  $this->staff_table s
      
      left join $this->staff_email_table sd on s.id=sd.sid
      left join $this->faculties_table f on f.id=s.fid
      left join $this->degrees_table d on d.id=s.degid
      left join $this->sections_table sc on sc.id=s.secid

      where s.id=$_id
      ";
    $q = $this->db->query($query);
//echo"<div class='query'>" .$this->db->last_query() ."</div>";

    return $q->result();
  }

  function get_publications($_id)
  {
    $q = "select s.id, s.name, p.title from staff_staff s 
      left join $this->pubauth_table pa on pa.idauth=s.idauth
      left join $this->publications_table p on p.id=pa.idpub
      where s.id=$_id";
    $query = $this->db->query($q);
    //echo"<div class='query'>" .$this->db->last_query() ."</div>";

    return $query->result();
  }

}
