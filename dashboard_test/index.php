<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard Test using VUE and PHP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.13"></script>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div id="app">
            <div class="header">
                <div class="left-logo"><img src="assets/CFB-Logo.svg"/></div>
                <div class="right-logo"><img src="assets/safe-secure.svg"/></div>
            </div>

			<section class="register" v-if="!hasSeenCongrats">
				<div class="register-stepper">
					<div class="step" :class="{'step-active' : step === 1, 'step-done': step > 1}"><span class="step-number">1</span></div>
					<div class="step" :class="{'step-active' : step === 2, 'step-done': step > 2}"><span class="step-number">2</span></div>
					<div class="step" :class="{'step-active' : step === 3, 'step-done': step > 3}"><span class="step-number">3</span></div>
					<div class="step" :class="{'step-active' : step === 4, 'step-done': step > 4}"><span class="step-number">4</span></div>
				</div>

				<div class="all-brands" v-if="step !== 4">
					<div><img src="assets/BT.svg"/></div>
					<div><img src="assets/Sky.svg"/></div>
					<div><img src="assets/TalkTalk.svg"/></div>
					<div><img src="assets/virgin.svg"/></div>
					<div><img src="assets/vodafone.svg"/></div>
				</div>

					<section v-show="step === 1">
						<div class="head1">Get a Better Broadband and WiFi Deal at your Home</div>
						<div class="head2">What’s your postcode?<div>
						<div class="head3">Enter your postcode and click ‘Continue’.</div>
						<form class="form" method="post" action="#" @submit.prevent="next">
							<div class="form-group">
								<input type="text" v-model="post_code" autocomplete="post_code" placeholder="eg. SW1A 1AA" required/>
							</div>
							<div>
								<input type="submit" value="Continue" class="btn1"/>
							</div>
						</form>
						<div class="head4">Find a better Broadband and WiFi deal in your area. 
							Choose from big providers such as TalkTalk, Virgin, Sky and Shell. Unlimited, Superfast deals with speeds up to 900mbps. 
							Find out the top speed at your address. Enter your postcode and find deals in your area. </div>
					</section>

					<section v-show="step === 2">
						<form class="form" method="post" action="#" @submit.prevent="next">
							<div class="head5">Who provides your current Broadband?</div>
							<div class="form-group drpdown-div">
								<?php
								require_once('dropdownData.php');
								$array_length = count($bb_curr);
								?>
								<select class="drpdown" name="dd_data" placeholder="Please select">
								<?php
								?>
								<option value="no" selected disabled>Please select</option>
								<?php
								for ($i=0;$i<$array_length;$i++){
								?>
								<option value="<?=$bb_curr[$i];?>"><?=$bb_curr[$i];?></option>
								<?php
								}
								?>
								</select>
							</div>

							<div class="head5">What’s your ideal speed?</div>
							<div class="form-group drpdown-div">
								<?php
								require_once('dropdownData.php');
								$array_length1 = count($bb_speed);
								?>
								<select class="drpdown" name="dd_data" placeholder="Please select">
								<?php
								?>
								<option value="no" selected disabled>Please select</option>
								<?php
								for ($i=0;$i<$array_length1;$i++){
								?>
								<option value="<?=$bb_speed[$i];?>"><?=$bb_speed[$i];?></option>
								<?php
								}
								?>
								</select>
							</div>

							<div class="head5">Which Broadband type do you need?</div>
							<div class="form-group drpdown-div">
								<?php
								require_once('dropdownData.php');
								$array_length2 = count($bb_type);
								?>
								<select class="drpdown" name="dd_data" placeholder="Please select">
								<?php
								?>
								<option value="no" selected disabled>Please select</option>
								<?php
								for ($i=0;$i<$array_length2;$i++){
								?>
								<option value="<?=$bb_type[$i];?>"><?=$bb_type[$i];?></option>
								<?php
								}
								?>
								</select>
							</div>
							

							<div class="btns">
								<div style="padding-top:12px;">
									<a class="btn-back" href="#" @click.prevent="prev()"><img src="assets/arrow_back.svg"/> Back</a>
								</div>
								<div>
									<input type="submit" value="Continue" class="btn1" />
								</div>
							</div>
						</form>
						<div style="margin-bottom: 34px;">
							<img src="assets/safe_img.svg" style="margin-top:43px;"/>
							<img src="assets/encrypt_img.svg" style="margin-top:24px;margin-left:75px;"/>
						</div>
					</section>

					<section v-show="step === 3">
						<form class="form" action="#" @submit.prevent="next">
							<div class="head5">What is your age?</div>
								<div class="form-group drpdown-div radio-btns">
									<?php
									$array_length3 = count($age_array);
									for ($i=0;$i<$array_length3;$i++){
									?>
									<div class="radio-labels">
										<input type="radio" name="contact" id="contact_<?php echo $age_array[$i]; ?>" onchange="hideMessage()" value="<?php echo $age_array[$i]; ?>" />
										<label for="contact_<?php echo $age_array[$i]; ?>"><?php echo $age_array[$i]; ?></label>
									</div>
									<?php } ?>
								</div>
								
								<div class="btns">
									<div style="padding-top:12px;">
										<a class="btn-back" href="#" @click.prevent="prev()"><img src="assets/arrow_back.svg"/> Back</a>
									</div>
									<div>
										<input type="submit" value="Continue" class="btn1" id="hideShowButton" style="display:none" />
									</div>
								</div>
								<div style="margin-bottom: 34px;">
									<img src="assets/safe_img.svg" style="margin-top:43px;"/>
									<img src="assets/encrypt_img.svg" style="margin-top:24px;margin-left:75px;"/>
								</div>
						</form>
					</section>
					<section v-show="step === 4">
						<div class="dots-7" id="loading" style="display:none"></div>
						<form class="form" id="afterload" action="#" @submit.prevent="customerRegister">
							
							<div class="offer-head1">
								<span style="color: #8EE69D;font-weight: 700;font-size: 20px;">1</span>
								<span style="font-size: 16px;margin-left:9px;font-weight: 700;">We’ve found you an offer!<span>
							</div>
							<div class="offer-page">
								<div class="offer-head2"> 
									<span style="margin: 19px 8px  19px 0;color: #637381;font-size: 14px;font-weight: 400;">Offered by: </span>
									<img src="assets/talk2.svg"/>
								</div>
								<div class="offer-img"><img src="assets/offer-img.svg" /></div>
								<div style="font-weight: 400;font-size: 14px;line-height: 21px;color: #637381;margin:10px 20px;">Monthly Cost From:</div>
								<div style="font-weight: 700;font-size: 64px;line-height: 56px;color: #015AFF;margin-left:20px;">£17.95</div>
								<div class="offer-features">
									<p style="color: #637381;margin: 10px 0 10px 20px;">Features included:</p>
									<p class="checked-list"><img src="assets/checked-mark.svg"/><span>Unlimited Superfast Broadband</span></p>
									<p class="checked-list"><img src="assets/checked-mark.svg"/><span>No Price Increases</span></p>
									<p class="checked-list"><img src="assets/checked-mark.svg"/><span>Amazon Echo Dot and Amazon Smart</span></p>
									<p style="color: black;margin-left: 42px;">Plug Included on selected deals</p>
									<div>
										<input type="button" value="Find out more" class="btn2" onclick="setFocus()" />
									</div>
								</div>
							</div>
							<div class="text-names" style="margin-top:56px">First Name</div>
							<div class="form-group">
								<input type="text" id="fname" v-model="customer.firstName" autocomplete="customer.firstName" placeholder="First Name" required />
							</div>

							<div class="text-names">Last Name</div>
							<div class="form-group">
								<input type="text" v-model="customer.lastName" autocomplete="customer.lastName" placeholder="Last Name" required />
							</div>

							<div class="text-names">Telephone</div>
							<div class="form-group">
								<input type="text" v-model="customer.phoneNumber" autocomplete="customer.phoneNumber" placeholder="Telephone" required />
							</div>

							<div class="text-names">Email Address</div>
							<div class="form-group">
								<input type="email" v-model="customer.eMail" autocomplete="customer.eMail" placeholder="Email Address" required />
							</div>

							<div style="width:326px;margin:auto;">
								<input type="checkbox" />
								<span class="check-text">If you would like to receive the best deals on Broadband and other offers from CF-Broadband.com, please tick this box.</span>
							</div>

							<div class="register-btn" style="width:328.24px;margin:auto;">
								<input type="submit" value="Continue" class="btn2" />
							</div>
							
							<div class="text-down">
							By clicking “Continue”, you agree to our Privacy Policy and to be contacted by phone, email and SMS by a Broadband Advisor
							</div>

							<div style="padding-top:12px;width: 328px;margin: auto;margin-top: 20px;">
								<a class="btn-back" href="#" @click.prevent="prev()"><img src="assets/arrow_back.svg"/> Back</a>
							</div>

							<div style="margin-bottom: 34px;text-align:center;">
								<img src="assets/safe_img.svg" style="margin-top:43px;"/>
								<img src="assets/encrypt_img.svg" style="margin-top:24px;margin-left:75px;"/>
							</div>
						</form>
					</section>
			</section>
			<section class="congrats-page" v-if="hasSeenCongrats" style="height:500px;background:white;">
				<div class="thanks-note">Thank you for using CF Broadband</div>
				<div class="thanks-note2">What's next?</div>
				<div class="thanks-note2" style="font-weight: 400;font-size: 18px;">An advisor from CF Broadband will call you shortly.</div>
			</section>
        </div>
		<div class="footer">
                <div>
                    <p>CF-Broadband.com is a trading name of Client Flo Media Ltd.</p>
                    <p>Registered Office Address - 5-9 Main Street, GX11 1AA. Company Number 120004.</p>
                </div>
                <div>
                    <p style="display:inline;margin-right:28px;">Terms</p>
                    <p style="display:inline">Privacy Policy</p>
                    <p>Copyright © 2022 CF-Broadband.com</p>
                </div>
        </div>
        <script src="app.js"></script>
		<script>
			function hideMessage(){
				if(document.querySelector('input[name="contact"]:checked')) {
					document.getElementById('hideShowButton').style.display = 'block';
					console.log('right');
				}
				else{
					console.log('wrong way');
				}
			}
			setTimeout(function () {
				document.getElementById('loading').style.display='none';}, 30000);

			function setFocus(){
				document.getElementById('fname').focus();
			}
		</script>
    </body>
</html>