<?php 
  $this->load->view('partials/head');
?>
  <title>Home Page</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Welcome!</h2>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Register</h3>
        <form action="createNewUser" method="post">
          <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="e.g. Barack Obama">
          </div>
          <div class="form-group">
            <label for="alias">Alias:</label>
            <input type="text" name="alias" class="form-control" id="alias" placeholder="Create a unique username">
          </div>
          <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="e.g. barack.obama@gmail.com">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="confirm">Confirm Password:</label>
            <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Confirm Password">
          </div>
          <input type="submit" class="btn btn-success pull-right" value="Register">
        </form>
      </div>
      <br>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <h3>Sign-In</h3>
        <form action="signIn" method="post">
          <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="e.g. barack.obama@gmail.com">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <input type="submit" class="btn btn-success pull-right" value="Sign In">
        </form>
      </div>
    </div>
  </div>
  <hr>
</body>
</html>