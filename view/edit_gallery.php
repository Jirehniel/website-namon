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


<form action="index.php?command=saveRec" method="POST">
             <?php if (isset($galleryItem)) : ?>
    <!-- Form fields with $galleryItem data -->
    <input type="hidden" name="galleryID" value="<?php echo htmlspecialchars($galleryItem->galleryID); ?>">
         <div class="form_group">
                    <label for="name">Name:</label>
                 <input type="text" id="name"name="name" value="<?php echo htmlspecialchars($galleryItem->name); ?>" required> 
             </div>
       <div class="form_group">
                            <label for="description">description:</label>

         <textarea id="description" name="description"><?php echo htmlspecialchars($galleryItem->description); ?></textarea>
             </div>
        <div class="form_group">
                            <label for="image_url">Image URL:</label>
                    <input type="text" name="image_url" value="<?php echo htmlspecialchars($galleryItem->image_url); ?>" required>
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
 

    <!-- Other fields -->
<?php else : ?>
    <p>Error: Gallery item not found.</p>
<?php endif; ?>
             <button type="submit" name="submit"><span></span>Save</button>
 

        </form>
    </div>
        </div>
              </div>
   

</body>
</html>
