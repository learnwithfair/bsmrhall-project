<?php $check_search_data = 0;

if ( isset( $_POST['r_search_btn'] ) ) {

    $check_search_datas = $obj->display_r_data_by_search( $_POST );

    if ( !$check_search_datas ) {
        $check_search_data = 0;
        $r_data            = $obj->pagi_residential_info( $start, $per_page );
    } elseif ( !mysqli_fetch_assoc( $check_search_datas ) ) {
        $r_numbers                  = 1;
        $r_item_display_pegi_number = ceil( $r_numbers / $per_page );
        $check_search_data          = 1;
        $r_data                     = $obj->display_r_data_by_search( $_POST );
    } else {
        $r_numbers                  = 1;
        $r_item_display_pegi_number = ceil( $r_numbers / $per_page );
        $r_data                     = $obj->display_r_data_by_search( $_POST );
    }

}

?>