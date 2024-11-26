<?php
class Controller
{
    public $model = null;
    public $message = null;
    public $featuredBeach = null;

    function __construct()
    {
        require_once('model/gallery.php');
        $this->model = new Model();

        require_once('model/messages.php');
        $this->message = new MessageModel();

        require_once('model/gallery.php');
        $this->featuredBeach = new Model();
    }

    public function navigatePages() 
    {
        $command = isset($_REQUEST['command']) ? $_REQUEST['command'] : null;
        switch ($command) {
            case 0:
                $featuredBeaches = $this->getFeaturedBeaches();                 
                include_once('view/home.php');
                break;
            case 1:
                include_once('view/about.php');
                break;
            case 2:
                // Default: Show all gallery items
                $galleryItems = $this->model->getGallery();
                include_once('view/gallery.php');
                break;
            case 3:
                include_once('view/contact_us.php');
                break;
            case 4:
                include_once('view/submitform.php');  
                break;
            case 'addRec':
                include_once('view/add_gallery.php');
                break;
            case 'deleteRec':
                $id = $_REQUEST['galleryID'];    
                $result = $this->model->deleteRecord($id);
                echo "<script> alert ('".$result."')
                    window.location.href='index.php?command=2'
                    </script>";                        
                break;
            case 'editRec':
                $id = $_REQUEST['galleryID'];
                $galleryItem = $this->model->getGalleryItemByID($id);
                include_once('view/edit_gallery.php');
                break;
          
case 'saveRec':
    $id = $_REQUEST['galleryID'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $image_url = $_POST['existing_image_url'] ?? '';

    if (!empty($_FILES['image_upload']['tmp_name']) && $_FILES['image_upload']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image_upload']['tmp_name'];
        $fileExtension = strtolower(pathinfo($_FILES['image_upload']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = './uploads/';
            $newFileName = uniqid() . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $image_url = $destPath;
            }
        }
    }

    $google_maps_link = $_REQUEST['google_maps_link'];
    $facebook_link = $_REQUEST['facebook_link'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $result = $this->model->updateRecord($id, $name, $description, $image_url, $google_maps_link, $facebook_link, $featured);
    header("Location: index.php?command=2");
    exit();
    break;
                break;
            case 'addNewRec':
                $name = $_POST['name'];
                $description = $_POST['description'];
                if (isset($_FILES['image_upload']) && $_FILES['image_upload']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['image_upload']['tmp_name'];
                    $fileName = $_FILES['image_upload']['name'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                
                    // Allowed file extensions
                    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array($fileExtension, $allowedfileExtensions)) {
                        // Set upload directory and unique file name
                        $uploadFileDir = './uploads/';
                        $newFileName = uniqid() . '.' . $fileExtension;
                        $dest_path = $uploadFileDir . $newFileName;
                
                        // Move the uploaded file
                        if (move_uploaded_file($fileTmpPath, $dest_path)) {
                            $image_url = $dest_path; // Save the file path to the database
                        } else {
                            echo "Error moving the uploaded file.";
                            $image_url = $_POST['existing_image_url'] ?? ''; // Fallback
                        }
                    } else {
                        echo "Invalid file type. Allowed types: " . implode(", ", $allowedfileExtensions);
                        $image_url = $_POST['existing_image_url'] ?? ''; // Fallback
                    }
                } else {
                    $image_url = $_POST['existing_image_url'] ?? ''; // Fallback if no file uploaded
                }
                
            
                $google_maps_link = $_POST['google_maps_link'];
                $facebook_link = $_POST['facebook_link'];
                $featured = isset($_POST['featured']) ? 1 : 0;

                $result = $this->model->addRecord($name, $description, $image_url, $google_maps_link, $facebook_link, $featured);
                if ($result) {
                    header("Location: index.php?command=2");
                    exit();
                } else {
                    echo "There was an error adding the new gallery item.";
                }
                break;
            case 'search':
                // Handle search functionality
                $query = isset($_REQUEST['search_query']) ? trim($_REQUEST['search_query']) : '';
                if (!empty($query)) {
                    $galleryItems = $this->model->searchGallery($query);
                } else {
                    $galleryItems = $this->model->getGallery();
                }
                include_once('view/gallery.php');
                break;
            default:
                // Default case: Show featured beaches on the home page
                $featuredBeaches = $this->getFeaturedBeaches(); 
                include_once('view/home.php');
                break;
        }
    }

 
    public function getFeaturedBeaches() {
        return $this->featuredBeach->getFeaturedBeachess();
    }

    public function addMessage() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $subject = htmlspecialchars(trim($_POST['subject']));
            $message = htmlspecialchars(trim($_POST['message']));

            if ($this->message->addMessage($name, $email, $subject, $message)) {
                $_SESSION['status'] = 'success';
            } else {
                $_SESSION['status'] = 'error';
            }
            header("Location: index.php?command=3"); 
            exit();
        }
    }
}
