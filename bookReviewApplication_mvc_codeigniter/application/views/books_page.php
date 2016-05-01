<?php 
  $this->load->view('partials/head');
?>
  <title>Books Page</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
?>
<br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2><?= $book['title']; ?></h2>
        <h5>Author: <?= $book['author']; ?></h5>
        <h5>Book ID: <?= $book['id']; ?></h5>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Reviews:</h3>
<!-- Reviews Loop Begins -->
<?php   foreach ($reviews as $review) 
        {
?>        <div class="col-lg-10 col-md-12 col-sm-12 review">
            <label class="inline">Rating :</label>
<?php       for($i=0; $i<$review['rating']; $i++)
            {
?>            <span class="glyphicon glyphicon-star star" aria-hidden="true"></span>
<?php       }
?>          <br>
            <p><a href="/users/<?= $review['user_id']; ?>"><?= $review['name']; ?></a> says: <?= $review['review']; ?></p>
            <p><i>Posted on <?= $review['created_at']; ?></i></p>
<?php       if($review['user_id'] == $this->session->userdata('user_id'))
            {
?>            <a href="#"><button class="btn btn-danger">Delete this Review</button></a>
<?php       }
?>
          </div>
<!-- Reviews Loop Ends -->
<?php   }
?>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Add a Quick Review:</h3>
        <form action="addReview" method="post">
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
          <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
          <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
          <input type="submit" class="btn btn-info pull-right" value="Add My Review">
        </form>
      </div>
    </div>
  </div>
</body>
</html>