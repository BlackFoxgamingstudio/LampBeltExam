<?php 
  $this->load->view('partials/head');
?>
  <title>User Reviews</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
?>
<br>
 <div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<table class="table table" style="text-align: left">
					<tbody>
						<tr>
							<td>Name:</td>
							<td><?= $user['name']; ?></td>
						</tr>
						<tr>
							<td>Registered Alias:</td>
							<td><?= $user['alias']; ?></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><?= $user['email']; ?></td>
						</tr>
						<tr>
							<td>Total Reviews:</td>
							<td><?= count($reviews);?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3>Posted Reviews on the Following Books:</h3>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<ul class="list-group">
<!-- LOOP BEGINS -->
<?php 		foreach ($reviews as $review) 
					{
?>					<li class="list-group-item"><a href="/book/<?= $review['book_id']; ?>"><?= $review['title']; ?></a></li>

<?php 		}
?>
<!-- LOOP ENDS -->
				</ul>
			</div>
		</div>
	</div>
</body>
</html>