<script>
    //Display a confirmation box when trying to delete an object
    function showConfirm(ID)
    {
        //build the confirmation box
        var c = confirm("Are you sure you wish to delete this item?");
        //if true,delete item and refresh
        if(c)
            window.location = "coffeeOverview.php?delete=" + ID;
        
    }
</script>

<?php 
    require("model/coffeeModel.php");

    //Contains non-database related function for the coffee page
    class coffeeController{
        
        function CreateOverviewTable()
        {
            $result ="
                <table class ='OverviewTable'>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>ID</b></td>
                        <td><b>Name</b></td>
                        <td><b>Type</b></td>
                        <td><b>Price</b></td>
                        <td><b>Roast</b></td>
                        <td><b>Country</b></td>
                    </tr>";
                
            $coffeeArray = $this->GetCoffeeByType('%');
            
            foreach ($coffeeArray as $key => $value) {
                $result = $result .
                       "<tr>
                            <td><a href='coffeeadd.php?update=$value->ID'>Update</a></td>
                            <td><a href='#' onclick = 'showConfirm($value->ID)'>Delete</a></td>
                            <td>$value->ID</td>
                            <td>$value->Name</td>
                            <td>$value->Type</td>
                            <td>$value->Price</td>
                            <td>$value->Roast</td>
                            <td>$value->Country</td>
                        </tr>";
            }
            
            $result = $result ."</table>";
            return $result;
        }
        
        
        function CreateCoffeeDropdownList()
	{
            $coffeeModel = new coffeeModel();
            $result = "<form action = '' method = 'post' width='100px'>
                        Please select a type:
			<select name = 'type'>
			<option value = '%'>All</option>"
			.$this->CreateOptionValues($coffeeModel->GetCoffeeTypes()) .
			"</select>
			<input type = 'submit' value ='Search'/>
			</form>";

            return $result;
	}

	
        function CreateOptionValues(array $valueArray)
        {
            $result="";

            foreach ($valueArray as $value) 
            {
                $result = $result . "<option value='$value'>$value</option>";
            }

            return $result;
        }

	
        function CreateCoffeeTable($type)
        {
            $coffeeModel = new coffeeModel();
            $coffeeArray = $coffeeModel->GetCoffeeByType($type);
            $result="";

            //Generate a coffeetable for each coffeeEntity in array
            foreach ($coffeeArray as $coffee)
            {
		$result = $result .
		"<table class = 'coffeeTables'>
                    <tr>
			<th rowspan='6'><img runat ='server' src='$coffee->Image'/></th>
			<th width='px'>Name:</th>  
			<td width='500px'>$coffee->Name</td>
                    </tr>

                    <tr>
			<th width='75px'>Type:</th>
			<td width='500px'>$coffee->Type</td>
                    </tr>

                    <tr>
                        <th width='75px'>Price:</th>
			<td width='500px'>$coffee->Price</td>
                    </tr>

                    <tr>
                        <th width='75px'>Roast:</th>
			<td width='500px'>$coffee->Roast</td>
                    </tr>

                    <tr>
			<th width='75px'>Country:</th>
			<td width='500px'>$coffee->Country</td>
                    </tr>

                    <tr>
                        <th width='75px'>Review:</th>
			<td colspan='2' width='500px'>$coffee->Review</td>
                    </tr>
                </table>
                <br>";
            }
            return $result;

        }
        //Returns list of files in a folder.
        
        function GetImage()
       {
            //Select folder to scan
            $handle = opendir("images/");
            
            //Read all files and store names in array
            while ($images = readdir($handle))
            {
                $Image[]= $images;
            }
            
            closedir($handle);
            
            //Exclude all files name where filename length < 3
            $imageArray = array();
            foreach ($imageArray as $Image) 
            {
                if(strlen($Image) > 2)
                {
                    array_push($imageArray, $Image);
                }
            } 
                
        
            
                
           
            //Create <select><option> Values and return results
            $result = $this->CreateOptionValues($Image);
            return $result;
        }
        //<editor-fold desc="Set Methods">
        
        function InsertCoffee()
        {
            $Name = $_POST["txtName"];
            $Type = $_POST["ddlType"];
            $Price = $_POST["txtPrice"];
            $Roast = $_POST["txtRoast"];
            $Country = $_POST["txtCountry"];
            $Image = $_POST["ddlImage"];
            $Review = $_POST["txtReview"];
            
            $coffee = new coffeeEntity(-1, $Name, $Type, $Price, $Roast, $Country, $Image, $Review);
            $coffeeModel = new coffeeModel();
            $coffeeModel -> InsertCoffee($coffee);
        }
        
        function UpdateCoffee()
        {
            $Name = $_POST["txtName"];
            $Type = $_POST["ddlType"];
            $Price = $_POST["txtPrice"];
            $Roast = $_POST["txtRoast"];
            $Country = $_POST["txtCountry"];
            $Image = $_POST["ddlImage"];
            $Review = $_POST["txtReview"];
            
            $coffee = new coffeeEntity($ID, $Name, $Type, $Price, $Roast, $Country, $Image, $Review);
            $coffeeModel = new coffeeModel();
            $coffeeModel->UpdateCoffee($ID, $coffee);
        }
        
        
        function DeleteCoffee($ID)
        {
            $coffeeModel= new coffeeModel();
            $coffeeModel->Deletecoffee($ID);
        }
        //<editor-fold desc="Get Methods">
        
        
        function GetCoffeeById($ID)
        {
            $coffeeModel = new coffeeModel();
            return $coffeeModel->GetCoffeeById($ID);
        }
        
        
        function GetCoffeeByType ($type)
        {
            $coffeeModel = new coffeeModel();
            return $coffeeModel->GetCoffeeByType($type);
            
        }
        
        
        function GetCoffeeTypes()
        {
            $coffeeModel = new coffeeModel();
            return $coffeeModel->GetCoffeeTypes();
        }
        //<editor-fold>
    }
 ?>