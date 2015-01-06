<?php
/**
 * @package sparkling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blog-item-wrap">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
        <?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?>
      </a>
    <div class="post-inner-content">
      <header class="entry-header page-header">

        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <?php if ( 'post' == get_post_type() ) : ?>

          <div class="entry-meta">

            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'sparkling' ) );
            if ( $categories_list && sparkling_categorized_blog() ) :
              ?>
              <span class="cat-links"><i class="fa fa-folder-open-o"></i>
                <?php printf( __( ' %1$s', 'sparkling' ), $categories_list ); ?>
              </span>
            <?php endif; // End if categories ?>

            <?php sparkling_posted_on(); ?>

            <?php edit_post_link( __( 'Edit', 'sparkling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

          </div><!-- .entry-meta -->

        <?php endif; ?>
      </header><!-- .entry-header -->

      <div class="entry-content">

          <?php the_excerpt(); ?>

        <?php
          wp_link_pages( array(
            'before'            => '<div class="page-links">'.__( 'Pages:', 'sparkling' ),
            'after'             => '</div>',
            'link_before'       => '<span>',
            'link_after'        => '</span>',
            'pagelink'          => '%',
            'echo'              => 1
              ) );
          ?>
      </div><!-- .entry-content -->

      <div class="entry-meta">

        <?php if(has_tag()) : ?>
          <!-- tags -->
          <div class="tagcloud">

            <?php
            $tags = get_the_tags(get_the_ID());
            foreach($tags as $tag){
              echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a> ';
            } ?>

          </div>
          <!-- end tags -->
        <?php endif; ?>

      </div><!-- .entry-meta -->

    </div>
  </div>
</article><!-- #post-## -->
