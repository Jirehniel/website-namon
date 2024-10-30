<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Top 10 Beaches in the Philippines</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
     <div class="content">
            <h1>Explore More Best Beaches around the Philippines</h1>
            <p>Explore the breathtaking beaches of the Philippines through our curated gallery. Each image captures the beauty and essence of the country's most stunning coastlines. Scroll down to immerse yourself in the natural wonders that make the Philippines a must-visit destination.</p>
    </div>
<div class="gallery_section" >
            <h2>BEST BEACHES IN PHILIPPINES</h2>
       <ul class="gallery_list">
   <?php     
$galleryItems = $this->model->getGallery();
foreach ($galleryItems as $item) {
?>
    <li class="gallery_item">
      
        <img src="<?php echo $item->image_url; ?>" alt="<?php echo $item->name; ?>">
        <div class="gallery_title"><?php echo $item->name; ?></div>
        <p><?php echo $item->description; ?></p>
        
        <!-- View Links -->
        <?php if (!empty($item->google_maps_link)) { ?>
            <a href="<?php echo $item->google_maps_link; ?>" target="_blank">View on Google Maps</a>
        <?php } ?>
        <?php if (!empty($item->facebook_link)) { ?>
            <a href="<?php echo $item->facebook_link; ?>" target="_blank">Visit on Facebook</a>
        <?php } ?>

        <!-- Edit and Delete Buttons -->
 <div class="action-links">
    <a href="index.php?command=editRec&galleryID=<?php echo $item->galleryID; ?>">Edit</a>
    <a href="index.php?command=deleteRec&galleryID=<?php echo $item->galleryID; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
</div>
 

    </li>
<?php
}
?>
        ?>
         </ul>
           </div>
</body>
</html>
