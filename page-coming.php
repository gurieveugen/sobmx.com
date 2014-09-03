<?php
/**
 * Template Name: page Coming
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

	<div class="coming-box">
		<div class="container">
			<div class="small-logo"></div>
			<address>3346 Highway 301 North  |  Hamer, SC 29547</address>
			<strong class="comming-text">Coming Soon</strong>
			<div class="content-box">
				<h3>WANT AN INVITE?</h3>
				<p>We are currently developing this page, please register to receive notice of our launch and other great stuff that happens here. *We respect your privacy.</p>
			</div>
			<form action="#">
				<fieldset>
					<div class="row">
						<label for="lbl01">Enter your email</label>
						<input id="lbl01" type="text" value="" />
					</div>
					<div class="btn-holder">
						<input type="submit" value="NOTIFY ME" class="btn-post"/>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="bottom">
			<a href="#" class="btn-close">close</a>
		</div>
	</div>


<?php get_footer(); ?>
