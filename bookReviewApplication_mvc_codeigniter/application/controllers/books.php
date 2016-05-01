<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome');
	}

	public function add()
	{
		$this->load->view('add_review');
	}

	public function users($id)
	{
		$user = $this->book->retreiveOneUser($id);
		$reviews = $this->book->retreiveOneUserReviews($id);
		$this->load->view('user_profile', array('user' => $user, 'reviews' => $reviews));
	}

	public function book($id)
	{
		$book = $this->book->retreiveOneBook($id);
		$reviews = $this->book->retrieveOneBookReviews($id);
		$this->load->view('books_page', array('book' => $book, 'reviews' => $reviews));
	}

	public function reviews()
	{
		$reviews = $this->book->retrieveAllReviews();
		$this->load->view('books_home', array('reviews' => $reviews));
	}

	public function createNewUser()
	{
		$postData = $this->input->post();
		$result = $this->book->createNewUser($postData);
		if($result)
		{
			$this->session->set_flashdata('success', 'Registation complete! Please sign in!');
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
			redirect('/');
		}
	}

	public function signIn()
	{
		$postData = $this->input->post();
		$user = $this->book->authenticateUser($postData);
		if($user)
		{
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('name', $user['name']);
			$this->session->set_userdata('alias', $user['alias']);
			$this->session->set_userdata('email', $user['email']);
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_flashdata('success', 'Login Successful!');
			redirect('reviews');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Invalid email or username.');
			redirect('/');
		}
	}

	public function createReview()
	{
		$postData = $this->input->post();
		$result = $this->book->createReview($postData);
		if($result)
		{
			$this->session->set_flashdata('success', 'Book review successfully added');
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
			redirect('/');
		}
	}

	public function addReview()
	{
		$postData = $this->input->post();
		$result = $this->book->addReview($postData);
		if($result)
		{
			$this->session->set_flashdata('success', 'Book review successfully added');
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
			redirect('/');
		}		
	}

	public function destroyReview($id)
	{
		$result = $this->book->destroyReview($id);
		if($result)
		{
			$this->session->set_flashdata('success', 'Book review successfully deleted');
			redirect('reviews');
		}
		else
		{
			$this->session->set_flashdata('error', 'Something went wrong! Please try again later.');
			redirect('reviews');
		}		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

//end of Books controller

