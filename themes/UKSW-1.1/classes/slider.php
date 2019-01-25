<?php
$items = ['001.jpg', '002.jpg', '003.jpg', '004.jpg', '005.jpg'];
?>

<div class="eoc-wrapper">
    <div class="owl-carousel" id="owl-simple">

        <?php foreach ($items as $item): ?>
            <div class="uksw-slide" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/slider/' . $item; ?>')"></div>
        <?php endforeach; ?>

    </div>
</div>

