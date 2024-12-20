<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add New Gallery Item</title>
</head>
<body>
    <div class="content-contactus">
        <div class="contact_container">
            <div class="contact_form">
                <h3>ADD New Gallery ITEM</h3>

                <form action="index.php?command=addNewRec" method="POST" enctype="multipart/form-data">
                    <!-- Form fields for new gallery item -->
                    <div class="form_group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form_group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>

                    <!-- File input for image upload -->
                    <div class="form_group">
                        <label for="image_upload">Upload Image:</label>
                        <input type="file" id="image_upload" name="image_upload" accept="image/*" required>
                    </div>

                    <div class="form_group">
                        <label for="google_maps_link">Google Maps Link:</label>
                        <input type="text" name="google_maps_link">
                    </div>

                    <div class="form_group">
                        <label for="facebook_link">Facebook Link:</label>
                        <input type="text" name="facebook_link">
                    </div>

                    <label for="featured">Featured:</label>
                    <input type="checkbox" name="featured" value="1">

                    <button type="submit"><span></span>Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
