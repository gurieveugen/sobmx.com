<?php

/**

 * Template Name: page Contact

 * @package WordPress

 * @subpackage Base_Theme

 */

?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

		<div id="content" role="main" class="content-contact">

			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>



<?php if ( have_posts() ) : the_post(); ?>



			<h1 class="entry-title"><span><em><?php the_title(); ?></em></span></h1>

			<div class="contact-holder entry-content">

				<div class="container">					

					<?php the_content();?>

					<?php /* ?>

					<div class="form-contact">

					<?php echo do_shortcode('[contact-form-7 id="114" title="CONTACT"]');?>

					

						<form action="#">

							<fieldset>

								<div class="row">

									<input type="text" value="Name *" />

								</div>

								<div class="row">

									<input type="text" value="E-mail *" />

								</div>

								<div class="row">

									<input type="text" value="Subject" />

								</div>

								<div class="row">

									<textarea cols="30" rows="10">Message</textarea>

								</div>

								<div class="row">

									<input type="submit" value="Send Message" class="btn-contact"/>

								</div>

							</fieldset>

						</form>											

					</div>

					<?php */ ?>

				</div>

				<div class="column-contact">				

				<?php dynamic_sidebar( 'contact-sidebar' ); ?>

					<?php /*

					<div class="block">

						<h3>Address</h3>

						<h4>SOBMX Training Facility </h4>

						<address>South of the Border <br /> 3346 Highway 301 North <br /> Hamer, SC 29547</address>

						<a href="#">+ Get Directions</a>

					</div>

					<div class="block">

						<h3>Contact Information</h3>

						<p>Phone:  919-593-0400 <br /> Phone:  919-593-0400 <br /> <a href="mailto:info@sobmx.com">info@sobmx.com</a></p>

						<ul class="socials">

							<li>

								<a href="#" class="twitter">Twitter</a>

							</li>

							<li>

								<a href="#" class="facebook">Facebook</a>

							</li>

						</ul>

					</div>

					<div class="block">

						<h3>Reservations</h3>

						<p>South Of The Border Motor Inn Phone: 800-845-6011</p>

					</div>

					*/?>

				</div>

			</div>

			<script type="text/javascript">

			jQuery(document).ready(function(){

				jQuery("#submit").click(function(){

					alert('!!!');

				});

			});

			</script>				



<?php endif; ?>



		</div>





<?php get_footer(); ?>

