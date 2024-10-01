<?php
class FeaturedBeach
{
	public $db=null;
	function __construct()
	{
		try
		{
			$this->db = new mysqli('localhost', 'root', '', 'topbeaches');
		}
		catch(mysqli_sql_exception $e)
		{
			exit('Database connection could not be established.');
		}
	}
		public function getFeaturedBeaches() 
	    {
	        $data = array();
			  $querygetFeaturedBeaches = mysqli_query($this->db,"SELECT * from featured_beaches");

			while($getRow=mysqli_fetch_object($querygetFeaturedBeaches))    		
			{    			
			  $data[] = $getRow; // add the row in to the results (data) array
			}
			return $data;     
	    }

}