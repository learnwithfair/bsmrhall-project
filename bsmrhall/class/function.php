<?php

class students_info {
    private $conn1, $conn2;
    public function __CONSTRUCT() {
        $bdhost = "localhost";
        // $bdhost      = "bsmrhall.pust.ac.bd";
        $dbuser = "root";
        $dbpassword = "";
        $this->conn1 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        $this->conn2 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        if ( !( $this->conn1 ) ) {
            die( "Database connection Error!!" );
        }
        if ( !( $this->conn2 ) ) {
            die( "Database connection Error!!" );
        }
    }

    //display menu item
    public function display_menu_item() {
        $display_menu_item_query = "SELECT * FROM header_menu";
        $return_header_menu_mgs = mysqli_query( $this->conn1, $display_menu_item_query );
        if ( isset( $return_header_menu_mgs ) ) {
            return $return_header_menu_mgs;
        }
    }

    //add registration data
    public function add_registration_data( $data ) {
        $non_r_name = $data['non_r_name'];
        $non_r_roll = $data['non_r_roll'];
        $non_r_reg = $data['non_r_reg'];
        $non_r_session = $data['non_r_session'];
        $non_r_dept = $data['non_r_dept'];
        $non_r_fname = $data['non_r_fname'];
        $non_r_mname = $data['non_r_mname'];
        $non_r_mob = $data['non_r_mob'];
        $non_r_email = $data['non_r_email'];
        $non_r_pass = $data['non_r_pass'];
        $non_r_rm = $data['non_r_rm'];
        $non_r_hall_id = $data['non_r_hall_id'];
        $non_r_birth = $data['non_r_birth'];
        $non_r_pre = $data['non_r_pre'];
        $non_r_per = $data['non_r_per'];

        if ( !$non_r_rm ) {
            $non_r_rm = 0;
        }
        if ( !$non_r_hall_id ) {
            $non_r_hall_id = 0;
        }
        if ( !$non_r_pre ) {
            $non_r_pre = "N/A";
        }

        $non_r_img_name = $_FILES['non_r_img']['name'];
        $non_r_img_tmp_name = $_FILES['non_r_img']['tmp_name'];
        // Check Info
        $check_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$non_r_roll||non_r_reg=$non_r_reg)";
        $checking_result = mysqli_query( $this->conn1, $check_query );
        $result1 = mysqli_fetch_assoc( $checking_result );
        if ( isset( $result1 ) ) {
            return "You are already Registared.";
        } else {
            // Putting Info
            $non_r_query = "INSERT INTO nonresidential_info(non_r_name,non_r_roll,non_r_reg,non_r_session,non_r_dept,non_r_rm,non_r_hall_id,non_r_fname,non_r_mname,non_r_email,non_r_mob,non_r_pass,non_r_birth,non_r_pre_address,non_r_per_address,non_r_start,non_r_img,book_num,non_r_receipt,non_r_fee,non_r_status) VALUES('$non_r_name',$non_r_roll,$non_r_reg,$non_r_session,'$non_r_dept',$non_r_rm,$non_r_hall_id,'$non_r_fname','$non_r_mname','$non_r_email','$non_r_mob','$non_r_pass','$non_r_birth','$non_r_pre','$non_r_per',now(),'$non_r_img_name',0,0,0,'Nonresidential')";
            $result = mysqli_query( $this->conn1, $non_r_query );
            if ( $result ) {
                move_uploaded_file( $non_r_img_tmp_name, "./pdf/uploads/" . $non_r_img_name );
                return "successful";
                // return $non_r_img_name;
            } else {
                return "Unsuccessfull !!";
            }
        }
    }

    // User Login
    public function user_login( $data ) {
        $user_check = 0;
        $non_r_roll = $data['non_r_roll'];
        $non_r_pass = $data['non_r_pass'];

        // Check Info
        $check_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$non_r_roll&&non_r_pass='$non_r_pass')";
        $checking_result = mysqli_query( $this->conn1, $check_query );
        while ( $result1 = mysqli_fetch_assoc( $checking_result ) ) {
            if ( ( $result1['non_r_status'] == 'Residential' ) || ( $result1['non_r_status'] == 'Illegal' ) ) {
                $user_check = 1;
                if ( isset( $_SESSION['hall_manager'] ) ) {
                    unset( $_SESSION['hall_manager'] );
                }
                $_SESSION['user_roll'] = $result1['non_r_roll'];
                $_SESSION['non_r_pass'] = $result1['non_r_pass'];
                header( "location:profile" );
                break;
            }
        }
        if ( $user_check == 0 ) {
            return "unsuccesfull";
        }

    }

    // User Logout
    public function user_log_out() {
        //session_start();
        unset( $_SESSION['user_roll'] );
        unset( $_SESSION['non_r_pass'] );
        // header( "location:index" );
        header( "location:log_in" );
    }

    public function display_profile_info( $user_roll ) {
        $display_profile_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$user_roll";
        $result_data = mysqli_query( $this->conn1, $display_profile_query );
        $data = mysqli_fetch_assoc( $result_data );
        return $data;
    }

    // Display Residential Unique Info
    public function r_unique_info( $r_roll ) {
        $display_r_query = "SELECT * FROM residential_info WHERE r_roll=$r_roll ORDER BY r_year ASC";
        $display_r_info = mysqli_query( $this->conn1, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    //User Image Edit Residential Info
    public function user_edit_profile( $data ) {
        $roll = $_SESSION['user_roll'];
        $user_img_name = $_FILES['user_img']['name'];
        $user_img_tmp_name = $_FILES['user_img']['tmp_name'];

        if ( $user_img_name ) {
            // Get Image Name
            $search_r_img = "SELECT * FROM nonresidential_info WHERE non_r_roll=$roll";
            $search_r_img_result = mysqli_query( $this->conn1, $search_r_img );
            $img_data = mysqli_fetch_assoc( $search_r_img_result );

            if ( isset( $img_data ) ) {
                // Update Image Name
                $user_img_update_query = "UPDATE nonresidential_info SET non_r_img='$user_img_name' WHERE non_r_roll=$roll";
                $result = mysqli_query( $this->conn1, $user_img_update_query );
                if ( $result ) {
                    move_uploaded_file( $user_img_tmp_name, "pdf/uploads/" . $user_img_name );
                    $img = $img_data['non_r_img'];
                    if ( isset( $img ) ) {
                        unlink( "pdf/uploads/$img" );
                    }
                    return "successful";
                } else {
                    return "Unsuccessful";
                }
            }
        }

    }

    //User Present Address Update Residential Info
    public function user_pre_address_update( $data ) {
        $roll = $_SESSION['user_roll'];
        $u_pre_address = $data['u_pre_address'];

        // Update Present Address
        $user_pre_update_query = "UPDATE nonresidential_info SET non_r_pre_address='$u_pre_address' WHERE non_r_roll=$roll";
        $pre_result = mysqli_query( $this->conn1, $user_pre_update_query );
        if ( isset( $pre_result ) ) {
            return "successful";
        } else {
            return "Image Changed unsuccessfully.";
        }

    }

    // Put Messages
    public function put_comments( $data ) {
        $mgs_roll = $_SESSION['user_roll'];
        // $mgs_roll    = $data['mgs_roll'];
        $mgs_email = $data['mgs_email'];
        $mgs_subject = $data['mgs_subject'];
        $mgs_content = $data['mgs_content'];
        // Check Comment
        $display_mgs_query = "SELECT * FROM message_info WHERE(message_roll=$mgs_roll)";
        $check_mgs_data = mysqli_query( $this->conn1, $display_mgs_query );
        $checked_info = mysqli_fetch_assoc( $check_mgs_data );
        if ( $checked_info ) {
            return "Your problem already panding. Please try to late.";
        } else {

            $display_get_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$mgs_roll";
            $check_get_data = mysqli_query( $this->conn1, $display_get_query );
            $checked_get_info = mysqli_fetch_assoc( $check_get_data );
            $mgs_reg = $checked_get_info['non_r_reg'];
            $mgs_name = $checked_get_info['non_r_name'];
            $mgs_hall_id = $checked_get_info['non_r_hall_id'];

            $add_mgs_query = "INSERT INTO message_info(message_name,message_roll,message_reg,message_hall_id,message_email,message_subject,message_content,message_date) VALUES('$mgs_name',$mgs_roll,$mgs_reg,$mgs_hall_id,'$mgs_email','$mgs_subject','$mgs_content',now())";
            $return_mgs = mysqli_query( $this->conn1, $add_mgs_query );
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful!!";
            }
        }
    }

    // Display Notice
    public function display_notice() {
        $display_notice_query = "SELECT * FROM upload_notice ORDER BY n_id DESC";
        $return_display_notice = mysqli_query( $this->conn1, $display_notice_query );
        if ( isset( $return_display_notice ) ) {
            return $return_display_notice;
        } else {
            die( "Receipt Number is not found!!" );
        }
    }

    // Display Admin List
    public function display_subadmin_list() {
        $display_subadmin_list_query = "SELECT * FROM admin_info ORDER BY admin_status DESC";
        $display_subadmin_list = mysqli_query( $this->conn1, $display_subadmin_list_query );
        if ( isset( $display_subadmin_list ) ) {
            return $display_subadmin_list;
        }
    }

    // Manager Login
    public function manager_login( $data ) {
        $manager_check = 0;
        $manager_email = $data['manager_email'];
        $manager_pass = $data['manager_pass'];

        // Check Info
        $check_query = "SELECT * FROM dining_manager";
        $checking_result = mysqli_query( $this->conn2, $check_query );
        while ( $match_data = mysqli_fetch_assoc( $checking_result ) ) {
            if ( $manager_email == $match_data['manager_email'] && $manager_pass == $match_data['manager_pass'] ) {
                $manager_check = 1;
                $_SESSION['hall_manager'] = "hall_manager";
                $_SESSION['manager_block'] = $match_data['manager_block'];
                unset( $_SESSION['user_roll'] );
                header( "location:meal_info" );
                break;
            }
        }
        if ( $manager_check == 0 ) {
            return "unsuccesfull";

        }
    }

    // Add Meal For Block A
    public function add_meal( $data ) {
        $date = date( "Y-m-d" );

        $meal_roll = $_SESSION['user_roll'];
        $morning_meal = $data['morning-meal'];
        $lunch = $data['lunch'];
        $dinner = $data['dinner'];
        $meal_total = $morning_meal + $lunch + $dinner;

        //Check Dining Meal
        $check_info = "SELECT * FROM dining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        if ( isset( $check_data ) ) {
            // Update data
            $meal_update_query = "UPDATE dining_meal SET morning_meal=$morning_meal,lunch=$lunch,dinner=$dinner,meal_total=$meal_total WHERE (meal_roll=$meal_roll&&meal_date='$date')";
            $update_result = mysqli_query( $this->conn2, $meal_update_query );
            if ( $update_result ) {
                return "successful";
            } else {
                return "Unsuccessful";
            }

        } else {
            // Get User meal info
            $get_info = "SELECT * FROM nonresidential_info WHERE non_r_roll=$meal_roll";
            $search_r_result = mysqli_query( $this->conn1, $get_info );
            $user_data = mysqli_fetch_assoc( $search_r_result );
            if ( isset( $user_data ) ) {
                $meal_name = $user_data['non_r_name'];
                $meal_room = $user_data['non_r_rm'];
            }

            $add_meal_info = "INSERT INTO dining_meal(meal_name,meal_roll,meal_room,morning_meal,lunch,dinner,meal_total,meal_date) VALUES('$meal_name',$meal_roll,$meal_room,$morning_meal,$lunch,$dinner,$meal_total,'$date')";
            $return_mgs = mysqli_query( $this->conn2, $add_meal_info );
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful!!";
            }
        }

    }

    // Add Meal For Block B
    public function b_add_meal( $data ) {
        $date = date( "Y-m-d" );
        $meal_roll = $_SESSION['user_roll'];
        $morning_meal = $data['b-morning-meal'];
        $lunch = $data['b-lunch'];
        $dinner = $data['b-dinner'];
        $meal_total = $morning_meal + $lunch + $dinner;

        //Check Dining Meal
        $check_info = "SELECT * FROM bdining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        if ( isset( $check_data ) ) {
            // Update data
            $meal_update_query = "UPDATE bdining_meal SET morning_meal=$morning_meal,lunch=$lunch,dinner=$dinner,meal_total=$meal_total WHERE (meal_roll=$meal_roll&&meal_date='$date')";
            $update_result = mysqli_query( $this->conn2, $meal_update_query );
            if ( $update_result ) {
                return "successful";
            } else {
                return "Unsuccessful";
            }

        } else {
            // Get User meal info
            $get_info = "SELECT * FROM nonresidential_info WHERE non_r_roll=$meal_roll";
            $search_r_result = mysqli_query( $this->conn1, $get_info );
            $user_data = mysqli_fetch_assoc( $search_r_result );
            if ( isset( $user_data ) ) {
                $meal_name = $user_data['non_r_name'];
                $meal_room = $user_data['non_r_rm'];
            }

            $add_meal_info = "INSERT INTO bdining_meal(meal_name,meal_roll,meal_room,morning_meal,lunch,dinner,meal_total,meal_date) VALUES('$meal_name',$meal_roll,$meal_room,$morning_meal,$lunch,$dinner,$meal_total,'$date')";
            $return_mgs = mysqli_query( $this->conn2, $add_meal_info );
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful!!";
            }
        }

    }

// Display Meal For A Block
    public function display_dining_meal_info( $meal_roll ) {
        $date = date( "Y-m-d" );
        //Display Dining Meal
        // $check_info = "SELECT * FROM bdining_meal WHERE (meal_roll=$meal_roll&&meal_date=now())";
        $check_info = "SELECT * FROM dining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        return $check_data;
    }

// Display Meal For B Block
    public function b_display_dining_meal_info( $meal_roll ) {
        $date = date( "Y-m-d" );
        //Display Dining Meal
        // $check_info     = "SELECT * FROM bdining_meal WHERE (meal_roll=$meal_roll&&meal_date=now())";
        $check_info = "SELECT * FROM bdining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        return $check_data;
    }

    // Update Meal For A Block
    public function update_meal( $data ) {
        $date = date( "Y-m-d" );
        $meal_roll = $_SESSION['user_roll'];
        $morning_meal = $data['u-morning-meal'];
        $lunch = $data['u-lunch'];
        $dinner = $data['u-dinner'];
        $meal_total = $morning_meal + $lunch + $dinner;

        //Check Dining Meal
        $check_info = "SELECT * FROM dining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        if ( isset( $check_data ) ) {
            // Update data
            $meal_update_query = "UPDATE dining_meal SET morning_meal=$morning_meal,lunch=$lunch,dinner=$dinner,meal_total=$meal_total WHERE (meal_roll=$meal_roll&&meal_date='$date')";
            $update_result = mysqli_query( $this->conn2, $meal_update_query );
            if ( $update_result ) {
                return "successful";
            } else {
                return "Unsuccessful";
            }

        } else {
            // Get User meal info
            $get_info = "SELECT * FROM nonresidential_info WHERE non_r_roll=$meal_roll";
            $search_r_result = mysqli_query( $this->conn1, $get_info );
            $user_data = mysqli_fetch_assoc( $search_r_result );
            if ( isset( $user_data ) ) {
                $meal_name = $user_data['non_r_name'];
                $meal_room = $user_data['non_r_rm'];
            }

            $add_meal_info = "INSERT INTO dining_meal(meal_name,meal_roll,meal_room,morning_meal,lunch,dinner,meal_total,meal_date) VALUES('$meal_name',$meal_roll,$meal_room,$morning_meal,$lunch,$dinner,$meal_total,'$date')";
            $return_mgs = mysqli_query( $this->conn2, $add_meal_info );
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful!!";
            }
        }

    }

    // Update Meal For B Block
    public function b_update_meal( $data ) {
        $date = date( "Y-m-d" );
        $meal_roll = $_SESSION['user_roll'];
        $morning_meal = $data['u-b-morning-meal'];
        $lunch = $data['u-b-lunch'];
        $dinner = $data['u-b-dinner'];
        $meal_total = $morning_meal + $lunch + $dinner;

        //Check Dining Meal
        $check_info = "SELECT * FROM bdining_meal WHERE (meal_roll=$meal_roll&&meal_date='$date')";
        $check_r_result = mysqli_query( $this->conn2, $check_info );
        $check_data = mysqli_fetch_assoc( $check_r_result );
        if ( isset( $check_data ) ) {
            // Update data
            $meal_update_query = "UPDATE bdining_meal SET morning_meal=$morning_meal,lunch=$lunch,dinner=$dinner,meal_total=$meal_total WHERE (meal_roll=$meal_roll&&meal_date='$date')";
            $update_result = mysqli_query( $this->conn2, $meal_update_query );
            if ( $update_result ) {
                return "successful";
            } else {
                return "Unsuccessful";
            }

        } else {
            // Get User meal info
            $get_info = "SELECT * FROM nonresidential_info WHERE non_r_roll=$meal_roll";
            $search_r_result = mysqli_query( $this->conn1, $get_info );
            $user_data = mysqli_fetch_assoc( $search_r_result );
            if ( isset( $user_data ) ) {
                $meal_name = $user_data['non_r_name'];
                $meal_room = $user_data['non_r_rm'];
            }

            $add_meal_info = "INSERT INTO bdining_meal(meal_name,meal_roll,meal_room,morning_meal,lunch,dinner,meal_total,meal_date) VALUES('$meal_name',$meal_roll,$meal_room,$morning_meal,$lunch,$dinner,$meal_total,'$date')";
            $return_mgs = mysqli_query( $this->conn2, $add_meal_info );
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful!!";
            }
        }

    }

    public function display_all_dining_meal_info( $date ) {

        // $week = 0;
        // $week = date( 'w' );
        // $date = date( 'Y-m-d', strtotime( "-" . ( 1 + $week ) . " days" ) );

        // session_start();
        if ( $_SESSION['manager_block'] == "A" ) {
            $check_info = "SELECT * FROM dining_meal WHERE meal_date='$date'";
            $check_r_result = mysqli_query( $this->conn2, $check_info );
            if ( $check_r_result ) {
                return $check_r_result;
            }
        } else {
            $check_info2 = "SELECT * FROM bdining_meal WHERE meal_date='$date'";
            $check_r_result2 = mysqli_query( $this->conn2, $check_info2 );
            if ( $check_r_result2 ) {
                return $check_r_result2;
            }
        }

    }

// Dining Meal Auto Delete
    public function dining_meal_dlt() {

        $from_date = date( 'Y-m-d', strtotime( "-30 days" ) );
        $to_date = date( 'Y-m-d', strtotime( "-6 days" ) );
        // session_start();
// For A Block
        $meal_dlt_query1 = "DELETE FROM dining_meal WHERE meal_date BETWEEN '$from_date' AND '$to_date'";
        $check_r_result = mysqli_query( $this->conn2, $meal_dlt_query1 );

// For B Block
        $meal_dlt_query2 = "DELETE FROM bdining_meal WHERE meal_date BETWEEN '$from_date' AND '$to_date'";
        $check_r_result2 = mysqli_query( $this->conn2, $meal_dlt_query2 );

    }

    public function manager_log_out() {
        // session_start();
        unset( $_SESSION['hall_manager'] );
        unset( $_SESSION['manager_block'] );
        unset( $_SESSION['dining_meal_date'] );
        header( "location:hall_dining_manager_login" );
    }

}