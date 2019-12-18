<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_details_model extends CI_Model {

	public function __construct()
	 {
	    $this->load->database();
	 }

	function student_details_insert($data)
	{
		$this->db->insert('student_details',$data);
	}

	function select_student_details()
	{
          $sql="SELECT id,student_name FROM student_details";
          $result = $this->db->query($sql);
		  return $result->result_array();
	}

	function insert_student_mark($student_marks)
	{
		$this->db->insert('student_mark',$student_marks);
	}

	function get_student_name($id)
	{
		$get_data_for_result_page="
			   SELECT student_mark.student_id, student_details.id,student_details.student_name
			   FROM student_details
			   LEFT OUTER JOIN student_mark
			   ON student_mark.student_id = student_details.id where student_details.id = $id" ;
		$student_name = $this->db->query($get_data_for_result_page);
		return $student_name->result_array();
	}
	function get_student_mark($id)
	{
		$sql = "SELECT tamil,english,maths,science,social_science FROM student_mark where student_id=$id";
		$marks = $this->db->query($sql);
		return $marks->result_array();
	}

}

 ?> 