jQuery(document).load(function(){
	jQuery('.ggf').each(function(){
		if(jQuery(this).attr('rel') == '85') 
		{ 
			jQuery(this).trigger('click');
		}
	});
});

jQuery(document).ready(function(){
	jQuery('.three-cols').autocolumnlist({columns: 3});
	
	jQuery('.news-holder .news-block:nth-child(3n)').addClass('last');
	jQuery('#aside .widget-container:last,.two-column .content .hentry:last').addClass('last');
	if(jQuery('.two-column .content').height()-jQuery('#aside').height()>70){
		jQuery('#wrapper .wp-pagenavi').css('backgroundColor','#ffffff');
	}

	// ==============================================================
	// MEDIA
	// ==============================================================
	jQuery('.media-filter li').click(function(e){
		var current = jQuery(this);
		var id      = current.find('a').attr('href');

		jQuery('.media-filter li').each(function(){
			jQuery(this).removeClass('active');
		});
		jQuery('.gallery-container .block').each(function(){
			jQuery(this).hide();
		});

		current.addClass('active');
		jQuery(id).show();
		e.preventDefault();
	});
	 
/*	jQuery('#slider').cycle({
			fx:'scrollHorz',
			timeout: 8000,
			prev:'#prev-slide',
			next:'#next-slide',
			after: function (curr, next, opts) { 
				if(opts.currSlide==0){
					jQuery('#prev-slide').parent().addClass('hidden');
				}
				else{jQuery('#prev-slide').parent().removeClass('hidden');}
				if(opts.currSlide==opts.slideCount-1){
					jQuery('#next-slide').parent().addClass('hidden');
				}
				if(opts.currSlide<opts.slideCount-1){
					jQuery('#next-slide').parent().removeClass('hidden');
				}
			}
		});
jQuery("#mycarousel").jcarousel({
        scroll: 3,
        initCallback: mycarousel_initCallback,
        buttonNextHTML: null,
        buttonPrevHTML: null
    });*/
	jQuery('.ggf').each(function(){
		if(jQuery(this).attr('rel') == '*')
		{
			jQuery(this).hide();	
		} 
	});
});

/*function mycarousel_initCallback(carousel) {
    

    jQuery('#news-next').bind('click', function() {
        carousel.next();
        return false;
    });

    jQuery('#news-prev').bind('click', function() {
        carousel.prev();
        return false;
    });
};*/