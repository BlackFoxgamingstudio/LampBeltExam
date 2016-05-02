<html>
<head>
	<title>Destination</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="top-nav">
					<a href="/travels" class="btn btn-link">Home</a>
					<a href="/logout" class="btn btn-link">Logout</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<h1><?= $destination['destination'] ?></h1>
				<h4>Planned By: <?= $destination['users_name'] ?></h4>
				<h4>Description: <?= $destination['description'] ?></h4>
				<h4>Travel Date From: <?= $destination['date_from'] ?></h4>
				<h4>Travel Date To: <?= $destination['date_to'] ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<h3>Other users' joining the trip:</h3>
				<ul id="users-joined">
					<?php
						foreach ($travelers as $traveler) {
							if($this->session->userdata('id') != $traveler['user_id'])
							{
					?>
								<li><?= $traveler['name'] ?></li>
					<?php
							}
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>