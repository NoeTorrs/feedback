<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model {

	function __construct()
	{
	    parent::__construct();

	}

	function Reviews()
	{
		$query = $this->db->query("call view_result()");
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}

	 function Comments()
	{
		$query = $this->db->query("call view_comments");
		return $query->result();
	}

	 function Upload($data)
	{
		$this->db->insert('result',$data);
	}

}

?>