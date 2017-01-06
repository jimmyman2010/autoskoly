<?php
/**
 * Created by PhpStorm.
 * User: MinhMan.Tran
 * Date: 1/3/2017
 * Time: 4:36 PM
 */

add_filter('manage_ait-item_columns', 'my_ait_item_columns');
function my_ait_item_columns($columns) {
    $columns['slices'] =__('Slices','myplugindomain');
    return $columns;
}