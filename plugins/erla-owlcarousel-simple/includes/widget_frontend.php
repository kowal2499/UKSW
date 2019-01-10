<?php
    $items = array(1451, 1452, 1454, 1453, 1455, 1456);
?>

<div class="eoc-wrapper">
    
    <div class="owl-carousel" id="owl-simple">

        <?php foreach ($items as $item): ?>
            <div><img src='<?= wp_get_attachment_url($item); ?>'></div>
        <?php endforeach; ?>

    </div>
</div>


<script>
		jQuery(document).ready(function(){
		  jQuery("<?= "#owl-simple"; ?>").owlCarousel(
		  	{
		  		items: 1,
				autoplay: true,
				autoplayTimeout: 4500,
				autoplayHoverPause: false,
				loop: true,
				animateOut: 'fadeOut'
		  	});
		});
	</script>