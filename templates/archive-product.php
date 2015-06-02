<?php
/**
 * Archive
 *
 * Standard loop for the front-page
 */
 
 
get_header(); ?>

<div class="container article-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="archive-title">--Bootstrap Menu Buttons--</h2>
                 <?php $out = do_all_boxes();
                        echo $out; ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?> <!-- BEGIN of POST-->
                

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h3>
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s'), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <?php echo content(51); ?> <!-- 51 is number of symbol -->
                        <!-- Be carefull, use the_excerpt() instead if you need only text -->
                    </article>
                <?php endwhile; ?>  <!-- END of POST-->
            <?php endif; ?>
            <?php bootstrap_pagination(); ?> 
        </div><!-- END of .col-->
  
    </div><!-- END of .row -->
</div><!-- END of .container -->

<?php get_footer(); ?>