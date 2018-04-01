<?php 

	require ("Controller/coffeeController.php");
	$coffeeController = new coffeeController();

	if(isset($_POST['type']))
	{
		//Fill page with coffee of the selected type
		$coffeeTables = $coffeeController->CreateCoffeeTable($_POST['type']);
	}
	else
	{
		//Page is loaded for the first time, no type selected -> Fetch all types
		$coffeeTables = $coffeeController->CreateCoffeeTable('%');
	}
	
	//output page data
	$title='Coffee overview';
	$content=$coffeeController->CreateCoffeeDropdownList() . $coffeeTables;

	include 'template.php'
 ?>
