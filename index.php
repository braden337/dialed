<?php get_header(); ?>


<?php if (is_front_page()) :?>
  
<div class="jumbotron">
  <div class="container">
    <!-- <h1>His 956 Facility</h1> -->
    <h1>2016 MX Camps</h1>
    <p><span class="yellow">Oct 29-30 &amp; Dec 27-28</span></p>
    <p><a class="btn btn-primary btn-lg" href="/mx-camp/" role="button">Reserve your spot!</a></p>
  </div>
</div>

<?php else: ?>

  <div id="top-img" class="container-fluid">
    <div class="col-xs-12">
      <h2><?php the_title(); ?></h2>
    </div>
  </div>

<?php endif; ?>

<div id="site-content" class="container-fluid">

    <article class="col-xs-12<?php echo (is_front_page() ? ' col-md-8' : ''); ?>">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <?php if (is_front_page()): ?>
        <h2><?php the_title() ?></h2>
      <?php endif; ?>
      
      <?php the_content(); ?>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
    </article>
    <?php if (is_front_page()) : ?>
      <div class="col-xs-12 col-md-4">
        
        <div id="sidebar">
          <!-- <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Location</h3>
            </div>
            <div class="panel-body">
              <a href="https://goo.gl/maps/XZ5EpVuhzC22" target="_blank"><p>573 County Road 3525<br>Paradise, Texas<br>76073, USA</p></a>
            </div>
          </div> -->
          <?php dynamic_sidebar( 'The Sidebar' ); ?>
        </div>

      </div>
    <?php endif; ?>
</div> <!-- #site-content.container-fluid -->


<?php get_footer(); ?>