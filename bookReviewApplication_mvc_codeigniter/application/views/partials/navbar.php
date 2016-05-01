<?php 
  if($this->session->userdata('logged_in') == TRUE)
  {
?>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/reviews">Home</a>
          <a class="navbar-brand" href="/users/<?= $this->session->userdata('user_id'); ?>">Profile</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <a href="/add"><button type="submit" class="btn btn-success">Add Review</button></a>
            <a href="logout"><button type="submit" class="btn btn-success">Log Out</button></a>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php 
  }
  else
  {   
?>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
            <a href="/"><button type="submit" class="btn btn-success">Sign In</button></a>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php 
  }
?>

