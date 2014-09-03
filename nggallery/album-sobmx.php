<?php 
/**
Template Page for the album overview (extended)

Follow variables are useable :

	$album     	 : Contain information about the album
	$galleries   : Contain all galleries inside this album
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($galleries)) : ?>
<?php
    $ngg_options['galSort'] = ($ngg_options['galSort']) ? $ngg_options['galSort'] : 'pid';
    $ngg_options['galSortDir'] = ($ngg_options['galSortDir'] == 'DESC') ? 'DESC' : 'ASC';
?>	

<div class="gallery-list">	
	<!-- List of galleries -->
	<?php foreach ($galleries as $gallery) : ?>
<?php
/*
echo '<!--<pre>';
print_r($gallery);	
echo '</pre>-->';	
*/
?>	
	<?php
		$picturelist = nggdb::get_gallery($gallery->gid, $ngg_options['galSort'], $ngg_options['galSortDir']);
		$pic_pull = '';
		if(!empty($picturelist)){			
			foreach($picturelist as $pic){
				if($pic->pid == $gallery->previewpic){
					if(empty($gallery->pageid)){						
						$gallery_url = $gallery->pagelink; //$pic->imageURL;
						$gallery_url = str_replace('media', 'photo-gallery', $gallery_url);
					}else{
						$gallery_url = get_permalink($gallery->pageid);
					}
				}else{
					$pic_pull .= '<a href="'.$pic->imageURL.'" rel="'.$gallery->slug.'" class="photo-gallery">&nbsp;</a>';
				}	
			}
		}
	?>
	
	<div class="ngg">
		
			<div class="ngg-albumcontent">
				<div class="img">
					<a href="<?php echo $gallery_url; ?>" rel="<?php echo $gallery->slug;?>" class="photo-gallery"><img class="Thumb" alt="<?php echo $gallery->title ?>" src="<?php echo $gallery->previewurl ?>"/></a>
				</div>
				<div class="ngg-description">
					<h4><a href="<?php echo $gallery_url; ?>"><?php echo $gallery->title ?></a></h4>
					<p><?php echo $gallery->galdesc ?></p>
			</div>
		</div>
	</div>
	<?php if(!empty($pic_pull)){ echo '<div style="display:none">'.$pic_pull.'</div>'; } ?>
	
 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>