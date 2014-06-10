  <?php
  /*
  Template Name: "Buzz" page
  */

  get_header(); ?>

    <div class="general-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>
              <?php
                  if ( have_posts() ) : while( have_posts() ) : the_post(); the_title(); endwhile; endif;
              ?>
            </h1>
            <h2>Page description</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-8" id="main">
          <div id="recent-blog"></div>
        </div>
        <div class="col-md-4" id="sidebar">
          <div id="sidebar-container">
            <div>
              <?php if ( dynamic_sidebar('hive-spotlight') ) : else : endif; ?>
            </div>
            <!-- Twitter feed #HiveBuzz -->
            <a class="twitter-timeline" href="https://twitter.com/search?q=%23HiveBuzz" data-widget-id="475056322170216448">Tweets about "#HiveBuzz"</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </div>
        </div>
      </div>
    </div>

</div> <!-- closing #wrap -->

<script>
  // sample code taken from http://designshack.net/articles/javascript/build-an-automated-rss-feed-list-with-jquery/
  var planetHiveRSS = "http://planet.hivelearningnetworks.org/rss";
  $.ajax({
    url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(planetHiveRSS),
    dataType: 'json',
    success: function(data) {
      $.each(data.responseData.feed.entries.slice(0,10), function(key, value){
          var thehtml = '<a href="'+value.link+'" target="_blank">'+value.title+'</a><br />';
          $("#recent-blog").append(thehtml);
      });
    }
  });
</script>

<?php get_footer(); ?>