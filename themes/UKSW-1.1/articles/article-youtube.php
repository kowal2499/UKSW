
	<?php

		$database = array(
            '<iframe width="80%" height="300px" src="https://www.youtube.com/embed/wxaE2dnozbs" frameborder="0" allowfullscreen></iframe>',
			'<iframe width="80%" height="300px" src="https://www.youtube.com/embed/EOyAxI-rqXI" frameborder="0" allowfullscreen></iframe>',
			'<iframe width="80%" height="300px" src="https://www.youtube.com/embed/-vpushruU80" frameborder="0" allowfullscreen></iframe>',
			'<iframe width="80%" height="300px" src="https://www.youtube.com/embed/0kKJ2SinEbM" frameborder="0" allowfullscreen></iframe>',
			'<iframe width="80%" height="300px" src="https://www.youtube.com/embed/UcRERk-dGXs" frameborder="0" allowfullscreen></iframe>',
			); 
	?>


	<?php foreach ($database as $row) : ?>
		<div class="row">
			<?php echo "$row";?>
		</div>
	<?php endforeach; ?>
