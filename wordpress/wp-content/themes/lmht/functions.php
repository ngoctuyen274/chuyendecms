<?php 

// styles
function my_styles(){
    wp_enqueue_style("bootstrap",'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
    wp_enqueue_style("main-style", get_template_directory_uri() . '/style.css', array(), '5.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'my_styles');

// scripts
function my_scripts(){
    wp_enqueue_script("js-boostrap",'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG');
    wp_enqueue_script("js-bootstrap", 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous');
}
add_action("wp_enqueue_scripts",'my_scripts');