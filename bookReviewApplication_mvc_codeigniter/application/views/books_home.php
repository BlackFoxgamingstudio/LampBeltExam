<?php 
  $this->load->view('partials/head');
?>
  <title>Books Home</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
?>
<?php     
  if($this->session->userdata('name'))
  {
?>          
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Welcome <?= $this->session->userdata('name'); ?></h2>
        </div>
      </div>
    </div>
<?php     }
?>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Recent Book Reviews:</h3>
<!-- Reviews Loop Begins -->
<?php   $count=0;
        foreach ($reviews as $review) 
        {
        if($count==3) break;
?> 
          <div class="col-lg-10 review">
            <a href="/book/<?= $review['book_id']; ?>"><h4><?= $review['title']; ?></h4></a>
            <label class="inline">Rating :</label>
<?php       for($i=0; $i<$review['rating']; $i++)
            {
?>            <span class="glyphicon glyphicon-star star" aria-hidden="true"></span>
<?php       }
?>          <br>
            <p><a href="users/<?= $review['user_id']; ?>"><?= $review['name']; ?></a> says: <?= $review['review']; ?></p>
            <p><i>Posted on <?= $review['created_at']; ?></i></p>
          </div>

<!-- Reviews Loop Ends -->
<?php     $count++;
        }
?>
</div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Other Books with Reviews:</h3>
        <div class="col-lg-11 special-container">
          <ul class="list-group">
<!-- LOOP of All Reviews Begins -->
<?php       for($i=3; $i<count($reviews); $i++)
            { 
              // if($key > 1) continue;
?>            <li class="list-group-item"><a href="/book/<?= $reviews[$i]['book_id']; ?>"><?= $reviews[$i]['title']; ?> (<?= $reviews[$i]['alias']; ?>)</a></li>
<?php       }
?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <hr>
</body>
</html>