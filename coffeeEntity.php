<?php 
	
	class coffeeEntity
	{
		public $ID;
		public $Name;
		public $Type;
		public $Price;
		public $Roast;
		public $Country;
		public $Image;
		public $Review;

                public function __construct($ID,$Name,$Type,$Price,$Roast,$Country,$Image,$Review) 
                {
                    $this->ID = $ID;
                    $this->Name = $Name;
                    $this->Type = $Type;
                    $this->Price = $Price;
                    $this->Roast = $Roast;
                    $this->Country = $Country;
                    $this->Image = $Image;
                    $this->Review = $Review;
                }
	}
 ?>