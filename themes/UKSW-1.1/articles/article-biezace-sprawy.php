<?php

    /**
     * Zbieranie newsów
     */
    $news_pagination = 1;

    if ($newsCount = wp_count_posts('post')->publish) {
        $news_pagination = ceil($newsCount/4);
    }

?>

<?php if ($newsCount): ?>

<article id="current-issues">

    <h1>Aktualności</h1>

    <div class="wrapper">
        <div class="news-container">
        </div>
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

        <a href="<%= link %>">
            <div class="news-item">
                <div class="row">
                    <div class="col-sm-3">
                        <img class="img-responsive" src="<%= image_thumb %>" alt="">
                    </div>
                    <div class="col-sm-6">

                        <h3><%= title %></h3>
                    </div>

                    <div class="col-sm-3">
                        <div class="date"><%= date %></div>
                    </div>

                </div>
            </div>
        </a>

    </script>

</article>

<?php endif;?>