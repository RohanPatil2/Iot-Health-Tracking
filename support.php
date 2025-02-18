<?php
$page = "Support";
include_once("./adders/header.php");
?>
<!--Container Main start-->
<div class="m-3">
    <div class="row">
        <h4 class="text-uppercase"><?php echo $page; ?></h4>
    </div>
</div>

<div class="container pt-3" style="margin-bottom: 3rem;">
    <div class="support-content" style="background-color: #ffe0b2; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h5 style="color: #ff5722;">Welcome to our Support Page</h5>
        <p>Our support team is dedicated to assisting you with any issues or concerns you may have. Whether you need technical assistance, have questions about our services, or require help navigating our website, we're here to help you every step of the way.</p>
        <h6 style="color: #ff8f00;">How Can We Assist You?</h6>
        <ul style="list-style-type: none;">
            <li><strong style="color: #ff5722;">Technical Support:</strong> Contact our technical support team for assistance with website functionality, account issues, or troubleshooting.</li>
            <li><strong style="color: #ff5722;">Service Inquiries:</strong> Have questions about our healthcare services? Our support staff can provide detailed information and address any concerns you may have.</li>
            <li><strong style="color: #ff5722;">Feedback:</strong> We value your feedback! Let us know about your experience using our services or provide suggestions for improvement.</li>
            <li><strong style="color: #ff5722;">Contact Information:</strong> Reach out to our support team via email or phone for personalized assistance.</li>
        </ul>
        <p>If you require immediate assistance, please don't hesitate to contact us using the information provided below. We're here to ensure that your experience with our healthcare platform is seamless and satisfactory.</p>
        <!-- Contact Information -->
        <div class="contact-info">
            <h6 style="color: #ff8f00;">Contact Information</h6>
            <p><strong>Email:</strong> support@healthcare.com</p>
            <p><strong>Phone:</strong> 1-800-123-4567</p>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30267.31564717772!2d73.86009938369708!3d18.51016388518969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c0f827512e15%3A0x47538bcedae49c07!2sRuby%20Hall%20Clinic!5e0!3m2!1sen!2sin!4v1708531990889!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<?php
include_once('./adders/footer.php');
?>
