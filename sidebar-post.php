<?php
if ( is_active_sidebar( 'common-side-top-widget-area' ) )
  dynamic_sidebar( 'common-side-top-widget-area' );

// Display post type widget area
$widdget_area_name = 'post-side-widget-area';
if ( is_active_sidebar( $widdget_area_name ) ){
  dynamic_sidebar( $widdget_area_name );
} else { ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$post_loop = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => 10,
) ); ?>
<?php if ($post_loop->have_posts()) : ?>
<aside class="widget">
<h1 class="subSection-title"><?php echo __('Recent posts', 'bvII');?></h1>
<?php while ( $post_loop->have_posts() ) : $post_loop->the_post();?>
<?php get_template_part('module_post__subLoop_item'); ?>
<?php endwhile;?>
</aside>
<?php endif; ?>

<aside class="widget widget_categories">
<nav class="localNav">
<h1 class="subSection-title"><?php _e('Category', 'bvII');?></h1>
<ul>
  <?php wp_list_categories('title_li='); ?> 
</ul>
</nav>
</aside>

<aside class="widget widget_archive">
<nav class="localNav">
<h1 class="subSection-title"><?php _e('Archive', 'bvII');?></h1>
<ul>
  <?php
  $args = array(
    'type' => 'monthly',
    'post_type' => 'post',
    );
  wp_get_archives($args); ?>
</ul>
</nav>
</aside>

<?php 
}

if ( is_active_sidebar( 'common-side-bottom-widget-area' ) )
  dynamic_sidebar( 'common-side-bottom-widget-area' );