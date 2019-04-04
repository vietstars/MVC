<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User view</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="BEN">
<meta name="description" content="MVC sample application">
<link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
<script src="<?=JS?>jquery-3.3.1.slim.min.js"></script>
<script src="<?=JS?>popper.min.js"></script>
<script src="<?=JS?>bootstrap.min.js"></script>
<script src="<?=JS?>user.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
	<div class="container">
		<div class="row mb-4">
			<div class="col-8 offset-sm-2">
				<table class="table table-hover table-bordered mt-3">
				  <thead class="bg-primary text-white">
				    <tr>
				      <th scope="col" width="10%">#</th>
				      <th scope="col" width="60%">Username</th>
				      <th scope="col" width="30%">Create at</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach( $userList as $user ):?>
				    <tr>
				      <th  class="text-center" scope="row"><?=$user->id?></th>
				      <td><?=$user->username?></td>
				      <td class="text-right"><?=date('d/m/Y \a\t H\hi',strtotime($user->created_at))?></td>
				    </tr>
					<?php endforeach;?>
				  </tbody>
				</table>
			</div>
			<div class="col-6 offset-sm-3">
				<div class="card">
				  <div class="card-header bg-primary text-white">
				    Register
				  </div>
				  <div class="card-body">
				  	<form id="register-form" action="" method="post">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Username</label>
					    <input type="text" name="username" class="form-control" placeholder="Enter username">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">Email</label>
					    <input type="email" name="email" class="form-control" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Password</label>
					    <input type="Password" name="password" class="form-control password" placeholder="Enter password">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Confirm password</label>
					    <input type="Password" name="repassword" class="form-control repassword" placeholder="Enter repassword">
					  </div>
					  <div class="form-group">
					    <button id="register-btn" class="btn btn-primary float-right" type="button">Register</button>
					  </div>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
