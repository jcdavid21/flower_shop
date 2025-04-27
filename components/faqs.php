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
    <style>
        /* FAQ Styles */
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .faq-header h1 {
            color: #3a7561;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .faq-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .faq-section {
            margin-bottom: 40px;
        }

        .faq-section h2 {
            color: #3a7561;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .faq-item {
            margin-bottom: 20px;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
        }

        .faq-question {
            background-color: #f9f9f9;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 20px;
            max-height: 300px;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .contact-box {
            background-color: #f7f9f8;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            margin-top: 40px;
        }

        .contact-box h3 {
            color: #3a7561;
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .contact-method {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-method i {
            color: #3a7561;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .faq-header h1 {
                font-size: 2rem;
            }

            .contact-info {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
    <title>FAQs</title>
</head>

<body>
    <?php include "./navbar.php" ?>
    <main>
        <div class="faq-container">
            <div class="faq-header">
                <h1>Frequently Asked Questions</h1>
                <p>Find answers to common questions about Maris Flower Shop products and services</p>
            </div>

            <div class="faq-section">
                <h2>Orders & Delivery</h2>

                <div class="faq-item">
                    <div class="faq-question">
                        How far in advance should I place my order?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>For standard arrangements, we recommend placing your order at least 24 hours in advance. For special occasions like Valentine's Day, Mother's Day, or holidays, please order 3-5 days ahead. Custom arrangements may require additional lead time, so please contact us to discuss your specific needs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        What areas do you deliver to?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We deliver to all neighborhoods within a 15-mile radius of our shop. For locations outside this area, please call us to discuss delivery options and potential additional fees. Same-day delivery is available for orders placed before 1 PM for locations within 5 miles.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        How much does delivery cost?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our delivery fees range from $8.99 to $15.99 depending on distance and timing. Standard delivery (within 10 miles) is $8.99, while expedited or extended distance deliveries may cost more. We offer free delivery for orders over $75 within our standard delivery zone.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Can I choose a specific delivery time?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer morning (9 AM - 12 PM) and afternoon (1 PM - 5 PM) delivery windows. For an additional $10 fee, we can accommodate specific 2-hour delivery windows. Please note that high-volume holidays may have limited time slot availability.</p>
                    </div>
                </div>
            </div>

            <div class="faq-section">
                <h2>Products & Services</h2>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you offer custom floral arrangements?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We specialize in custom floral designs. You can specify colors, flower types, style preferences, and occasions. For custom arrangements, please contact us directly by phone or through our website's custom order form at least 48 hours in advance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        What types of flowers do you typically have in stock?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We maintain a diverse selection that changes with the seasons. Our regular inventory includes roses, lilies, sunflowers, tulips, gerbera daisies, carnations, hydrangeas, and various seasonal blooms. We also source specialty flowers with advance notice. Contact us to check availability for specific varieties.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you offer event and wedding services?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We provide comprehensive floral design for weddings, corporate events, celebrations, and more. Our services include consultation, custom designs, delivery, setup, and post-event cleanup. Please schedule a consultation at least 2-3 months before your event date. Wedding bookings should ideally be made 6-12 months in advance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you sell plants and gift items besides flowers?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer a variety of houseplants, succulents, gourmet gift baskets, chocolates, greeting cards, decorative vases, and specialty gifts. You can add these items to your flower orders or purchase them separately. We also create custom gift baskets for special occasions.</p>
                    </div>
                </div>
            </div>

            <div class="faq-section">
                <h2>Payment & Policies</h2>

                <div class="faq-item">
                    <div class="faq-question">
                        What payment methods do you accept?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept all major credit cards (Visa, Mastercard, American Express, Discover), PayPal, Apple Pay, Google Pay, and cash for in-store purchases. For corporate accounts and event orders, we can also arrange invoicing with prior approval.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        What is your cancellation policy?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Orders can be canceled with a full refund up to 48 hours before the scheduled delivery date. Cancellations within 24-48 hours receive a store credit or 75% refund. Orders canceled less than 24 hours in advance are eligible for a 50% refund. Custom or large event orders may have different cancellation terms outlined in your contract.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you have a satisfaction guarantee?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We stand behind our products with a 100% satisfaction guarantee. If you're not completely satisfied with your flowers upon delivery, please contact us within 24 hours with a photo of the arrangement, and we'll make it right with a replacement or refund.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        How do I care for my flowers to make them last longer?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>To maximize the lifespan of your flowers: change water every 2-3 days, trim stems at an angle every other day, remove dying blooms promptly, keep arrangements away from direct sunlight, heat sources, and ripening fruit, and use the flower food packet provided. Each arrangement comes with detailed care instructions specific to the flowers included.</p>
                    </div>
                </div>
            </div>

            <div class="contact-box">
                <h3>Still have questions?</h3>
                <p>Our friendly team is here to help! Contact us through any of these methods:</p>
                <div class="contact-info">
                    <div class="contact-method">
                        <i class="fas fa-phone"></i>
                        <span>(555) 123-4567</span>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <span>info@marisflowers.com</span>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-comment"></i>
                        <span>Live Chat (during business hours)</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
    <script>
        // Add this to an existing script file or create a new one
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle FAQ items
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                    const item = question.parentElement;
                    item.classList.toggle('active');
                });
            });
        });
    </script>
</body>

</html>