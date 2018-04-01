<?php 
        
    include_once 'credentials.php';
    require("entities/coffeeEntity.php");

    class coffeeModel{
	//Nhận các loại cf từ db và trả về mảng
	function GetCoffeeTypes()
        {
            require ("model/credentials.php");

            //Ket noi csdl
            $connect = new mysqli("localhost","root","","coffeedb") or die(mysqli_error());
            $result = mysqli_query($connect,"SELECT Type FROM coffee") or die(mysqli_error());
            $type = array();

            //Lay dl tu csdl
            while ($row = mysqli_fetch_array($result)) 
            {
                array_push($type, $row[0]);
            }
			
            return $type;
        }
	 function GetCoffeeByType($Type)
        {
            require ("model/credentials.php");

            //Ket noi csdl
            $connect = new mysqli("localhost","root","","coffeedb") or die(mysqli_error());
            $query ="SELECT * FROM coffee WHERE Type LIKE '$Type'";
            $result = mysqli_query($connect,$query) or die(mysqli_error());
            $coffeeArray = array();

            //Lay dl tu csdl
            while ($row = mysqli_fetch_array($result)) 
            {
                $ID = $row[0];
		$Name = $row[1];
		$Type = $row[2];
		$Price = $row[3];
		$Roast = $row[4];
		$Country = $row[5];
		$Image = $row[6];
		$Review = $row[7];
                
                //Tao cac doi tuong cf va luu tru trong mang
                $coffee = new coffeeEntity($ID,$Name,$Type,$Price,$Roast,$Country,$Image,$Review);
                array_push($coffeeArray, $coffee);
            }

            return $coffeeArray;
        }
    
        
        function GetCoffeeById($ID)
        {
            require ("model/credentials.php");

            //Ket noi csdl
            $connect = new mysqli("localhost","root","","coffeedb") or die(mysqli_error());
            $query ="SELECT * FROM coffee WHERE ID=$ID";
            $result = mysqli_query($connect,$query) or die(mysqli_error());

            //Lay dl tu csdl
            while ($row = mysqli_fetch_array($result)) 
            {
                $Name = $row[1];
                $Type = $row[2];
                $Price = $row[3];
                $Roast = $row[4];
                $Country = $row[5];
                $Image = $row[6];
                $Review = $row[7];
            }
       
            $coffee = new coffeeEntity($ID,$Name,$Type,$Price,$Roast,$Country,$Image,$Review);

            return $coffee;
        }
    
        
        function InsertCoffee(coffeeEntity $coffee)
            {
                $query = sprintf("INSERT INTO coffee(Name,Type,Price,Roast,Country,Image,Review)
                        VALUES
                        ('%s','%s','%f','%s','%s','%s','%s')",
                        $coffee->Name,$coffee->Type,$coffee->Price,$coffee->Roast,$coffee->Country,"images/".$coffee->Image,$coffee->Review);
                //mysqli_real_escape_string($coffee->Name),
                //mysqli_real_escape_string($coffee->Type),
                //mysqli_real_escape_string($coffee->Price),
                //mysqli_real_escape_string($coffee->Roast),
                //mysqli_real_escape_string($coffee->Country),
                //mysqli_real_escape_string("images/".$coffee->Image),
                //mysqli_real_escape_string($coffee->Review));
                $this->PerformQuery($query);
            }
    
            
        function UpdateCoffee($ID, coffeeEntity $coffee)
        {
            $query = sprintf("UPDATE coffee
                             SET Name ='%s', Type ='%s',Price ='%f', Roast ='%s',
                             Coutry ='%s', Image ='%s', Review ='%s'
                             WHERE ID =$ID",
            ($coffee->Name),
            ($coffee->Type),
            ($coffee->Price),
            ($coffee->Roast),
            ($coffee->Country),
            ("images/".$coffee->Image),
            ($coffee->Review));
            $this->PerformQuery($query);
        }
        
        
        function DeleteCoffee($ID)
        {
            $query =" DELETE FROM coffee WHERE ID=$ID";
            $this->PerformQuery($query);
        }
        
    
        function PerformQuery($query)
        {
            require ("model/credentials.php");
            $con = mysqli_connect("localhost","root","","coffeedb") or die(mysqli_error());

            //kiem tra 
            mysqli_query($con, $query) or die(mysqli_error($con));
        }
    }
?>
