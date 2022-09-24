<?php
function add_embed()
{
    add_meta_box(
        'embed-0',
        'Add embeded',
        'myInput', //callback function
        'post', //audios, post, page
        'side',
        'high'
    );
}
add_action('admin_menu', 'add_embed');


function myInput()
{
    global $post;
    wp_nonce_field('embed', 'embed_nonce');
    $meta = get_post_meta($post->ID, 'embed', true);
    $embedCode = @isset($meta['embedCode']) ? @$meta['embedCode'] : '';
?>
    Video or Audio embed Code
    <textarea cols="30" rows="10" class="widefat" name="embed[embedCode]"><?php echo $embedCode; ?></textarea>
<?php
}

add_action('save_post', 'embed_save');
function embed_save($post_id)
{
    global $custom_meta_fields;
    if (!isset($_POST['embed_nonce']) || !wp_verify_nonce($_POST['embed_nonce'], 'embed'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    update_post_meta($post_id, 'embed', $_POST['embed']);
}

// add_action('bulk_edit_custom_box',  'add_embed', 10, 2);



