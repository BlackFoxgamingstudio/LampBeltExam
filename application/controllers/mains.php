<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		if($this->session->userdata('id'))
		{
			redirect('/main');
		}
		else 
		{
			$this->load->view('index');
		}
	}

	public function register_validation()
	{

		if($this->main->register_validate($this->input->post()))
		{
			if($this->main->register($this->input->post()))
			{
				$this->session->set_flashdata('reg_errors', 'Registration Successful!');
				redirect('/main');
			}
			else 
			{
				$this->session->set_flashdata('reg_errors', 'Registration did not work, please try again.');
				redirect('/main');
			}
		}
		else 
		{
			$errors = validation_errors();
			$this->session->set_flashdata('reg_errors', $errors);
			redirect('/main');
		}
	}

	public function login_validation()
	{
		if($this->main->login_validate($this->input->post()))
		{
			$response = $this->main->login($this->input->post());
			if($response)
			{
				$password_check = md5($this->input->post('password_login') . ' ' . $response['salt']);
				if($password_check == $response['password'])
				{
					$this->session->set_userdata('id', $response['id']);
					redirect('/travel_destination');
				}
				else
				{
					$this->session->set_flashdata('log_errors', 'Password incorrect please try again.');
					redirect('/main');
				}
			}
			else
			{
				$this->session->set_flashdata('log_errors', 'Username not found please try again.');
				redirect('/main');
			}
		}
		else 
		{
			$errors = validation_errors();
			$this->session->set_flashdata('log_errors', $errors);
			redirect('/main');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', 'Logged off. See you later!');
		redirect('/main');
	}

	public function dashboard()
	{
		if($id = $this->session->userdata('id'))
		{
			$user = $this->main->get_user($id);
			$trip_schedules = $this->main->get_users_trips($id);
			$travel_plans = $this->main->get_all_travel_plans();
			$dashboard_data = array('user' => $user, 'trip_schedule' => $trip_schedules, 'travel_plan' => $travel_plans);
			// var_dump($dashboard_data);
			$this->load->view('dashboard', $dashboard_data);
		}
		else 
		{
			redirect('/main');
		}
		
	}

	public function add()
	{
		if($this->session->userdata('id'))
		{
			$this->load->view('add');
		}
		else 
		{
			redirect('/main');
		}
	}

	public function add_validation()
	{
		if($this->main->add_validate($this->input->post()))
		{
			if($this->main->add($this->input->post()))
			{
				$this->session->set_flashdata('msg', 'Trip added!');
				redirect('/travels');
			}
			else 
			{
				$this->session->set_flashdata('msg', 'Trip could not be added.');
				redirect('/travels');
			}
		}
		else 
		{
			$errors = validation_errors();
			$this->session->set_flashdata('add_errors', $errors);
			redirect('/travels/add');
		}
	}

	public function trip_join($tripid, $userid)
	{
		if($this->main->add_user_to_trip($tripid, $userid))
		{
			$this->session->set_flashdata('msg', 'Trip added!');
			redirect('/travels');
		}
		else 
		{
			$this->session->set_flashdata('msg', 'Trip could not be added.');
			redirect('/travels');
		}
	}

	public function travel_destination($tripid)
	{
		if($id = $this->session->userdata('id'))
		{
			$destination = $this->main->get_destination($tripid);
			$travelers = $this->main->get_users_on_trip($tripid);
			$travel_data = array('destination' => $destination, 'travelers' => $travelers);
			$this->load->view('destination', $travel_data);
		}
		else 
		{
			redirect('/main');
		}
	}
}

//end of main controller