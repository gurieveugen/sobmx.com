<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

			</div>
		</div>
	</div>	
</div>


<div id="footer">
	<div class="footer-holder">
		<div class="container">
			<div class="footer-section">
				<span class="pedro-icon"></span>
				<div class="form-touch">
                    <?php if ( is_active_sidebar('footer-sidebar') ) : ?>                    
                    	<?php dynamic_sidebar( 'footer-sidebar' ); ?>                    
                    <?php endif; ?>
				<?php //echo do_shortcode('[contact-form-7 id="88" title="GET IN TOUCH"]'); ?>	
				</div>
				<div class="frame">
				<?php
				$LITTLE_ABOUT_US = get_page_by_path('little-about-us');
				if(!empty($LITTLE_ABOUT_US)){
					$lau_content = apply_filters('the_content', $LITTLE_ABOUT_US->post_content);
					$lau_content = str_replace(']]>', ']]&gt;', $lau_content);					
				?>
					<h3><?php echo $LITTLE_ABOUT_US->post_title;?></h3>
				<?php echo $lau_content; ?>
				<?php }?>
				</div>
			</div>
			<div class="footer-block">
				<a href="#" class="btn-top">top</a>
				<p>Copyright &copy; 2012 SOBX. All rights reserved.</p>
			</div>
			<div class="footer-area">
				<div class="cell">
					<ul class="soc-list">
						<li><a href="http://instagram.com/sobmx" class="instagram">instagram</a></li>
						<li><a href="http://twitter.com/SOBMOTO" class="twitter">twitter</a></li>
						<li><a href="http://www.facebook.com/pages/South-of-the-Border-MX/193828487371162" class="link-facebook">Facebook</a></li>
						<li><a href="http://www.sobmx.com/feed" class="link-sub">Subscribe</a></li>
					</ul>
					<div class="box">
						<span>website design by <strong><a title="Myrtle Beach Website Design" href="http://www.inkhaus.com">INKHAUS</a></strong></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery(".coming-soon a").fancybox({ 'showCloseButton' : false, 'titlePosition' : 'inside', 'titleFormat' : formatTitle, 'href': '#coming-soon' });			
			jQuery("a.coming-soon").fancybox({ 'showCloseButton' : false, 'titlePosition' : 'inside', 'titleFormat' : formatTitle, 'href': '#coming-soon' });			
		});
		function formatTitle(title, currentArray, currentIndex, currentOpts) {
			return '<div id="lightbox-style-title"><span><a href="javascript:;" onclick="jQuery.fancybox.close();"><img src="<?php bloginfo('template_url'); ?>/images/closelabel.gif" /></a></span><br><br></div>';
		}
		</script>
<div style="display:none">
	<div class="coming-box">
		<div class="coming-box " id="coming-soon">
			<div class="container">
				<div class="small-logo"></div>
				<address>3346 Highway 301 North  |  Hamer, SC 29547</address>
				<strong class="comming-text">Coming Soon</strong>
				<div class="content-box">
					<h3>WANT AN INVITE?</h3>
					<p>We are currently developing this page, please register to receive notice of our launch and other great stuff that happens here. *We respect your privacy.</p>
				</div>
				<?php /*
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
				</form> */
				echo do_shortcode('[contact-form-7 id="245" title="NOTIFY ME"]');
				?></div>
		</div>
	</div>	
</div>
</body>
</html>
