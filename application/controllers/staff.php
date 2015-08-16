<?php

class Staff extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
  }

  function index()
  {
    //echo "stassssssssssssssssssff";
    $this->show_all();
  }

  function show_all()
  {
    //$staff_list = $this->staff_model->get_num_rows = count($staff_list);

    if($this->session->userdata('total_all_univ') == ''){
      $num_rows = $this->staff_model->get_num_all();
      $this->session->set_userdata('total_all_univ', $num_rows);
    } 
    else {
      $num_rows = $this->session->userdata('total_all_univ');
    }
    $limit = general_limit;
    $offset = $this->uri->segment(3);
    $url_segment=3;


    $base_url = "staff/show_all";


    $this->pagination($base_url, $num_rows, $limit, $url_segment);
    
    $faculties_list = $this->staff_model->get_faculties();
    $data['faculties_list'] = $faculties_list;

    $degrees = $this->staff_model->get_degrees();
    $data['degrees'] = $degrees;

//    $sections =  $this->staff_model->get_sections();
//    $data['sections'] = $sections;


    
    $data['num_rows'] = $num_rows;
    $staff_list = $this->staff_model->get_all($limit, $offset);


$data['staff_list'] = $staff_list;

    $data['page_title'] = "قائمة اعضاء هيئة التدريس";
    $data['main_content'] = 'staff_view';
    $this->load->view('includes/template', $data);
  }

  function pagination($url, $num_rows, $limit, $offset)
  {
    $base_url = $url;
    $config = array();
    $config["base_url"]       = site_url($base_url);
    $config["total_rows"]     = $num_rows;
    $config["per_page"]       = $limit;
    $config["uri_segment"]    = $offset;
    //$config["uri_segment"]    = 4;

    $config['full_tag_open']  = "<div class='paging'>";
    $config['full_tag_close'] = "</div>";

    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['next_link'] = '~>';
    $config['prev_link'] = '<~';
    
    $this->pagination->initialize($config);
  }

  function search()
  {
    $name    = $this->input->post('name');
    $faculty = $this->input->post('faculty');
    $degree  = $this->input->post('degree');
    $section = $this->input->post('section');
//echo "year is $year<br>faculty is $faculty<br>ac is $degree";

    $this->session->set_userdata('total_num_search', '');

    if($this->session->userdata('total_num_search') == ''){
      //$num_rows = $this->alumni_model->get_num_res($faculty, $year, $degree);
      $num_rows = $this->staff_model->get_num_search($faculty, $degree, $name, $section);
      $this->session->set_userdata('total_num_search', $num_rows);
    } 
    else {
      $num_rows = $this->session->userdata('total_all_fac');
    }


    $query_array = array(
      'name'    => $name, 
      'faculty' => $faculty, 
      'degree'  => $degree, 
      'section'  => $section 
    );

    $query_id = $this->input->save_query($query_array);
		
		redirect("staff/display/$query_id");

  }
  
  function display($query_id = 0, $offset = 0)
  {
    $limit=general_limit;
    $offset = $this->uri->segment(4);
    $url_segment=4;
     
    $this->input->load_query($query_id);
    $query_array = array(
      'name'    => $this->input->get('name'), 
      'faculty' => $this->input->get('faculty'), 
      'degree'  => $this->input->get('degree'), 
      'section'  => $this->input->get('section') 
    );
    /*
    echo "<div class='query'>";
      var_dump($query_array);
    echo "</div>";
     */
    $name    = $query_array['name'];
    $faculty = $query_array['faculty'];
    $degree  = $query_array['degree'];
    $section = $query_array['section'];



    
    if( !isset($num_rows) ) {
      $num_rows = $this->staff_model->get_num_search($faculty, $degree, $name, $section);
      $this->session->set_userdata('total_num_search', $num_rows);
    }else
      $num_rows = $this->session->userdata('total_num_search');

    $data['num_rows'] = $num_rows;

    $faculties_list = $this->staff_model->get_faculties();
    $data['faculties_list'] = $faculties_list;

    $degrees = $this->staff_model->get_degrees();
    $data['degrees'] = $degrees;

    //$sections =  $this->staff_model->get_sections();
    //$data['sections'] = $sections;

    
    $staff_list = $this->staff_model->get_all($limit, $offset, $faculty, $degree, $name, $section);
    //echo $this->db->last_query();
    $data['staff_list'] = $staff_list; 
    //$num_rows = $this->fields_model->search_staff_num($keywords, $field_name);
    
    $base_url = "staff/display/$query_id";
    
    $this->pagination($base_url, $num_rows, $limit, $url_segment);


    $data['page_title'] = "نتائج البحث";
    $data['main_content'] = 'staff_view';
    $this->load->view('includes/template', $data);

  }

  function show_staff($_id)
  {
    $staff_member = $this->staff_model->get_staff($_id);
    $pubs = $this->staff_model->get_publications($_id);
    //    var_dump($pubs);
    $data['pubs'] = $pubs;
    $data['staff_member'] =  $staff_member[0];

    $data['page_title'] = "البيانات الشخصية لعضو هيئة التدريس";
    $data['main_content'] = 'staff_member_view';
    $this->load->view('includes/template', $data);
  }
    
  function sites()
  {

  }

  function get_sections($_fid)
  {
    // used as ajax reqiest
    $sections = $this->staff_model->get_fac_sections($_fid);
    echo "<option></option>";
    foreach ($sections as $s) {
      echo"<option value='$s->id'>$s->name</option>";
    }
  }
  
  function rules()
  {
    // the registration rules
    $data['page_title'] = "قواعد التسجيل كعضو هيئة التدريس";
    $data['main_content'] = 'staff_rules_view';
    $this->load->view('includes/template', $data);
  }


}
