<?php
class Model
{
    public $db = null;

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

    // Fetch all gallery items
    public function getGallery() 
    {
        $data = array();
        $queryGetGallery = mysqli_query($this->db, "SELECT * FROM gallery");

        while ($getRow = mysqli_fetch_object($queryGetGallery)) {
            $data[] = $getRow; // Add the row to the results array
        }

        return $data;     
    }

    // Fetch only featured beaches
    public function getFeaturedBeaches()
    {
        $data = array();
        $queryGetFeatured = mysqli_query($this->db, "SELECT * FROM gallery WHERE featured = TRUE");

        while ($getRow = mysqli_fetch_object($queryGetFeatured)) {
            $data[] = $getRow;
        }

        return $data;
    }

    // Delete a gallery item by its ID
    public function deleteRecord($id)
    {
        $deleteQuery = "DELETE FROM gallery WHERE galleryID = ?";
        $stmt = $this->db->prepare($deleteQuery);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return "Record deleted successfully";
        } else {
            return mysqli_error($this->db);
        }
    }

    // Fetch a gallery item by its ID
    public function getGalleryItemByID($id)
    {
        $query = "SELECT * FROM gallery WHERE galleryID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
    }

    // Update an existing gallery item
    public function updateRecord($id, $name, $description, $image_url, $google_maps_link, $facebook_link, $featured)
    {
        $updateQuery = "UPDATE gallery SET name = ?, description = ?, image_url = ?, google_maps_link = ?, facebook_link = ?, featured = ? WHERE galleryID = ?";
        $stmt = $this->db->prepare($updateQuery);
        $stmt->bind_param('sssssii', $name, $description, $image_url, $google_maps_link, $facebook_link, $featured, $id);

        return $stmt->execute();
    }

    // Add a new gallery item
    public function addRecord($name, $description, $image_url, $google_maps_link, $facebook_link, $featured)
    {
        $stmt = $this->db->prepare("INSERT INTO gallery (name, description, image_url, google_maps_link, facebook_link, featured) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssi', $name, $description, $image_url, $google_maps_link, $facebook_link, $featured);

        return $stmt->execute();
    }

    // Search for gallery items based on the search query (name partial matching)
    public function searchGallery($query)
    {
        $data = array();
        $searchQuery = "SELECT * FROM gallery WHERE name LIKE ?";
        $stmt = $this->db->prepare($searchQuery);
        $searchTerm = "%" . $query . "%"; // Adds wildcards for partial matching
        $stmt->bind_param('s', $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }

        return $data;
    }
}
