<html>
<head>
	<title>Travel Dashboard</title>
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
			<div class="col-sm-2 col-sm-offset-10">
				<div id="top-nav">
					<a href="/logout" class="btn btn-link">Logout</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h1>Welcome, <?= $user['name'] ?>!</h1>
				<h4 class="errors"><?= $this->session->flashdata('msg') ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h4>Your Trip Schedule</h4>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Destination</th>
							<th>Travel Start Date</th>
							<th>Travel End Date</th>
							<th>Plan</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($trip_schedule as $trip_info) {
					?>
						<tr>
							<td><a href="/travels/destination/<?= $trip_info['trip_id'] ?>" class="btn btn-link"><?= $trip_info['destination'] ?></a></td>
							<td><?= $trip_info['date_from'] ?></td>
							<td><?= $trip_info['date_to'] ?></td>
							<td><?= $trip_info['description'] ?></td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h4>Other User's Travel Plans</h4>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Destination</th>
							<th>Travel Start Date</th>
							<th>Travel End Date</th>
							<th>Do you want to join?</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($travel_plan as $plan) {
							if ($this->session->userdata('id') != $plan['users_id'] && $plan['created_by_id'] == $plan['users_id'])
							{
					?>
							<tr>
								<td><?= $plan['users_name'] ?></td>
								<td><a href="/travels/destination/<?= $plan['trip_schedule_id'] ?>" class="btn btn-link"><?= $plan['destination'] ?></a></td>
								<td><?= $plan['date_from'] ?></td>
								<td><?= $plan['date_to'] ?></td>
								<td><a href="/trip/join/<?= $plan['trip_schedule_id'] ?>/<?= $this->session->userdata('id') ?>" class="btn btn-link">Join</a></td>
							</tr>
					<?php
							}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-10">
				<a href="/travels/add" class="btn btn-link">Add Travel Plan</a>
			</div>
		</div>
	</div>
</body>
</html>