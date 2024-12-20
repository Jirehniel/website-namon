 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Beaches in the Philippines</title>
<link rel="stylesheet" href="css/home/home.css">
</head>
<body>

      <div class="content-home">
            <h1>Best Beaches in the Philippines</h1>
            <p>Welcome to paradise! 🌴 Dive into a world of sun, sand, and sea as we take you on a virtual tour of the most stunning beaches in the Philippines. From the pristine white sands of Boracay to the hidden gems of Palawan, get ready to explore and be inspired. Click below to start your journey to the ultimate beach escape!</p>
            <div>
                <a href="index.php?command=2">
                    <button type="button"><span></span> Explore More Beaches</button>
                </a>
            </div>
            
          </div>
            
<!-- Featured Beaches Section -->
        <div class="background-image-beaches">
    
        <h2>FEATURED BEACHES</h2>
        <ul class="gallery_list">
            <?php if (!empty($featuredBeaches)): ?>
                <?php foreach ($featuredBeaches as $beach): ?>
                    <li class="gallery_item">
                        <div class="gallery_title"><?php echo htmlspecialchars($beach->name); ?></div>
                        <img src = "<?php echo htmlspecialchars($beach->image_url); ?>" alt="<?php echo htmlspecialchars($beach->name); ?>">
                        <p><?php echo htmlspecialchars($beach->description); ?></p>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="gallery_text">
                    <h2>No featured beaches available.</h2>
                </li>
            <?php endif; ?>
        </ul>
    </div>
          

    <!-- Gallery Section -->
     <!-- <div class="gallery_section">
        <h2>FEATURED BEACHES</h2>
        <ul class="gallery_list"> -->
            <!-- Beach Item for Boracay -->
            <!-- <li class="gallery_item">
                <div class="gallery_title">Boracay Beach</div>
                <img src="images/boracay.jpg">
                <p>Known for its powdery white sand and crystal-clear waters, Boracay is the epitome of a tropical paradise. Located in Malay, Aklan, Western Visayas. 
                <a href="https://www.google.com/maps/place/Boracay,+Malay,+Aklan/@11.9674779,121.9186398,12z/data=!3m1!4b1!4m6!3m5!1s0x33b8c232e6cfb6cb:0x4f357b64c21c1b8!8m2!3d11.9661572!4d121.9272277!16s%2Fg%2F11b6l6y3h0" target="_blank">View on Google Maps</a> | 
                <a href="https://www.facebook.com/BoracayIslandGuide" target="_blank">Visit on Facebook</a></p>
            </li>
            <li class="gallery_item">
                <div class="gallery_title">El Nido Beach</div>
                <img src="images/el_nido.jpg">
                <p>A haven for divers and beach lovers alike, El Nido is renowned for its limestone cliffs and vibrant marine life. Located in El Nido, Palawan, MIMAROPA. 
                <a href="https://www.google.com/maps/place/El+Nido,+Palawan/@11.1955845,119.4219206,12z/data=!3m1!4b1!4m6!3m5!1s0x33b11f65f6d68a3d:0x5eb1b6a6f2dbf14!8m2!3d11.1956142!4d119.4387103!16s%2Fg%2F11c6_b0ls5" target="_blank">View on Google Maps</a> | 
                <a href="https://web.facebook.com/ElnidoPalawanPhilippines" target="_blank">Visit on Facebook</a></p>
            </li>
         </ul>
    </div> -->
     <div class="about_us_banner">
        <div class="team_section">
            <h2>Meet the Coders</h2>
            <div class="team_profiles">
                <!-- Profile for Jireh -->
                <div class="profile">
                    <img src="images/jireh.jpg" alt="Jireh's Picture" class="profile_img">
                    <h3>Jireh</h3>
                    <p>Full-stack Developer with a passion for creating dynamic and user-friendly websites. Jireh loves exploring new technologies and bringing creative ideas to life through code.</p>
                    <div class="socials">
                        <a href="https://github.com/Jirehniel" target="_blank">GitHub</a> |
                        <a href="https://linkedin.com/in/jireh" target="_blank">LinkedIn</a> |
                        <a href="mailto:jirehniel.caballero@students.isatu.edu.ph">Email</a>
                    </div>
                </div>
                <!-- Profile for Missy -->
                <div class="profile">
                    <img src="images/missy.jpg" alt="Missy's Picture" class="profile_img">
                    <h3>Missy</h3>
                    <p>Front-end Developer with a knack for designing aesthetically pleasing and responsive websites. Missy focuses on the user experience, ensuring that every website is as beautiful as it is functional.</p>
                    <div class="socials">
                        <a href="https://github.com/xoxolrjj" target="_blank">GitHub</a> |
                        <a href="https://www.linkedin.com/in/missy-key-sadsad-6102402b4/" target="_blank">LinkedIn</a> |
                        <a href="mailto:missykey.sadsad@students.isatu.edu.ph">Email</a>
                    </div>
                </div>
            </div>    
        </div>
    </div>


  
 
</body>
</html>
