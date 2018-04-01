<?php
require './Controller/coffeeController.php';
$coffeeController = new coffeeController();

$title = "Add a new Coffee";

if(isset($_GET["update"]))
{
    $coffee = $coffeeController->GetCoffeeById($_GET["update"]);
    
    $content="<form action='' method='post'>
                <fieldset>
                    <legend>Add a new Coffee</legend>
                    <label for='Name'>Name:</label>
                    <input type='text' class='inputField' name='txtName' value='$coffee->Name'/>
                    </br> 

                    <label for ='Type'>Type: </label>
                    <select class='inputField' name='ddlType'>
                    <option value='%'>All</option>
                    ".$coffeeController->CreateOptionValues($coffeeController->GetCoffeeTypes())."
                    </select>
                    <br/>

                    <label for='Price'>Price:</label>
                    <input type='text' class='inputField' name='txtPrice' value='$coffee->Price'/>
                    </br> 

                    <label for='Roast'>Roast:</label>
                    <input type='text' class='inputField' name='txtRoast' value='$coffee->Roast'/>
                    </br> 

                    <label for='Country'>Country:</label>
                    <input type='text' class='inputField' name='txtCountry' value='$coffee->Country'/>
                    <br/> 

                    <label for='Image'>Image:</label>
                    <select class='inputField' name='ddlImage'>"
                    .$coffeeController->GetImage().
                    "</select>
                    </br>

                    <label for='Review'>Review:</label>
                    <textarea cols='70' rows='12' name='txtReview' value='$coffee->Review'></textarea>
                    </br>

                    <input type='submit' value='Submit'>


                </fieldset>
            </form>";
    
}else{
    
    $content="<form action='' method='post'>
                <fieldset>
                    <legend>Add a new Coffee</legend>
                    <label for='Name'>Name:</label>
                    <input type='text' class='inputField' name='txtName' />
                    </br> 

                    <label for ='Type'>Type: </label>
                    <select class='inputField' name='ddlType'>
                    <option value='%'>All</option>
                    ".$coffeeController->CreateOptionValues($coffeeController->GetCoffeeTypes()).
                    "
                    </select>
                    <br/>

                    <label for='Price'>Price:</label>
                    <input type='text' class='inputField' name='txtPrice' />
                    </br> 

                    <label for='Roast'>Roast:</label>
                    <input type='text' class='inputField' name='txtRoast' />
                    </br> 

                    <label for='Country'>Country:</label>
                    <input type='text' class='inputField' name='txtCountry' />
                    <br/> 

                    <label for='Image'>Image:</label>
                    <select class='inputField' name='ddlImage'>"
                    .$coffeeController->GetImage().
                    "</select>
                    </br>

                    <label for='Review'>Review:</label>
                    <textarea cols='70' rows='12' name='txtReview'></textarea>
                    </br>

                    <input type='submit' value='Submit'>


                </fieldset>
            </form>";

    
}

if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]))
    {
    $coffeeController->InsertCoffee($_GET["update"]);
    }
}else{
    if(isset($_POST["txtName"]))
    {
        $Name = $_POST["txtName"];
        $Type = $_POST["ddlType"];
        $Price = $_POST["txtPrice"];
        $Roast = $_POST["txtRoast"];
        $Country = $_POST["txtCountry"];
        $Image = $_POST["ddlImage"];
        $Review = $_POST["txtReview"];
        $coffee = new coffeeEntity(0,$Name,$Type,$Price,$Roast,$Country,$Image,$Review);
        
        $coffeeController->InsertCoffee();
    }
}

include 'template.php';

?>



