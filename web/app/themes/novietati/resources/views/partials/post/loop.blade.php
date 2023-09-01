<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
$args = array(
    'paged' => $paged,
    'page' => $paged,
    'posts_per_page' => get_option('posts_per_page'),
);  

if(is_category()){
    $args['cat'] = get_current_cat_ID();
}elseif (is_author()) {
    $args['author'] = get_user_by( 'slug', get_query_var( 'author_name' ) )->ID;
}

// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ) {
    echo '<section class="post-loop container  align-start grid md:grid-cols-2 lg:grid-cols-4 mb-28 gap-5 ">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo Roots\view('partials.post.loop-item');
    }

    echo '</section>';
    pagination($the_query->max_num_pages, $paged);
} 

/* Restore original Post Data */
wp_reset_postdata();