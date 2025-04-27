<?php require_once("../backend/config/config.php") ?>
<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>About Us - Maris Flower Shop</title>
    <style>
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .about-header h1 {
            font-size: 36px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        
        .about-header p {
            font-size: 18px;
            color: #777;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
        }
        
        .about-text h2 {
            font-size: 28px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        
        .about-text p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .values-section {
            background-color: #f9f7f7;
            padding: 60px 20px;
            text-align: center;
        }
        
        .values-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .values-header {
            margin-bottom: 40px;
        }
        
        .values-header h2 {
            font-size: 28px;
            color: #4a4a4a;
        }
        
        .values-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        
        .value-card {
            flex: 1;
            min-width: 250px;
            max-width: 350px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .value-card:hover {
            transform: translateY(-10px);
        }
        
        .value-icon {
            font-size: 36px;
            color: #e77474;
            margin-bottom: 20px;
        }
        
        .value-card h3 {
            font-size: 20px;
            color: #4a4a4a;
            margin-bottom: 15px;
        }
        
        .value-card p {
            font-size: 15px;
            color: #777;
            line-height: 1.6;
        }
        
        .expertise-section {
            padding: 60px 20px;
        }
        
        .expertise-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .expertise-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .expertise-header h2 {
            font-size: 28px;
            color: #4a4a4a;
            margin-bottom: 15px;
        }
        
        .expertise-header p {
            font-size: 16px;
            color: #777;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .services-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }
        
        .service-card {
            flex: 1;
            min-width: 250px;
            max-width: 380px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
        }
        
        .service-image {
            height: 200px;
            overflow: hidden;
        }
        
        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .service-card:hover .service-image img {
            transform: scale(1.1);
        }
        
        .service-content {
            padding: 25px;
        }
        
        .service-content h3 {
            font-size: 20px;
            color: #4a4a4a;
            margin-bottom: 15px;
        }
        
        .service-content p {
            font-size: 15px;
            color: #777;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .service-link {
            color: #e77474;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        
        .service-link i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }
        
        .service-link:hover i {
            transform: translateX(5px);
        }
        
        .cta-section {
            background-color: #e77474;
            color: white;
            padding: 80px 20px;
            text-align: center;
        }
        
        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-container h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .cta-container p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .cta-btn {
            display: inline-block;
            background-color: white;
            color: #e77474;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .cta-btn:hover {
            background-color: rgba(255,255,255,0.9);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
            }
            
            .service-card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <?php include "./navbar.php" ?>
    <main>
        <section class="about-container">
            <div class="about-header">
                <h1>About Maris Flower Shop</h1>
                <p>Bringing beauty and joy to our community through the language of flowers since 2015</p>
            </div>
            
            <div class="about-content">
                <div class="about-image">
                    <img src="../assets/imgs/abt-us-1.avif" alt="Maris Flower Shop interior">
                </div>
                <div class="about-text">
                    <h2>Our Story</h2>
                    <p>Maris Flower Shop was born from a lifelong passion for floral artistry and a dream of creating memorable moments through beautiful blooms. Founded by Maria Johnson in 2015, our shop started as a small corner store with a big vision: to provide the community with exquisite floral arrangements crafted with love and attention to detail.</p>
                    <p>Over the years, we've grown from a modest neighborhood shop to a beloved local institution, serving occasions big and small—from weddings and celebrations to everyday expressions of love and care. Despite our growth, we remain committed to the personal touch and artisanal quality that has been our hallmark from day one.</p>
                    <p>Each arrangement that leaves our shop tells a story, carries an emotion, and creates a connection. We believe in the power of flowers to transform spaces and touch hearts, and it's this belief that drives everything we do at Maris Flower Shop.</p>
                </div>
            </div>
        </section>
        
        <section class="values-section">
            <div class="values-container">
                <div class="values-header">
                    <h2>Our Values</h2>
                </div>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Sustainability</h3>
                        <p>We prioritize eco-friendly practices in sourcing our flowers and materials, working with local growers whenever possible and minimizing waste through composting and recyclable packaging.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Creativity</h3>
                        <p>Every arrangement is a unique work of art, designed with creativity and inspiration. We blend classic techniques with contemporary trends to create floral designs that delight and surprise.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Community</h3>
                        <p>We're proud to be part of this community and strive to give back through donations, workshops, and participation in local events. Your support helps us support others.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="expertise-section">
            <div class="expertise-container">
                <div class="expertise-header">
                    <h2>Our Expertise</h2>
                    <p>At Maris Flower Shop, we specialize in creating beautiful floral designs for every occasion. From elegant wedding arrangements to thoughtful sympathy flowers, our experienced team delivers exceptional quality and service.</p>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="../assets/imgs/wedding.avif" alt="Wedding Flowers">
                        </div>
                        <div class="service-content">
                            <h3>Wedding Flowers</h3>
                            <p>We create stunning bridal bouquets, ceremony decorations, and reception centerpieces that perfectly complement your wedding style and color palette.</p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <img src="../assets/imgs/seasonal.avif" alt="Everyday Arrangements">
                        </div>
                        <div class="service-content">
                            <h3>Seasonal Arrangements</h3>
                            <p>Our thoughtfully designed seasonal arrangements showcase the best blooms of each season, bringing nature's beauty into your home or office.</p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <img src="../assets/imgs/events.avif" alt="Special Events">
                        </div>
                        <div class="service-content">
                            <h3>Event Florals</h3>
                            <p>From corporate gatherings to milestone celebrations, we create custom floral installations and centerpieces that elevate any special event.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="cta-section">
            <div class="cta-container">
                <h2>Let's Create Something Beautiful Together</h2>
                <p>Whether you're celebrating a special occasion, expressing your feelings, or simply adding beauty to your everyday life, we're here to help. Visit our shop or contact us to discuss your floral needs.</p>
            </div>
        </section>
    </main>

    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
</body>
</html>