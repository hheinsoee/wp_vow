<form class="d-flex" action="/" method="get">
    <!-- <input type="hidden" name="post_type" value="post"> -->
    <input value="<?php the_search_query(); ?>" class="form-control me-2 glass" type="search" placeholder="Search" aria-label="Search" name="s">
    <button class="btn bg-primary text-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>