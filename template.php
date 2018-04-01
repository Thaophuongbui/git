<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="styles/stylesheet.css">
</head>
<body>
	<div id="wrapper">
		<div id="banner">
			
		</div>

		
		<nav id="navigation">
			<ul id="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="coffee.php">Coffee</a></li>
                                <li><a href="contacts.php">Contacts</a></li>
				<li><a href="management.php">Management</a></li>
                                
			</ul>
		</nav>

		
		<div id="content-area">
			<?php 
                            echo "$content";
			?>
		</div>

		
		<div id="sidebar">
			<img src="images/10.jpg" class="img_4"/>
		</div>

		
		<footer>
			<p> All rights reserved </p>
		</footer>
	</div>
</body>
</html>
