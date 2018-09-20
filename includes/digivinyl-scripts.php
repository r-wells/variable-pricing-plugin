<?php 

function digivinyl_frontend_styles() {

    wp_enqueue_style(
        'digivinyl-styles',
        WPPLUGIN_URL . 'assets/css/digivinyl-styles.css',
        [],
        time()
    );

}
add_action( 'wp_enqueue_scripts', 'digivinyl_frontend_styles', 10 );

function digivinyl_frontend_scripts() {

    wp_enqueue_script(
        'digivinyl-scripts',
        WPPLUGIN_URL . 'assets/js/digivinyl-scripts.js',
        ['jquery'],
        time()
    );

}
add_action( 'wp_enqueue_scripts', 'digivinyl_frontend_scripts', 10 );

// add_action( 'wp_ajax_digivinyl_frontend_ajax', 'digivinyl_frontend_ajax', 10 );
// add_action( 'wp_ajax_nopriv_digivinyl_frontend_ajax', 'digivinyl_frontend_ajax', 10 );
// function digivinyl_frontend_ajax() {

//     wp_enqueue_script(
//         'ajax',
//         WPPLUGIN_URL . 'assets/js/ajax.js',
//         ['jquery'],
//         time()
//     );

// }

?>