<?php
class main extends CI_Model
{
	public function register_validate($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_register', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password_register', 'Confirm Password', 'trim|required|min_length[8]|matches[password_register]');
		if($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function register($post)
	{
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($this->input->post('password_register') . ' ' . $salt);
		$query = "INSERT INTO users (name, username, password, salt, created_at, updated_at) 
				  VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($this->input->post('name'), $this->input->post('username'), $encrypted_password, $salt);
		return $this->db->query($query, $values);
	}
	public function login_validate($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_login', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password_login', 'Password', 'trim|required|min_length[8]');
		if($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function login($post)
	{
		$query = "SELECT * FROM users WHERE users.username = ?";
		$values = array($this->input->post('username_login'));
		$response = $this->db->query($query, $values)->row_array();
		if($response)
		{
			return $response;
		}
		else
		{
			return false;
		}
	}

	public function get_user($id)
	{
		$query = "SELECT users.id, users.name, users.username FROM users WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function add_validate($post)
	{
		date_default_timezone_set('America/New_York');
		
		$start = getdate();	
$smon = $start['mon'];	
$sday = $start['mday'];	
$syear = $start['year'];	
$shr = $start['hours'];	
$smin = $start['minutes'];	
$ssec = $start['seconds'];	
$formatted_date =  "$smon-$sday-$syear"."_"."$shr-$smin-$ssec";
		
		$this->form_validation->set_rules('destination', 'Destination', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('date_from', 'Date From', 'trim|required');
		$this->form_validation->set_rules('date_to', 'Date To', 'trim|required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			if ($this->input->post('date_from') < $date)
			{
				$this->session->set_flashdata('date_errors', 'The date from should be set in the future');
				return false;
			}
			if ($this->input->post('date_to') < $date)
			{
				$this->session->set_flashdata('date_errors', 'The date to should be set in the future');
				return false;
			}
			if ($this->input->post('date_to') < $this->input->post('date_from'))
			{
				$this->session->set_flashdata('date_errors', 'The date to should be set after date from');
				return false;	
			}
			return true;
		}
	}

	public function add($post)
	{
		$query = "INSERT INTO trip_schedules (destination, description, date_from, date_to, created_by_id, created_at, updated_at)
				  VALUES (?,?,?,?,?,NOW(),NOW())";
		$values = array($this->input->post('destination'), $this->input->post('description'), $this->input->post('date_from'), $this->input->post('date_to'),$this->input->post('user_id'));
		$response = $this->db->query($query, $values);
		if ($response)
		{
			$query = "INSERT INTO travel_plans (user_id, trip_schedule_id, created_at, updated_at)
					  VALUES (?,?,NOW(),NOW())";
			$values = array($this->input->post('user_id'), $this->db->insert_id());
			return $this->db->query($query, $values);
		}
		else
		{
			return false;
		}
	}
	
	public function get_users_trips($id)
	{
		$query = "SELECT trip_schedules.destination, trip_schedules.date_from, trip_schedules.date_to, trip_schedules.description, trip_schedules.id AS trip_id FROM travel_plans
				  LEFT JOIN trip_schedules
				  ON travel_plans.trip_schedule_id = trip_schedules.id
				  WHERE travel_plans.user_id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	public function get_all_travel_plans()
	{
		return $this->db->query("SELECT users.name AS users_name, users.id AS users_id, trip_schedules.created_by_id, trip_schedules.id AS trip_schedule_id, trip_schedules.destination, trip_schedules.date_from, trip_schedules.date_to FROM travel_plans
				  LEFT JOIN trip_schedules
				  ON travel_plans.trip_schedule_id = trip_schedules.id
				  LEFT JOIN users
				  ON users.id = travel_plans.user_id
				  ORDER BY travel_plans.created_at DESC")->result_array();

	}

	public function add_user_to_trip($tripid, $userid)
	{
		$query = "INSERT INTO travel_plans (user_id, trip_schedule_id, created_at, updated_at)
				  VALUES (?,?, NOW(),NOW())";
		$values = array($userid, $tripid);
		return $this->db->query($query, $values);
	}
	
	public function get_destination($id)
	{
		$query = "SELECT users.name AS users_name, trip_schedules.destination, trip_schedules.description, trip_schedules.date_from, trip_schedules.date_to FROM trip_schedules
				  LEFT JOIN travel_plans 
				  ON trip_schedules.id = travel_plans.trip_schedule_id
				  LEFT JOIN users
				  ON users.id = travel_plans.user_id
				  WHERE trip_schedules.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_users_on_trip($id)
	{
		$query = "SELECT users.name, users.id AS user_id FROM travel_plans
				  LEFT JOIN users
				  ON users.id = travel_plans.user_id
				  WHERE travel_plans.trip_schedule_id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
}
?>