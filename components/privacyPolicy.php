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
    <title>Privacy Policy - Maris Flower Shop</title>
    <style>
        .privacy-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .privacy-header {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .privacy-header h1 {
            font-size: 36px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        
        .privacy-header p {
            font-size: 16px;
            color: #777;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .privacy-section {
            margin-bottom: 40px;
        }
        
        .privacy-section h2 {
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .privacy-section h3 {
            font-size: 20px;
            color: #4a4a4a;
            margin: 25px 0 15px;
        }
        
        .privacy-section p, .privacy-section li {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        
        .privacy-section ul, .privacy-section ol {
            margin-left: 20px;
            margin-bottom: 20px;
        }
        
        .privacy-section li {
            margin-bottom: 10px;
        }
        
        .policy-update {
            font-style: italic;
            color: #888;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .contact-info {
            background-color: #f9f7f7;
            padding: 30px;
            border-radius: 8px;
            margin-top: 40px;
        }
        
        .contact-info h3 {
            margin-top: 0;
        }
        
        .highlight-box {
            background-color: #ffe6e6;
            border-left: 4px solid #e77474;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        
        .highlight-box p {
            margin-bottom: 0;
        }
        
        @media (max-width: 768px) {
            .privacy-header h1 {
                font-size: 28px;
            }
            
            .privacy-section h2 {
                font-size: 22px;
            }
            
            .privacy-section h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    
    <?php include "./navbar.php" ?>
    <main>
        <div class="privacy-container">
            <div class="privacy-header">
                <h1>Privacy Policy</h1>
                <p>At Maris Flower Shop, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website or use our services.</p>
            </div>
            
            <div class="privacy-section">
                <h2>1. Information We Collect</h2>
                <p>We may collect the following types of information when you visit our website, make a purchase, or interact with us:</p>
                
                <h3>Personal Information</h3>
                <ul>
                    <li><strong>Contact details:</strong> Name, email address, phone number, and delivery address when you place an order or create an account.</li>
                    <li><strong>Payment information:</strong> Credit card details, billing address, and other payment details when you make a purchase. Note that we do not store complete credit card information on our servers.</li>
                    <li><strong>Account information:</strong> Username and password if you create an account on our website.</li>
                    <li><strong>Communication records:</strong> Information you provide when contacting us through email, phone, or our contact forms.</li>
                </ul>
                
                <h3>Automatically Collected Information</h3>
                <ul>
                    <li><strong>Usage data:</strong> Information about how you interact with our website, such as pages visited, time spent on pages, links clicked, and browsing patterns.</li>
                    <li><strong>Device information:</strong> Information about the device you use to access our website, including IP address, browser type, operating system, and device identifiers.</li>
                    <li><strong>Cookies and similar technologies:</strong> Information collected through cookies, web beacons, and similar technologies to enhance your experience on our website.</li>
                </ul>
            </div>
            
            <div class="privacy-section">
                <h2>2. How We Use Your Information</h2>
                <p>We use the information we collect for various purposes, including:</p>
                
                <ul>
                    <li><strong>Providing our services:</strong> Processing orders, delivering flowers, creating accounts, and managing customer relationships.</li>
                    <li><strong>Communication:</strong> Responding to inquiries, sending order confirmations, delivery updates, and providing customer support.</li>
                    <li><strong>Marketing:</strong> Sending promotional emails about special offers, new products, or other information we think you might find interesting (with your consent).</li>
                    <li><strong>Improving our services:</strong> Analyzing website usage to enhance user experience, develop new features, and improve our products and services.</li>
                    <li><strong>Security:</strong> Detecting and preventing fraud, unauthorized access, and other potential security issues.</li>
                    <li><strong>Legal compliance:</strong> Complying with applicable laws, regulations, and legal processes.</li>
                </ul>
            </div>
            
            <div class="privacy-section">
                <h2>3. Sharing Your Information</h2>
                <p>We may share your information with:</p>
                
                <ul>
                    <li><strong>Service providers:</strong> Third-party vendors who help us operate our business, such as payment processors, delivery services, and web hosting providers.</li>
                    <li><strong>Business partners:</strong> When we collaborate with other businesses to offer products or services, we may share information with them to facilitate these offerings.</li>
                    <li><strong>Legal authorities:</strong> When required by law, court order, or other legal processes, or to protect our rights, property, or safety.</li>
                </ul>
                
                <div class="highlight-box">
                    <p>We do not sell, rent, or trade your personal information to third parties for their marketing purposes without your explicit consent.</p>
                </div>
            </div>
            
            <div class="privacy-section">
                <h2>4. Cookies and Tracking Technologies</h2>
                <p>Our website uses cookies and similar tracking technologies to collect information about your browsing activities. Cookies are small text files stored on your device that help us provide and improve our services.</p>
                
                <p>We use cookies for:</p>
                <ul>
                    <li>Remembering your preferences and settings</li>
                    <li>Keeping track of items in your shopping cart</li>
                    <li>Understanding how you use our website</li>
                    <li>Improving our services and user experience</li>
                    <li>Providing personalized content and advertisements</li>
                </ul>
                
                <p>You can control cookies through your browser settings. However, disabling cookies may limit your ability to use certain features of our website.</p>
            </div>
            
            <div class="privacy-section">
                <h2>5. Your Rights and Choices</h2>
                <p>Depending on your location, you may have the following rights regarding your personal information:</p>
                
                <ul>
                    <li><strong>Access:</strong> You can request a copy of the personal information we hold about you.</li>
                    <li><strong>Correction:</strong> You can request that we correct inaccurate or incomplete information.</li>
                    <li><strong>Deletion:</strong> You can request that we delete your personal information in certain circumstances.</li>
                    <li><strong>Restriction:</strong> You can request that we limit how we use your information.</li>
                    <li><strong>Objection:</strong> You can object to our processing of your information in certain circumstances.</li>
                    <li><strong>Data portability:</strong> You can request a copy of your information in a structured, commonly used, and machine-readable format.</li>
                </ul>
                
                <p>To exercise any of these rights, please contact us using the information provided at the end of this policy.</p>
            </div>
            
            <div class="privacy-section">
                <h2>6. Data Security</h2>
                <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, loss, destruction, or alteration. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
            </div>
            
            <div class="privacy-section">
                <h2>7. Children's Privacy</h2>
                <p>Our services are not directed to children under the age of 13. We do not knowingly collect personal information from children under 13. If you believe we have collected information from a child under 13, please contact us, and we will take appropriate steps to remove the information.</p>
            </div>
            
            <div class="privacy-section">
                <h2>8. Changes to This Privacy Policy</h2>
                <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will post the updated policy on this page with a revised "last updated" date. We encourage you to review this policy periodically.</p>
                
                <div class="contact-info">
                    <h3>Contact Us</h3>
                    <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our privacy practices, please contact us at:</p>
                    <p><strong>Maris Flower Shop</strong><br>
                    Email: privacy@marisflowershop.com<br>
                    Phone: (555) 123-4567<br>
                    Address: 123 Blossom Street, Flowertown, FL 12345</p>
                </div>
                
                <p class="policy-update">Last updated: April 27, 2025</p>
            </div>
        </div>
    </main>

    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
</body>
</html>