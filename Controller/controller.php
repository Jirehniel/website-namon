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
    $command = null;

    if (isset($_REQUEST['command'])) {
        $command = $_REQUEST['command'];
    }

    switch ($command) {
        case 0:
            $featuredBeaches = $this->getFeaturedBeaches();                 
            include_once('view/home.php');
            break;
        case 1:
            include_once('view/about.php');
            break;
        case 2:
            $galleryData = $this->getGalleryData();  
            include_once('view/gallery.php');
            break;
        case 3:
            include_once('view/contact_us.php');
            break;
        case 4:
            include_once('view/submitform.php');  
            break;

        case 'deleteRec':
				$id=$_REQUEST['galleryID'];	
				$result=$this->model->deleteRecord($id);
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
            $id=$_REQUEST['galleryID'];
            $name=$_REQUEST['name'];
            $description=$_REQUEST['description'];
            $image_url = $_POST['image_url'];
            $google_maps_link=$_REQUEST['google_maps_link'];
            $facebook_link=$_REQUEST['facebook_link'];
            $featured = isset($_POST['featured']) ? 1: 0;
            $result=$this->model->updateRecord($id,$name,$description,$image_url,$google_maps_link,$facebook_link,$featured);            
			header("Location: index.php?command=2");
            exit();
            break;
        default:
        $featuredBeaches = $this->getFeaturedBeaches(); 
            include_once('view/home.php');
            break;       
    }
}

public function getGalleryData() {
    return $this->model->getGallery();
}
public function getFeaturedBeaches(){
    return $this->featuredBeach->getFeaturedBeaches();
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