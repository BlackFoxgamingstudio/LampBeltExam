<?php
	if($this->session->flashdata('success'))
	{
?>	<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Congratulations!</strong> <?= $this->session->flashdata('success'); ?>
		</div>
<?php
	}
?>
<?php 
	if($this->session->flashdata('error'))
	{
?>	<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Oops!</strong> <?= $this->session->flashdata('error'); ?>
		</div>
<?php
	}
?>