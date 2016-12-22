<?php
/**
 * Created by PhpStorm.
 * User: MinhMan.Tran
 */

function remove_menus(){

    remove_menu_page( 'edit.php?post_type=ait-ad-space' );
    remove_menu_page( 'edit.php?post_type=ait-event' );
    remove_menu_page( 'edit.php?post_type=ait-faq' );
    remove_menu_page( 'edit.php?post_type=ait-job-offer' );
    remove_menu_page( 'edit.php?post_type=ait-member' );
    remove_menu_page( 'edit.php?post_type=ait-partner' );
    remove_menu_page( 'edit.php?post_type=ait-portfolio-item' );
    remove_menu_page( 'edit.php?post_type=ait-price-table' );
    remove_menu_page( 'edit.php?post_type=ait-service-box' );
    remove_menu_page( 'edit.php?post_type=ait-testimonial' );
    remove_menu_page( 'edit.php?post_type=ait-toggle' );

}
add_action( 'admin_menu', 'remove_menus' );