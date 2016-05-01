<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {

	public function createNewUser($postData)
	{
		$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['name'], $postData['alias'], $postData['email'], $postData['password'] );
		$result = $this->db->query( $query, $values);
		return $result;
	}

	public function createReview($postData)
	{
		$query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array($postData['title'], $postData['author']);
		$this->db->query( $query, $values);

		$book_id = $this->db->insert_id();

		$second_query = "INSERT INTO reviews (review, rating, book_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['review'], $postData['rating'], $book_id, $postData['user_id']);

		$result = $this->db->query( $second_query, $values);
		
		return $result;
	}

	public function addReview($postData)
	{
		$query = "INSERT INTO reviews (review, rating, book_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($postData['review'], $postData['rating'], $postData['book_id'], $postData['user_id']);

		$result = $this->db->query( $query, $values);
		return $result;
	}

	public function authenticateUser($postData)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($postData['email'], $postData['password'] );
		$user = $this->db->query( $query, $values )->row_array();
		return $user;
	}

	public function retreiveOneUser($id)
	{
		$query = "SELECT * FROM users WHERE users.id = ?";
		$value = array($id);
		$user = $this->db->query( $query, $value )->row_array();
		return $user;
	}

	public function retreiveOneBook($id)
	{
		$query = "SELECT * FROM books WHERE id = ?";
		$value = array($id);
		$book = $this->db->query( $query, $value )->row_array();
		return $book;
	}

	public function retrieveAllReviews()
	{
		$query = "SELECT * FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON reviews.user_id = users.id ORDER BY reviews.created_at DESC";
		$reviews = $this->db->query( $query )->result_array();
		return $reviews;
	}

	public function retreiveOneUserReviews($id)
	{
		$query = "SELECT * FROM users JOIN reviews ON reviews.user_id = users.id JOIN books ON books.id = reviews.book_id WHERE users.id = ?";
		$value = array($id);
		$reviews = $this->db->query( $query, $value )->result_array();
		return $reviews;
	}

	public function retrieveOneBookReviews($id)
	{
		$query = "SELECT * FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON reviews.user_id = users.id WHERE books.id = ?";
		$value = array($id);
		$reviews = $this->db->query( $query, $value )->result_array();
		return $reviews;
	}

	public function destroyReview($id)
	{
		$query = "DELETE FROM reviews WHERE id = ?";
		$result = $this->db->query( $query, array($id) );
		return $result;
	}

}

//end of Books model