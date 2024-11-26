<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

 </head>
<body>
          <div class="content-contactus">
             <div class = "contact_container">
                  <div class="contact_form">
                <h3>EDIT Gallery ITEM  </h3>
                <form action="index.php?command=saveRec" method="POST" enctype="multipart/form-data">
    <?php if (isset($galleryItem)) : ?>
        <input type="hidden" name="galleryID" value="<?php echo htmlspecialchars($galleryItem->galleryID); ?>">

        <div class="form_group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($galleryItem->name); ?>" required> 
        </div>

        <div class="form_group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($galleryItem->description); ?></textarea>
        </div>

        <!-- Display Current Image -->
    <?php if (!empty($galleryItem->image_url)) : ?>
                            <div class="form_group">
                                <label>Current Image:</label>
                                <img src="<?php echo htmlspecialchars($galleryItem->image_url); ?>" alt="Current Image" style="max-width: 10%; height: 10%;">
                            </div>
                        <?php endif; ?>
        

        <!-- File input for new image upload -->
                   <div class="form_group">
                            <label for="image_upload">Upload New Image:</label>
                            <input type="file" id="image_upload" name="image_upload" accept="image/*">
                            <input type="hidden" name="existing_image_url" value="<?php echo htmlspecialchars($galleryItem->image_url); ?>">
                        </div>


        <div class="form_group">
            <label for="google_maps_link">Google Maps Link:</label> 
            <input type="text" name="google_maps_link" value="<?php echo htmlspecialchars($galleryItem->google_maps_link); ?>">
        </div>

        <div class="form_group">
            <label for="facebook_link">Facebook Link:</label>
            <input type="text" name="facebook_link" value="<?php echo htmlspecialchars($galleryItem->facebook_link); ?>">
        </div>

        <label for="featured">Featured:</label> 
        <input type="checkbox" name="featured" value="1" <?php if ($galleryItem->featured) echo 'checked'; ?>>

        <div class="checkbox-description">
            <p>This item will be highlighted as featured on the gallery page.</p>
        </div>

        <button type="submit" name="submit"><span></span>Save</button>
    <?php else : ?>
        <p>Error: Gallery item not found.</p>
    <?php endif; ?>
</form>

 
                  </div>
             </div>
       </div>
   

</body>
</html>
