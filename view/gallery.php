<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Top 10 Beaches in the Philippines</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Search Bar -->
   
    <div class="search-container">
        <form method="GET" action="index.php">
            <input type="hidden" name="command" value="search">
            <input type="text" name="search_query" placeholder="Search for a beach..."
                   value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">
                   <button type="submit"><span></span>Search</button>
                   </form>
     </div>
 


    <!-- Content Section -->
    <div class="content">
        <h1>Explore More Best Beaches around the Philippines</h1>
        <p>Explore the breathtaking beaches of the Philippines through our curated gallery. Each image captures the beauty and essence of the country's most stunning coastlines. Scroll down to immerse yourself in the natural wonders that make the Philippines a must-visit destination.</p>
    </div>

    <!-- Gallery Section -->
    <div class="gallery_section">
        <h2>BEST BEACHES IN THE PHILIPPINES</h2>
        <ul class="gallery_list">
            <?php 
            if (!empty($galleryItems)) {
                foreach ($galleryItems as $item) { ?>
            <li class="gallery_item">
    <div class="menu-container">
        <button class="menu-dots" aria-label="Menu">⋮</button>
        <div class="contextual-menu">
            <a href="index.php?command=editRec&galleryID=<?php echo $item->galleryID; ?>">Edit</a>
            <a href="index.php?command=deleteRec&galleryID=<?php echo $item->galleryID; ?>" 
               onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
        </div>
    </div>
    <img src="<?php echo $item->image_url; ?>" alt="<?php echo $item->name; ?>">
    <div class="gallery_title"><?php echo $item->name; ?></div>
    <p><?php echo $item->description; ?></p>

    <?php if (!empty($item->google_maps_link)) { ?>
        <a href="<?php echo $item->google_maps_link; ?>" target="_blank">View on Google Maps</a>
    <?php } ?>
    <?php if (!empty($item->facebook_link)) { ?>
        <a href="<?php echo $item->facebook_link; ?>" target="_blank">Visit on Facebook</a>
    <?php } ?>
</li>
                <?php }
            } else { ?>
                <p>No beaches found matching your search query.</p>
            <?php } ?>
        </ul>
    </div>

    

    <!-- Add New Beach Section -->
    <div class="add-new-container">
        <a href="index.php?command=addRec" class="add-new-link">
            <span class="plus-icon">+</span> Add New Beach
        </a>
    </div>
</body>
</html>
