<?php
/*
	Template name: Home Page New Hope
*/

const activityCategories = [
    [
        'name' => 'Wspólnoty',
        'slug'  => 'wspolnoty',
        'color' => '#f76a0c',
        'href' => 'wspolnoty'
    ],
    [
        'name' => 'Diakonie',
        'slug'  => 'diakonie',
        'color' => '#004e89',
        'href' => 'diakonie'
    ],
    [
        'name' => 'Pogłębienie',
        'slug'  => 'poglebienie',
        'color' => '#C01D2E',
        'href' => 'poglebienie'
    ],
];

$sentences = include_once 'classes/sentences.php';

// losowanie cytatu z PŚ
if (count((array)$sentences) > 1) {
    $sentence = $sentences[rand(0, count((array)$sentences)-1)];
}

require_once get_template_directory() . '/classes/custompost.php';
require_once get_template_directory() . '/classes/activity.php';

/**
 * Zbieranie aktywności
 */
$activities = cpt\Activity::getInstance()->findAll();

/**
 * Zbieranie newsów
 */
$news_pagination = 1;

if ($newsCount = wp_count_posts('post')->publish) {
    $news_pagination = ceil($newsCount/4);
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
        </div><!-- row -->

        <?php if ($newsCount): ?>
            <div class="row backstage-pattern">
                <div class="col-md-12">
                    <section class="row-content" id="news-section">

                        <div class="section-title">
                            <h2>Aktualności</h2>
                        </div>

                        <div class="wrapper">

                            <div class="news-container"></div>

                            <div class="loading" style="display: none">
                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                <span class="sr-only">Loading...</span>
                            </div>

                        </div>

                        <nav class="news-navigation">
                            <?php wp_nonce_field('uksw_news_navigation'); ?>
                            <ul class="pager">
                                <li class="previous <?php echo 'hidden'; ?>" data-goto="1"><a href="#" class="btn btn-default"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></li>
                                <li class="next <?php echo $news_pagination > 1 ? '' : 'hidden'; ?>" data-goto=2><a href="#" class="btn btn-default"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>

                        <script type="text/template" id="js-news-navigation-template">
                            <div class="news-item">
                                <a href="<%= link %>" style="<%= image_css %>">
                                    <div class="blend">
                                        <div class="date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> <%= date %>
                                        </div>
                                        <div class="title">
                                            <h3><%= title %></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </script>

                    </section>
                </div>
            </div>
        <?php endif; ?>

        <div class="row backstage-pattern">
            <div class="col-md-12">

                <section class="row-content">
                    <ul class="nav nav-pills nav-justified">
                        <?php
                            foreach (activityCategories as $id => $activity) {
                                echo '<li' . ($id === 0 ? ' class="active"' : ''). '><a data-toggle="tab" href="#' . $activity['href'] .'" style="color: '. $activity['color'] . '">'. $activity['name'] . '</a></li>';
                            }
                        ?>
                    </ul>


                    <div class="tab-content">

                        <?php foreach (activityCategories as $id => $category): ?>

                            <div id="<?php echo $category['href']; ?>" class="tab-pane fade <?php echo ($id === 0 ? 'active in' : ''); ?>">
                                <div class="tab-container">
                                    <?php foreach ($activities as $activity): ?>
                                        <?php if (in_array($category['slug'], $activity['category'])): ?>
                                            <?php $id = $activity['id']; ?>

                                            <div class="tile">
                                                <a href="<?php echo get_permalink($id); ?>">

                                                    <?php echo get_the_post_thumbnail($id, 'post-thumbnail'); ?>
                                                    <div class="title" style="background-color: <?php echo $category['color']; ?>">
                                                        <?php echo get_the_title($id); ?>
                                                    </div>
                                                </a>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </section>

            </div>
        </div>


    </div><!-- container -->

<?php get_footer(); ?>
