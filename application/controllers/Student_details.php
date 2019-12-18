<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_details extends CI_Controller {

	  	public function __construct()
		{
		parent::__construct();
		
		$this->load->database();
		
		$this->load->library('form_validation'); //For Form Validation

		$this->load->helper(array("url","form","helping_function")); //For URL Redirection

		$this->load->model('Student_details_model');//student details model

		$this->load->library('session');// Session library
		
		}

	  public function index()
	  {

//---------------------------Name validation---------------------------------

		$this->form_validation->set_rules('name', 'Student Name', 'trim|required|min_length[2]|max_length[50]|regex_match[/^[a-zA-Z ]*$/]',
			array('required'=>"The Student Name is Required"),
			array('regex_match'=>"Only Letters and Spaces Are Allowrd")
			);

		$this->form_validation->set_message("min_length","The length of your name is too short atleast 2 letters required");
		$this->form_validation->set_message("max_length","The length of your name is too long");

//---------------------------phone number validation---------------------------------
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|exact_length[10]|regex_match[/^[0-9]*$/]',

			array('required'=>"The Phone Number is Required"),
			array('regex_match'=>"Please Enter Numbers Only")
			);

		$this->form_validation->set_message("exact_length","The length of your phone number is too short 10 digits required");

//---------------------------Reg number validation---------------------------------

		$this->form_validation->set_rules('reg_number', 'Register Number','trim|required|exact_length[6]|regex_match[/^[0-9]*$/]',
			array('required'=>"The Register Number is Required"),
			array('regex_match'=>"Please Enter Numbers Only")
			);

		$this->form_validation->set_message("exact_length","The length of your register number is too short 6 digits required");

//---------------------------address validation---------------------------------


		$this->form_validation->set_rules('address',"Address",'trim|required',
		array('required'=>"The Address is Required")
		);


//------------------------End Of Validation-------------------------------------

		if ($this->form_validation->run() === FALSE) 
		{
		    $this->load->view('student_details');
        } 
        else 
        {

		    $data["id"]="";
		    $data["student_name"]=$this->input->post("name");
		    $data["phone_number"]=$this->input->post("phone_number");
		    $data["reg_number"]=$this->input->post("reg_number");
		    $data["address"]=$this->input->post("address");

		    $this->Student_details_model->Student_details_insert($data);
			redirect('student_marks');
        }

	  }

//---------------------------end of index controller-----------------------------------------------

	  public function student_marks()
	  {
//---------------------------Validation---------------------------------------------------

	  	// $this->form_validation->set_rules('user','user','required');
	  	$this->form_validation->set_rules('user', 'Username', 'required');
	  			// $this->form_validation->set_message("required","Please Select The Student Name");

	  	$this->form_validation->set_rules('tamil','Mark','required|max_length[3]|regex_match[/^[0-9]*$/]');
	  			// $this->form_validation->set_message("required","The Mark is Required");
	  			$this->form_validation->set_message("max_length","Only 3 Digits are Allowed");
	  			$this->form_validation->set_message("regex_match","Please Enter Numbers Only");

	  	$this->form_validation->set_rules('english','Mark','required|max_length[3]|regex_match[/^[0-9]*$/]');
	  			// $this->form_validation->set_message("required","The Mark is Required");
	  			$this->form_validation->set_message("max_length","Only 3 Digits are Allowed");
	  			$this->form_validation->set_message("regex_match","Please Enter Numbers Only");

	  	$this->form_validation->set_rules('maths','Mark','required|max_length[3]|regex_match[/^[0-9]*$/]');
	  			// $this->form_validation->set_message("required","The Mark is Required");
	  			$this->form_validation->set_message("max_length","Only 3 Digits are Allowed");
	  			$this->form_validation->set_message("regex_match","Please Enter Numbers Only");

	  	$this->form_validation->set_rules('science','Mark','required|max_length[3]|regex_match[/^[0-9]*$/]');
	  			// $this->form_validation->set_message("required","The Mark is Required");
	  			$this->form_validation->set_message("max_length","Only 3 Digits are Allowed");
	  			$this->form_validation->set_message("regex_match","Please Enter Numbers Only");
	  		
	  	$this->form_validation->set_rules('social_science','Mark','required|max_length[3]|regex_match[/^[0-9]*$/]');
	  			// $this->form_validation->set_message("required","The Mark is Required");
	  			$this->form_validation->set_message("max_length","Only 3 Digits are Allowed");
	  			$this->form_validation->set_message("regex_match","Please Enter Numbers Only");

//---------------------------End of Validation---------------------------------------------

		if ($this->form_validation->run() === FALSE) 
		{
		  	$result['results']=$this->Student_details_model->select_student_details();
		  	$this->load->view('student_marks',$result);
        } 
        else 
        {

		  	$student_marks["student_id"]=$this->input->post("user");
		  	$student_marks["tamil"]=$this->input->post("tamil");
		  	$student_marks["english"]=$this->input->post("english");
		  	$student_marks["maths"]=$this->input->post("maths");
		  	$student_marks["science"]=$this->input->post("science");
		  	$student_marks["social_science"]=$this->input->post("social_science");

		  	$this->session->set_userdata('id', $this->input->post("user"));


		    $this->Student_details_model->insert_student_mark($student_marks);
			redirect('result_page');
        }
	}

//---------------------------end of student marks controller-----------------------------------------------


	  public function result_page()
	  {
	  	$id=$_SESSION['id'];
	  	$marks_array['student_name']=$this->Student_details_model->get_student_name($id);
		$marks_array['marks']=$this->Student_details_model->get_student_mark($id);
		$marks_array['minimum_pass_mark']=35;
		$marks_array['total_mark']=total_calculator($marks_array['marks']);
		$marks_array['average']=avg_calculator($marks_array['marks'],$marks_array['total_mark']);

	  	$this->load->view('result_page',$marks_array);
	  }


//---------------------------end of result page controller-----------------------------------------------

}