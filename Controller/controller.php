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

        require_once('model/featured_beach.php');
        $this->featuredBeach = new FeaturedBeach();
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
        default:
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