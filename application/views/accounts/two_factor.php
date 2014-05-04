
			<div class="span9 mainContent">
				<h2>Two Factor Authentication</h2>
				
				<div class='well'>
					<?php if(isset($returnMessage)) echo '<div class="alert'.((isset($success) && $success == TRUE) ? 'alert-sucecss' : '').'">'.$returnMessage.'</div>'; ?>					
					
					<div class='row-fluid'>
						<div class='span2'><strong>Current Setting</strong></div>
						<div class='span4'><u><?php echo ($two_factor_setting == TRUE) ? 'Enabled' : 'Disabled'; ?></u></div>
					</div>
					<hr />
					
					<div class='row-fluid'>
						<div class='span6'>
							<div class='row-fluid'>
								<strong>Time-based Two Factor Tokens</strong>
								<?php if($two_factor['totp'] == TRUE) { ?>
								<div class='row-fluid'>
									You are currently using time based two-factor tokens to authorize logins. <br />

									<?php echo anchor('account/disable_2fa', 'Click here to disable this!', 'class="btn btn-danger"'); ?>
								</div>
								<?php } else { ?>
									
								<?php echo form_open('account/two_factor', array('class' => 'form-horizontal', 'name' => 'totp_form')); ?>	
									<div class='row-fluid'>
										<div class='span12'>Time-based two factor tokens are a way to restrict access to accounts by requiring a one time token to log in. Follow these two steps to get set up:<br /></div>
										<div class='span12'>1 - Scan the QR code to import it your app. Write down the secret key in case you lose your device.</div>
										<div class='span12' align='center'><img src='data:image/png;base64,<?php echo $qr; ?>'></div>
										<div class='span12' align='center'>Secret Key: <?php echo $secret; ?></div>
										<div class='span12'>2 - Enter the generated token and your password to confirm:</div>
									</div>
									<div class='row-fluid offset1'>
										<div class='row-fluid'>
											<div class='span6'><input type='password' class='span12' name='password' value='' placeholder='Password' autocomplete="off" /></div>
											<noscript><div style="display:none"><input type='hidden' name='js_disabled' value='1' /></div></noscript>
										</div>
										<div class='row-fluid'>
											<div class='span6'><input type='text' class='span12' name='totp_token' value='' placeholder='Token' /></div>
											<div class='span2'><input type='submit' class='btn' name='submit_totp_token' value='Setup' onClick='make_hash()'/></div>
										</div>
									</div>
									<?php echo form_error('totp_token'); ?>
								</form>
								<?php } ?>
							</div>
						</div>
						
						
						<div class='span6'>
							<div class='row-fluid'>
								<?php if(isset($two_factor['pgp'])) { ?><strong>PGP Two Factor Authentication</strong>
								<div class='row-fluid'>
									<?php if($two_factor['pgp'] == TRUE)  { ?>
								
								You are currently using PGP two-factor challences to authorize logins. <br />
								
								<?php echo anchor('account/disable_2fa', 'Click here to disable this!', 'class="btn btn-danger"'); ?>
									<?php } else { ?>
									<div class='span12'>PGP-based two factor challenges ensure that your account can only be accessed by someone able to decrypt messages encrypted with your PGP public key.</div>
									<div class='span12'><?php echo anchor('account/pgp_factor', 'Setup', 'class="btn"'); ?></div>
								
									<?php } ?>
								</div>
								<?php } else { ?>
								<i>Add a PGP key to enable PGP two factor authentication!</i>
								<?php } ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
