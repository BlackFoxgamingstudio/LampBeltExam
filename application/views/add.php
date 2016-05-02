<html>
<head>
	<title>Add Plan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="/assets/js/jquery-ui-functions.js"></script>
		<script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/jquery-ui.css">
		<link rel="stylesheet" href="/assets/css/jquery-ui.structure.css">
		<link rel="stylesheet" href="/assets/css/jquery-ui.theme.css">
		<link rel="stylesheet" href="/assets/css/main.css">
		<script type="text/javascript">
		$('document').ready(function(){
			$( "#date_from" ).datepicker({dateFormat : "yy-mm-dd"});
			$( "#date_to" ).datepicker({dateFormat : "yy-mm-dd"});
		});
		</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
				<div id="top-nav">
					<a href="/travels" class="btn btn-link">Home</a>
					<a href="/logout" class="btn btn-link">Logout</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div id="travel_add_container">
					<h3>Add a Trip</h3>
					<h4 class="errors"><?= $this->session->flashdata('add_errors'); ?></h4>
					<h4 class="errors"><?= $this->session->flashdata('date_errors'); ?></h4>
					<form action="/add/validation" method="post">
						<div class="form-group">
							<label for="destination">Destination</label>
							<input name="destination" class="form-control" placeholder="Travel Destination" value="<?= set_value('destintion') ?>">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input name="description" class="form-control" placeholder="Travel Decription" value="<?= set_value('description') ?>">
						</div>
						<div class="form-group">
							<label for="date_from">Travel Date From</label>
							<input name="date_from" id="date_from" class="form-control" placeholder="Date From" value="<?= set_value('date_from') ?>">
						</div>
						<div class="form-group">
							<label for="date_to">Travel Date To</label>
							<input name="date_to" id="date_to" class="form-control" placeholder="Date To" value="<?= set_value('date_to') ?>">
						</div>
						<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
						<button type="submit" class="btn btn-default">Add</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>