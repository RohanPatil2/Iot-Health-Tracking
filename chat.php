<?php
$page = "Chat with Doctor";
include_once("./adders/header.php");
?>
<!--Container Main start-->
<div class="m-3">
	<div class="row">
		<h4 class="text-uppercase"><?php echo $page; ?></h4>
	</div>
</div>

<div class="container-fluid pt-3">
	<div class="card">
		<div class="card-body p-0">
			<div class="row">
				<div class="col-md-3 pr-0">
					<ul class="list-group">
						<li class="list-group-item">
							<b>Dr. Strange</b>
							<span class="text-muted">
								<small>Sasun Hospital</small>
							</span>
						</li>
						<li class="list-group-item">
							<b>Dr. Chaudhari</b>
							<span class="text-muted">
								<small>Sasun Hospital</small>
							</span>
						</li>
						<li class="list-group-item">
							<b>Dr. Deshmukh</b>
							<span class="text-muted">
								<small>Sasun Hospital</small>
							</span>
						</li>
						<li class="list-group-item">
							<b>Dr. Patil</b>
							<span class="text-muted">
								<small>Sasun Hospital</small>
							</span>
						</li>
						<li class="list-group-item">
							<b>Dr. Chavhan</b>
							<span class="text-muted">
								<small>Sasun Hospital</small>
							</span>
						</li>
					</ul>
				</div>
				<div class="col-md-9 p-0">
					<section class="msger m-0">
						<header class="msger-header">
							<div class="msger-header-title">
								<i class="fas fa-comment-alt"></i> Dr. Chaudhari
							</div>
						</header>

						<main class="msger-chat">
							<div class="msg left-msg">

								<div class="msg-bubble">
									<div class="msg-info">
										<div class="msg-info-name">Dr. Chaudhari</div>
										<div class="msg-info-time">12:45</div>
									</div>

									<div class="msg-text">
										Hi, how may I help you?
									</div>
								</div>
							</div>

							<div class="msg right-msg">

								<div class="msg-bubble">
									<div class="msg-info">
										<div class="msg-info-name">You</div>
										<div class="msg-info-time">12:46</div>
									</div>

									<div class="msg-text">
										I'm not feeling well
									</div>
								</div>
							</div>
						</main>

						<form class="msger-inputarea">
							<input type="text" class="msger-input" placeholder="Enter your message...">
							<button type="submit" class="msger-send-btn">Send</button>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once('./adders/footer.php');
?>