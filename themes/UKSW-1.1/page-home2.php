<?php
/*
	Template name: Home Page New Hope
*/

$sentences = include_once 'classes/sentences.php';

// losowanie cytatu z PŚ
if (count((array)$sentences) > 1) {
    $sentence = $sentences[rand(0, count((array)$sentences)-1)];
}

get_header();

?>

        <div class="row backstage-pattern">

            <div class="col-md-6">

                <section class="welcome-screen">
                    <?php do_shortcode('[eoc-simple]'); ?>
                    <div class="logo"><img src="<?php echo get_template_directory_uri() . '/assets/imgs/jmn.jpg'; ?>" alt=""></div>
                    <?php if ($sentence): ?>
                        <div class="sentence">
                            <?php echo $sentence; ?>
                        </div>
                    <?php endif; ?>
                </section>

            </div>

            <div class="col-md-6">

                <section class="tabbed-content">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#">Wspólnoty</a></li>
                        <li><a href="#">Diakonie</a></li>
                        <li><a href="#">Pogłębienie</a></li>
                    </ul>
                </section>

            </div>


        </div><!-- row -->

        <div class="row backstage-pattern">
            test
        </div>


    </div><!-- container -->

<?php get_footer(); ?>
