<?php 
  $this->load->view('partials/head');
?>
  <title>Add Book and Review</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
?>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Add a New Review</h3>
        <form action="createReview" method="post">
          <div class="form-group">
            <label for="title">Book Title:</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Book Title">
          </div>
          <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" id="author" placeholder="Author Name">
          </div>
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" rows="6" name="review" id="review">Write your review...</textarea>
          </div>
          <div class="form-group">
            <label for="rating">Rating:</label>
            <select class="form-control" name="rating" id="rating">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
          <input type="submit" class="btn btn-info pull-right" value="Add My Review">
        </form>
      </div>
    </div>
  </div>
</body>
</html>