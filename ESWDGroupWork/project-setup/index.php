<!DOCTYPE html>

<html lang="en">
<head>
	<title>First Time Setup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Responsive Website Template">
	<meta name="author" content="The Develovers">
	<!-- CORE CSS -->
	<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/elegant-icons.css" rel="stylesheet" type="text/css">
	<!-- THEME CSS -->
	<link href="../assets/css/main.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/my-custom-styles.css" rel="stylesheet" type="text/css">

	<!-- GOOGLE FONTS -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:700,400,400italic,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,300,300italic' rel='stylesheet' type='text/css'>
	<!-- FAVICONS -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/bravana144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/bravana114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/bravana72.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/bravana57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.ico">
    
</head>

<body>

    <div class="page-content">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="center-block col-md-4">
                        <?php

                            $servername = "localhost";
                            $username = "root";
                            $password = "";

                            $conn = new mysqli($servername, $username, $password);
                            $sql = "SHOW DATABASES LIKE 'thebasedsystem'";
                                if ($conn->query($sql)->num_rows != 1) {

                         ?>
							<h2 class="heading">First Admin</h2>
							<div class="margin-bottom-30">&nbsp;</div>
							
							<form class="form-auth-small" action="home.php" method="post">
								
								<div class="form-group">
									<label class="control-label sr-only">Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
								</div>
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input type="username" class="form-control" name="email" id="signup-email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="country" name="username" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="signup-password" placeholder="Password" required>
								</div>
								<!-- <div class="form-group">
									<label class="control-label sr-only">Country</label>
									<input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
								</div> -->
						
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
									
								</div>
							</form>
							<?php } else{
                                echo "Database is exist Now ! Check it has Proper Tables !";
                                } ?>
						</div>

						<div class="col-md-4">
						</div>
					</div>
				</div>
			</div>
		</div>

    <!--========= Scripts ===========-->

</body>

</html>
