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
    <title>Payment Policy - Maris Flower Shop</title>
    <style>
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #4a4a4a;
        }
        
        .payment-section {
            margin-bottom: 50px;
        }
        
        .section-title {
            color: #e83e8c;
            border-bottom: 2px solid #e83e8c;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .payment-method {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .payment-method h3 {
            color: #4a4a4a;
            margin-bottom: 15px;
        }
        
        .qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }
        
        .qr-code {
            max-width: 200px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 10px;
            background: white;
        }
        
        .steps-list {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .steps-list ol {
            padding-left: 20px;
        }
        
        .steps-list li {
            margin-bottom: 12px;
            line-height: 1.6;
        }
        
        .important-note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .delivery-info {
            background-color: #e6f7ff;
            border-left: 4px solid #1890ff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .faq-item {
            margin-bottom: 20px;
        }
        
        .faq-question {
            font-weight: 600;
            color: #4a4a4a;
            margin-bottom: 8px;
        }
        
        .faq-answer {
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .payment-method {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    
    <?php include "./navbar.php" ?>
    <main>
        <h1 class="page-title">Payment Terms & Instructions</h1>
        
        <div class="payment-section">
            <h2 class="section-title">Accepted Payment Methods</h2>
            
            <div class="payment-method">
                <h3><i class="fas fa-mobile-alt"></i> GCash Payment</h3>
                <p>For your convenience, we accept GCash payments for all orders. Follow these simple steps to complete your payment:</p>
                
                <div class="qr-section">
                    <img src="/api/placeholder/200/200" alt="GCash QR Code" class="qr-code">
                    <p><strong>Maris Flower Shop GCash Account</strong></p>
                </div>
                
                <div class="steps-list">
                    <ol>
                        <li>Open your GCash app on your mobile device</li>
                        <li>Tap on "Scan QR" or "Pay QR"</li>
                        <li>Scan the QR code shown above</li>
                        <li>Enter the exact amount for your order</li>
                        <li>Include your <strong>Order Number</strong> in the notes/message section</li>
                        <li>Review the payment details and confirm the transaction</li>
                        <li>Save a screenshot of your payment confirmation</li>
                        <li>Send the screenshot to us through email or messaging platforms for verification</li>
                    </ol>
                </div>
                
                <div class="important-note">
                    <p><strong>Important:</strong> Always include your Order Number when making a payment so we can properly track and process your order.</p>
                </div>
            </div>
            
            <div class="payment-method">
                <h3><i class="fas fa-money-bill-wave"></i> Cash on Delivery (COD)</h3>
                <p>We also accept Cash on Delivery for orders within our delivery areas. Please note the following terms:</p>
                <ul>
                    <li>Payment must be made in full to our delivery personnel upon receipt of your order</li>
                    <li>Please prepare the exact amount if possible</li>
                    <li>Our delivery staff will provide an official receipt upon payment</li>
                </ul>
                
                <div class="delivery-info">
                    <p><strong>Note:</strong> COD may not be available for certain locations or for orders above a specific amount. Please check during checkout if your order qualifies for COD.</p>
                </div>
            </div>
        </div>
        
        <div class="payment-section">
            <h2 class="section-title">Payment Terms</h2>
            
            <div class="payment-method">
                <h3><i class="fas fa-file-invoice"></i> General Terms</h3>
                <ul>
                    <li>Full payment is required before processing and dispatch of orders</li>
                    <li>Order confirmation will be sent once payment is verified</li>
                    <li>All prices are inclusive of applicable taxes</li>
                    <li>Delivery fees are calculated based on your location and are shown during checkout</li>
                </ul>
            </div>
            
            <div class="payment-method">
                <h3><i class="fas fa-calendar-alt"></i> Pre-orders & Special Occasions</h3>
                <ul>
                    <li>For special occasion orders (Valentine's Day, Mother's Day, etc.), a 50% deposit is required to secure your order</li>
                    <li>Balance payment must be completed at least 48 hours before the scheduled delivery date</li>
                    <li>For custom arrangements, full payment is required upon design approval</li>
                </ul>
            </div>
            
            <div class="payment-method">
                <h3><i class="fas fa-undo-alt"></i> Cancellations & Refunds</h3>
                <ul>
                    <li>Orders can be canceled with a full refund if requested at least 48 hours before the scheduled delivery date</li>
                    <li>Cancellations made within 24-48 hours of delivery will receive a 70% refund</li>
                    <li>Orders canceled less than 24 hours before delivery will incur a 50% cancellation fee</li>
                    <li>Refunds will be processed through the original payment method within 7-10 business days</li>
                </ul>
            </div>
        </div>
        
        <div class="payment-section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <p class="faq-question">Q: Is my payment information secure?</p>
                <p class="faq-answer">A: Yes, all payments made through GCash are secured by their platform's encryption and security protocols. We do not store your payment information on our systems.</p>
            </div>
            
            <div class="faq-item">
                <p class="faq-question">Q: What should I do if my payment fails?</p>
                <p class="faq-answer">A: If your payment fails, please check your GCash balance and ensure you have sufficient funds. Try again or contact us for assistance through our customer service hotline or email.</p>
            </div>
            
            <div class="faq-item">
                <p class="faq-question">Q: Can I pay using multiple payment methods?</p>
                <p class="faq-answer">A: Currently, we require payment to be made using a single payment method for each order to simplify our tracking and verification process.</p>
            </div>
            
            <div class="faq-item">
                <p class="faq-question">Q: How will I know if my payment was received?</p>
                <p class="faq-answer">A: Once we verify your payment, you will receive a payment confirmation email or text message. You can also check your order status on our website using your order number.</p>
            </div>
            
            <div class="faq-item">
                <p class="faq-question">Q: Do you offer installment payment options?</p>
                <p class="faq-answer">A: For large orders or event arrangements, we may offer installment payment plans. Please contact our customer service team to discuss available options for your specific order.</p>
            </div>
        </div>
        
        <div class="payment-section">
            <h2 class="section-title">Need Help?</h2>
            
            <div class="payment-method">
                <h3><i class="fas fa-headset"></i> Contact Customer Service</h3>
                <p>If you have any questions or need assistance with your payment, our customer service team is ready to help:</p>
                <ul>
                    <li><strong>Email:</strong> payments@marisflowershop.com</li>
                    <li><strong>Phone:</strong> (123) 456-7890</li>
                    <li><strong>Business Hours:</strong> Monday - Saturday, 9:00 AM - 6:00 PM</li>
                </ul>
            </div>
        </div>
    </main>

    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
</body>
</html>