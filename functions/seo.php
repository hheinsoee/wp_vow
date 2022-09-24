<?php
function heinseo()
{
    // Post object if needed
    // global $post;

    // Page conditional if needed
    // if( is_page() ){}
    if (is_front_page() || is_home()) {
        $title = get_bloginfo('name');;
        $description = get_bloginfo('description');;
    } else {
        $title = get_the_title();
        $description = get_the_excerpt();
    };

    $url = esc_url(get_permalink());
    $img = get_the_post_thumbnail_url();

    // KEYWORD GENERATER ///////////////
    $keywords = [];
    if (get_post_meta(get_the_id(), 'seo', true)) {
        $seoMeta = get_post_meta(get_the_id(), 'seo', true);
        $keywords[] = $seoMeta['keywords'];
    };
    if (get_the_tags(get_the_id())) {
        $post_tags = get_the_tags(get_the_ID());
        foreach ($post_tags as $t) {
            $tag = get_category($t);
            $keywords[] = $tag->name;
            $keywords[] = $tag->slug;
        }
    };
    $keywords = implode(",", $keywords);
    //////////////////KEYWORDS END///////////////
?>
    <title><?php echo is_front_page() ? bloginfo('name') . ' ' . bloginfo('description') : $title; ?></title>
    <!-- kiunk -->
    <link rel="canonical" href=<?php $url; ?> />

    <!-- meta data -->
    <meta name="description" content="<?php echo $description; ?>" />

    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <!-- open graph -->
    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo $img; ?>" />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />


    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:url" content="<?php echo $url; ?>" />


    <!-- twitter -->
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php echo $description; ?>" />
    <meta name="twitter:url" content="<?php echo $url; ?>" />
    <meta name="twitter:image" content="<?php echo $img; ?>" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- vefifying & contact-->
    <!-- <meta name="facebook-domain-verification" content=""/>
<meta property="fb:app_id" content="2824369061207392" />
<meta property="fb:pages" content="100623981381289" /> -->
<?php

}
add_action('wp_head', 'heinseo');
