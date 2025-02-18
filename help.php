<?php
$page = "Help";
include_once("./adders/header.php");
?>
<!--Container Main start-->
<div class="m-3">
	<div class="row">
		<h4 class="text-uppercase"><?php echo $page; ?></h4>
	</div>
</div>

<div class="container pt-3" style="margin-bottom: 3rem;">
	<div class="help-content" style="background-color: #ffe0b2; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
		<h5 style="color: #ff5722;">Welcome to our Healthcare Help Page</h5>
		<p>At our healthcare facility, we strive to provide the best possible care and support for all our patients. Whether you have questions about our services, need assistance with scheduling appointments, or want to learn more about managing your health, our help page is here to guide you.</p>
		<h6 style="color: #ff8f00;">How Can We Help You?</h6>
		<ul style="list-style-type: none;">
			<li><strong style="color: #ff5722;">FAQs:</strong> Browse through our frequently asked questions to find answers to common queries.</li>
			<li><strong style="color: #ff5722;">Contact Information:</strong> Reach out to our team directly via phone or email for personalized assistance.</li>
			<li><strong style="color: #ff5722;">Appointment Booking:</strong> Learn how to schedule appointments with our healthcare professionals.</li>
			<li><strong style="color: #ff5722;">Health Tips:</strong> Explore resources and tips for maintaining a healthy lifestyle.</li>
		</ul>
		<p>For any urgent inquiries or medical emergencies, please contact our emergency hotline immediately.</p>
		<p>Email: healthcare@gmail.com</p>
		<p>Tele-Phone: 020 - 24573971 </p>
		<p>Phone: +91 7040782110 </p>
		 
		<!-- Google Maps Embed -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30267.31564717772!2d73.86009938369708!3d18.51016388518969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c0f827512e15%3A0x47538bcedae49c07!2sRuby%20Hall%20Clinic!5e0!3m2!1sen!2sin!4v1708531990889!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>

<?php
include_once('./adders/footer.php');
?>
