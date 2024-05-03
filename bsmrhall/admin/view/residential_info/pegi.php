<div class="page-navigation">
    <div class="container">
        <div class="row">
            <!-- Featred Page End Here -->
            <?php if ( $r_numbers > $per_page ) {?>
            <br>
            <div class="col-md-12">
                <ul>
                    <?php
                    if ( $Previous == $r_item_display_pegi_number ) {?>
                    <li><a><i class="fa fa-angle-double-left" style="opacity:0.5;"></i></a>
                    </li>
                    <?php } else {?>
                    <li class=""><a href="?start=<?php echo $Previous; ?>"><i class="fa fa-angle-double-left"></i></a>
                    </li>
                    <?php }?>

                    <?php

                            $pegi_limit = 8; //How many pagi number display
                            $pegi_count = 0;
                            $count_pagi = 0;
                            $get_number = $pegi_limit;
                            for ( $i = 1; $i <= $r_item_display_pegi_number; $i++ ) {
                                if ( isset( $_GET['start'] ) ) {
                                    $get_number = $_GET['start'];
                                }
                                if (  ( $get_number > $pegi_limit ) ) {
                                    if ( $get_number > ( $r_item_display_pegi_number - $pegi_limit ) ) {
                                        $get_number = $r_item_display_pegi_number - ( $pegi_limit - 2 );
                                        if ( $count_pagi < ( $get_number - 3 ) ) { // In the end section display same item.
                                            $count_pagi++;
                                            continue;
                                        }

                                    } else {
                                        if ( $count_pagi < ( $get_number - ceil(  ( $pegi_limit + 1 ) / 2 ) ) ) { //Active Class position ceil(  ( $pegi_limit + 1 ) / 2 ) )
                                            $count_pagi++;
                                            continue;
                                        }
                                    }
                                }
                                $pegi_count++;

                                if ( $pegi_count > ( $pegi_limit + 1 ) ) {
                                    break;
                                }

                                if ( $current_page == $i || $current_page == 0 ) {
                                    $current_page = -1;
                                ?>


                    <li class="current-page"><a href="?start=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } else {?>
                    <li><a href="?start=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php }

                        }?>
<?php

    if ( $Next == ( $r_item_display_pegi_number + 1 ) ) {?>
                    <li><a>
                            <i class="fa fa-angle-double-right" style="opacity:0.5;"></i></a></li>
                    <?php } else {?>
                    <li class=""><a href="?start=<?php echo $Next; ?>">
                            <i class="fa fa-angle-double-right"></i></a></li>
                    <?php }?>
                </ul>
            </div>
            <?php }?>
        </div>
    </div>
</div>