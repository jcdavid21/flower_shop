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
    <title>Terms & Conditions - Maris Flower Shop</title>
    <style>
        .terms-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .terms-header {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .terms-header h1 {
            font-size: 36px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        
        .terms-header p {
            font-size: 16px;
            color: #777;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .terms-section {
            margin-bottom: 40px;
        }
        
        .terms-section h2 {
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .terms-section h3 {
            font-size: 20px;
            color: #4a4a4a;
            margin: 25px 0 15px;
        }
        
        .terms-section p, .terms-section li {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        
        .terms-section ul, .terms-section ol {
            margin-left: 20px;
            margin-bottom: 20px;
        }
        
        .terms-section li {
            margin-bottom: 10px;
        }
        
        .terms-update {
            font-style: italic;
            color: #888;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #eee;
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
        
        .contact-info {
            background-color: #f9f7f7;
            padding: 30px;
            border-radius: 8px;
            margin-top: 40px;
        }
        
        .contact-info h3 {
            margin-top: 0;
        }
        
        @media (max-width: 768px) {
            .terms-header h1 {
                font-size: 28px;
            }
            
            .terms-section h2 {
                font-size: 22px;
            }
            
            .terms-section h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    
    <?php include "./navbar.php" ?>
    <main>
        <div class="terms-container">
            <div class="terms-header">
                <h1>Terms & Conditions</h1>
                <p>Please read these Terms and Conditions carefully before using the Maris Flower Shop website or purchasing our products and services. By accessing our website or placing an order, you agree to be bound by these Terms and Conditions.</p>
            </div>
            
            <div class="terms-section">
                <h2>1. General Terms</h2>
                <p>These Terms and Conditions govern your use of the Maris Flower Shop website and the purchase of products and services offered by Maris Flower Shop. By accessing our website or placing an order, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
                
                <p>We reserve the right to modify these Terms and Conditions at any time without prior notice. Your continued use of our website or services after any such changes constitutes your acceptance of the new Terms and Conditions.</p>
            </div>
            
            <div class="terms-section">
                <h2>2. Products and Services</h2>
                
                <h3>2.1 Product Availability</h3>
                <p>All products displayed on our website are subject to availability. We reserve the right to substitute items of equal or greater value if the exact flowers or products ordered are unavailable. We will make reasonable efforts to maintain the same color scheme and overall look of the arrangement.</p>
                
                <h3>2.2 Product Images</h3>
                <p>The images of products on our website are for illustrative purposes only. Due to the natural variations in flowers and seasonal availability, the actual products delivered may differ slightly from the images displayed. We strive to make our arrangements as similar as possible to the images shown, but variations in color, shape, and size may occur.</p>
                
                <h3>2.3 Pricing</h3>
                <p>All prices are displayed in USD and are exclusive of delivery charges unless otherwise stated. We reserve the right to change prices without prior notice. The price applicable to your order will be the price displayed on our website at the time you place your order.</p>
                
                <div class="highlight-box">
                    <p>Special seasonal pricing may apply during peak periods such as Valentine's Day, Mother's Day, and other holidays. These will be clearly indicated on our website.</p>
                </div>
            </div>
            
            <div class="terms-section">
                <h2>3. Orders and Payment</h2>
                
                <h3>3.1 Order Acceptance</h3>
                <p>All orders are subject to acceptance and availability. We reserve the right to refuse any order without giving reason. Once an order is placed, you will receive an order confirmation via email. This email confirms that we have received your order but does not constitute acceptance of your order.</p>
                
                <h3>3.2 Payment Methods</h3>
                <p>We accept various payment methods as indicated on our website, including major credit cards, debit cards, and online payment services. All payments must be received in full before products are delivered or services are provided.</p>
                
                <h3>3.3 Order Cancellation</h3>
                <p>Orders may be canceled within 24 hours of placement, provided that the products have not yet been processed or dispatched. To cancel an order, please contact our customer service team immediately. Orders that have already been processed or dispatched cannot be canceled.</p>
            </div>
            
            <div class="terms-section">
                <h2>4. Delivery</h2>
                
                <h3>4.1 Delivery Areas</h3>
                <p>We deliver to specified areas as indicated on our website. Additional delivery charges may apply for deliveries outside our standard delivery areas.</p>
                
                <h3>4.2 Delivery Times</h3>
                <p>We strive to deliver all orders within the selected delivery time slot. However, we cannot guarantee specific delivery times due to unforeseen circumstances such as traffic, weather conditions, or other factors beyond our control.</p>
                
                <h3>4.3 Delivery Attempts</h3>
                <p>If the recipient is not available at the time of delivery, we may:</p>
                <ul>
                    <li>Leave the flowers with a neighbor or at a safe place</li>
                    <li>Return the flowers to our shop and attempt delivery the next business day</li>
                    <li>Contact the sender to arrange an alternative delivery method</li>
                </ul>
                <p>Additional charges may apply for redelivery attempts.</p>
                
                <h3>4.4 Delivery Verification</h3>
                <p>Please ensure that all delivery information provided is accurate and complete. We are not responsible for delays or failed deliveries due to incorrect or incomplete delivery information.</p>
            </div>
            
            <div class="terms-section">
                <h2>5. Returns and Refunds</h2>
                
                <h3>5.1 Product Quality</h3>
                <p>We pride ourselves on the quality of our flowers and products. If you are not satisfied with the quality of the products received, please contact us within 24 hours of delivery with photographs of the products. We will assess the situation and may offer a replacement or refund at our discretion.</p>
                
                <h3>5.2 Refund Policy</h3>
                <p>Refunds may be issued in the following circumstances:</p>
                <ul>
                    <li>Products delivered are significantly different from what was ordered</li>
                    <li>Products are of unsatisfactory quality upon delivery</li>
                    <li>Products were not delivered due to our error</li>
                </ul>
                <p>Refunds will be processed using the same payment method used for the original purchase and may take 5-10 business days to appear in your account.</p>
            </div>
            
            <div class="terms-section">
                <h2>6. Intellectual Property</h2>
                <p>All content on our website, including but not limited to text, graphics, logos, images, and software, is the property of Maris Flower Shop or its content suppliers and is protected by copyright laws. The compilation of all content on this site is the exclusive property of Maris Flower Shop.</p>
                
                <p>You may not reproduce, duplicate, copy, sell, resell, or exploit any portion of our website without express written permission from Maris Flower Shop.</p>
            </div>
            
            <div class="terms-section">
                <h2>7. Limitation of Liability</h2>
                <p>To the maximum extent permitted by law, Maris Flower Shop shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, use, goodwill, or other intangible losses, resulting from:</p>
                <ul>
                    <li>Your use or inability to use our website or services</li>
                    <li>Any unauthorized access to or use of our servers and/or any personal information stored therein</li>
                    <li>Any errors, mistakes, or inaccuracies in our content</li>
                    <li>Any interruption or cessation of transmission to or from our website</li>
                    <li>Any bugs, viruses, trojan horses, or the like that may be transmitted to or through our website</li>
                </ul>
            </div>
            
            <div class="terms-section">
                <h2>8. Governing Law</h2>
                <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of the state where Maris Flower Shop is located, without regard to its conflict of law provisions.</p>
                
                <p>Any disputes arising under or in connection with these Terms and Conditions shall be subject to the exclusive jurisdiction of the courts located within that state.</p>
            </div>
            
            <div class="terms-section">
                <h2>9. Severability</h2>
                <p>If any provision of these Terms and Conditions is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>
            </div>
            
            <div class="terms-section">
                <h2>10. Contact Information</h2>
                <div class="contact-info">
                    <h3>Maris Flower Shop</h3>
                    <p>If you have any questions about these Terms and Conditions, please contact us:</p>
                    <p>Email: terms@marisflowershop.com<br>
                    Phone: (555) 123-4567<br>
                    Address: 123 Blossom Street, Flowertown, FL 12345</p>
                </div>
                
                <p class="terms-update">Last updated: April 27, 2025</p>
            </div>
        </div>
    </main>

    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
</body>
</html>