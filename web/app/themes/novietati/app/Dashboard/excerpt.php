<?php
function my_customize_meta_boxes()
{
    $posts = ['post', 'page'];

//Change post excerpt meta box title and contents
    remove_meta_box('postexcerpt', $posts, 'side');
    add_meta_box('postexcerpt', 'Excerpt', 'custom_post_excerpt_meta_box', $posts, 'normal', 'high');
    function custom_post_excerpt_meta_box($post)
    {
        ?>
<textarea rows="1" cols="40" name="excerpt" required id="excerpt"><?php echo $post->post_excerpt; // textarea_escaped            ?></textarea>
    <p>
	Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a target="_blank" href="https://wordpress.org/support/article/excerpt/">Learn more about manual excerpts</a>.</p>
<?php
}

}
add_action('add_meta_boxes', 'my_customize_meta_boxes');