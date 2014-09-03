jQuery(document).ready(function(){
	jQuery('.three-cols').autocolumnlist({columns: 3});
	
	jQuery('.news-holder .news-block:nth-child(3n)').addClass('last');
	jQuery('#aside .widget-container:last,.two-column .content .hentry:last').addClass('last');
	if(jQuery('.two-column .content').height()-jQuery('#aside').height()>70){
		jQuery('#wrapper .wp-pagenavi').css('backgroundColor','#ffffff');
	}
	 
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