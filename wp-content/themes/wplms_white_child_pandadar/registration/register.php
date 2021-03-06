<?php 

if ( !defined( 'ABSPATH' ) ) exit;
$id = vibe_get_bp_page_id('register');

$site_lock = vibe_get_option('site_lock');
if(!empty($site_lock)){
	include_once(get_template_directory()."/login-page.php");  
	exit;
}

get_header( vibe_get_header() ); 
?>

<section id="content">
	<div class="<?php echo vibe_get_container(); ?>">
        
		<div class="col-md-3 col-sm-1"></div>
		<div class="col-md-6 col-sm-10 col-xs-12">
		
		<div class="content padder">

		<?php do_action( 'bp_before_register_page' ); ?>

		<div class="page" id="register-page">

			<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

			<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_disabled' ); ?>

					<p><?php _e( 'User registration is currently not allowed.', 'vibe' ); ?></p>

				<?php do_action( 'bp_after_registration_disabled' ); ?>
			<?php endif; // registration-disabled signup setp ?>

			<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

				<h2><?php echo get_the_title($id); ?></h2>

				<?php do_action( 'template_notices' ); ?>

				<p><?php the_sub_title($id); ?></p>

				<?php do_action( 'bp_before_account_details_fields' ); ?>

				<div class="register-section" id="basic-details-section">

					<?php /***** Basic Account Details ******/ ?>

					<div class="editfield">
					<label for="signup_username"><?php _e( 'Username', 'vibe' ); ?> <?php _e( '*', 'vibe' ); ?></label>
					<?php do_action( 'bp_signup_username_errors' ); ?>
					<input type="text" name="signup_username" id="signup_username" class="form_field" value="<?php bp_signup_username_value(); ?>" />
					</div>
					<div class="editfield">
					<label for="signup_email"><?php _e( 'Email Address', 'vibe' ); ?> <?php _e( '*', 'vibe' ); ?></label>
					<?php do_action( 'bp_signup_email_errors' ); ?>
					<input type="text" name="signup_email" id="signup_email"  class="form_field" value="<?php bp_signup_email_value(); ?>" />
					</div>
					<div class="editfield">
					<label for="signup_password"><?php _e( 'Password', 'vibe' ); ?> <?php _e( '*', 'vibe' ); ?></label>
					<?php do_action( 'bp_signup_password_errors' ); ?>
					<input type="password" name="signup_password" class="form_field" id="signup_password" value="" />
					</div>
					<div class="editfield">
					<label for="signup_password_confirm"><?php _e( 'Confirm', 'vibe' ); ?> <?php _e( '*', 'vibe' ); ?></label>
					<?php do_action( 'bp_signup_password_confirm_errors' ); ?>
					<input type="password" name="signup_password_confirm" class="form_field" id="signup_password_confirm" value="" />
					</div>
					<?php do_action( 'bp_account_details_fields' ); ?>

				</div><!-- #basic-details-section -->

				<?php do_action( 'bp_after_account_details_fields' ); ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if ( bp_is_active( 'xprofile' ) ) : ?>

					<?php do_action( 'bp_before_signup_profile_fields' ); ?>

					<div class="register-section" id="profile-details-section">


						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
						<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<div class="editfield">

								<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '*', 'vibe' ); ?><?php endif; ?></label>
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<input type="text" name="<?php bp_the_profile_field_input_name(); ?>"  class="form_field" id="<?php bp_the_profile_field_input_name(); ?>" value="<?php bp_the_profile_field_edit_value(); ?>" />

								<?php endif; ?>
								<?php if ( 'number' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<input type="number" name="<?php bp_the_profile_field_input_name(); ?>"  class="form_field" id="<?php bp_the_profile_field_input_name(); ?>" value="<?php bp_the_profile_field_edit_value(); ?>" />

								<?php endif; ?>
								<?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_edit_value(); ?></textarea>

								<?php endif; ?>

								<?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>">
										<?php bp_the_profile_field_options(); ?>
									</select>

								<?php endif; ?>

								<?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" multiple="multiple">
										<?php bp_the_profile_field_options(); ?>
									</select>

								<?php endif; ?>

								<?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>

									<div class="radio">
										<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
										
										<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
										<?php bp_the_profile_field_options(); ?>

										<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
											<a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'vibe' ); ?></a>
										<?php endif; ?>
									</div>

								<?php endif; ?>

								<?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>

									<div class="checkbox">
										<span class="label"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></span>

										<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
										<?php bp_the_profile_field_options(); ?>
									</div>

								<?php endif; ?>

								<?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>

									<div class="datebox">
										<label for="<?php bp_the_profile_field_input_name(); ?>_day"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'vibe' ); ?><?php endif; ?></label>
										<?php do_action( bp_get_the_profile_field_errors_action() ); ?>

										<select name="<?php bp_the_profile_field_input_name(); ?>_day" id="<?php bp_the_profile_field_input_name(); ?>_day">
											<?php bp_the_profile_field_options( 'type=day' ); ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name(); ?>_month" id="<?php bp_the_profile_field_input_name(); ?>_month">
											<?php bp_the_profile_field_options( 'type=month' ); ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name(); ?>_year" id="<?php bp_the_profile_field_input_name(); ?>_year">
											<?php bp_the_profile_field_options( 'type=year' ); ?>
										</select>
									</div>

								<?php endif; ?>

								<?php do_action( 'bp_custom_profile_edit_fields_pre_visibility' ); ?>

								<?php do_action( 'bp_custom_profile_edit_fields' ); ?>
							</div>

						<?php endwhile; ?>

						<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids(); ?>" />

						<?php endwhile; endif; endif; ?>

						<?php do_action( 'bp_signup_profile_fields' ); ?>

					</div><!-- #profile-details-section -->

					<?php do_action( 'bp_after_signup_profile_fields' ); ?>

				<?php endif; ?>


				<?php do_action( 'bp_before_registration_submit_buttons' ); ?>

				<div class="register-section submit">
					<input type="submit" name="signup_submit" id="signup_submit" value="<?php _e( 'Complete Sign Up', 'vibe' ); ?>" />
				</div>

				<?php do_action( 'bp_after_registration_submit_buttons' ); ?>

				<?php wp_nonce_field( 'bp_new_signup' ); ?>

			<?php endif; // request-details signup step ?>

			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

				<h2><?php _e( 'Check Your Email To Activate Your Account!', 'vibe' ); ?></h2>

				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_confirmed' ); ?>

				<?php if ( bp_registration_needs_activation() ) : ?>
					<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'vibe' ); ?></p>
				<?php else : ?>
					<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'vibe' ); ?></p>
				<?php endif; ?>

				<?php do_action( 'bp_after_registration_confirmed' ); ?>

			<?php endif; // completed-confirmation signup step ?>

			<?php do_action( 'bp_custom_signup_steps' ); ?>

			</form>

		</div>

		<?php do_action( 'bp_after_register_page' ); ?>

		</div><!-- .padder -->
		</div>
		<div class="col-md-3 col-sm-4">
			<div class="sidebar">
			<?php
		 		$sidebar = apply_filters('wplms_sidebar','buddypress',$id);
                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
           	<?php endif; ?>
			</div>
		</div>
	</div>	
</section><!-- #content -->
	<script type="text/javascript">
		jQuery(document).ready( function() {
			if ( jQuery('div#blog-details').length && !jQuery('div#blog-details').hasClass('show') )
				jQuery('div#blog-details').toggle();

			jQuery( 'input#signup_with_blog' ).click( function() {
				jQuery('div#blog-details').fadeOut().toggle();
			});
		});
	</script>

<?php get_footer( vibe_get_footer() );  
