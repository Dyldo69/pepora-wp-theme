<?php
/**
 * Default fallback template
 * WordPress requires this file to exist.
 */
get_header();
?>

<section class="section bg-gun">
  <div class="container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article style="margin-bottom:2rem;">
          <h2><a href="<?php the_permalink(); ?>" style="color:#fff;text-decoration:none;"><?php the_title(); ?></a></h2>
          <div style="color:rgba(255,255,255,0.6);margin-top:0.5rem;"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p style="color:rgba(255,255,255,0.6);">No content found.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
