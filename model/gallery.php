<?php
class Model
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
		public function getGallery() 
	    {
	        $data = array();
			  $queryGetGallery = mysqli_query($this->db,"SELECT * from gallery");

			while($getRow=mysqli_fetch_object($queryGetGallery))    		
			{    			
			  $data[] = $getRow; // add the row in to the results (data) array
			}
			return $data;     
	    }

		 public function getFeaturedBeaches()
    {
        $data = array();
        $queryGetFeatured = mysqli_query($this->db, "SELECT * FROM gallery WHERE featured = TRUE");

        while ($getRow = mysqli_fetch_object($queryGetFeatured)) 
        {
            $data[] = $getRow;
        }
        return $data;
    }

}