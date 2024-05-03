<?php
class std_list_project
{
    private $conn, $preconn;
    public $r_months       = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
    public $display_months = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );
    public function __CONSTRUCT()
    {
        $bdhost        = "localhost";
        $dbuser        = "root";
        $dbpassword    = "";
        $dbname        = "student_info";
        $this->conn    = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }
    }

    // Checking Login Info
    public function getAdminData( $data )
    {
        $admin_check    = 0;
        $email          = $data['admin_email'];
        $password       = md5( $data['admin_password'] );
        $get_query      = "SELECT * FROM admin_info";
        $all_admin_info = mysqli_query( $this->conn, $get_query );
        // checking query admin table
        while ( $match_data = mysqli_fetch_assoc( $all_admin_info ) ) {
            if ( $email == $match_data['admin_email'] && $password == $match_data['admin_password'] ) {
                $admin_check              = 1;
                $_SESSION['admin_id']     = $match_data['admin_id'];
                $_SESSION['admin_name']   = $match_data['admin_name'];
                $_SESSION['admin_email']  = $match_data['admin_email'];
                $_SESSION['admin_status'] = $match_data['admin_status'];
                $_SESSION['admin_img']    = $match_data['admin_img'];
                header( "location:template" );
                break;
            }
        }
        if ( $admin_check == 0 ) {
            return "unsuccesfull";
            // echo "<script>alert('Email or Password is incorrect!!')</script>";
        }
    }

    // Logout Section
    public function logout_info()
    {
        unset( $_SESSION['admin_id'] );
        unset( $_SESSION['admin_name'] );
        unset( $_SESSION['admin_email'] );
        unset( $_SESSION['admin_status'] );
        unset( $_SESSION['admin_img'] );
        header( "location: index" );
    }

    // Display Admin Officer
    public function provost()
    {
        $display_admin_officer_query = "SELECT * FROM admin_info WHERE admin_status='Provost'";
        $display_admin_officer_list  = mysqli_query( $this->conn, $display_admin_officer_query );
        $admin_officer_name          = mysqli_fetch_assoc( $display_admin_officer_list );
        if ( isset( $admin_officer_name ) ) {
            return $admin_officer_name['admin_email'];
        }
    }

    // Display Admin List
    public function display_subadmin_list()
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info ORDER BY admin_id ASC";
        $display_subadmin_list       = mysqli_query( $this->conn, $display_subadmin_list_query );
        if ( isset( $display_subadmin_list ) ) {
            return $display_subadmin_list;
        }
    }

    // Display Admin List By ID
    public function display_admin_info_by_id( $id )
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info WHERE admin_id=$id";
        $display_subadmin_list       = mysqli_query( $this->conn, $display_subadmin_list_query );
        $admin_info                  = mysqli_fetch_assoc( $display_subadmin_list );
        if ( isset( $admin_info ) ) {
            return $admin_info;
        }
    }

    // Display Previous Admin List
    public function display_pre_admin_list()
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info ORDER BY admin_status DESC";
        $display_subadmin_list       = mysqli_query( $this->preconn, $display_subadmin_list_query );
        if ( isset( $display_subadmin_list ) ) {
            return $display_subadmin_list;
        }
    }

    // Delete Sub Admin List
    public function subadmin_dlt( $id )
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info WHERE admin_id=$id";
        $display_subadmin_list       = mysqli_query( $this->conn, $display_subadmin_list_query );
        $admin_info                  = mysqli_fetch_assoc( $display_subadmin_list );
        $dlt_subadmin_list_query     = "DELETE FROM admin_info WHERE admin_id=$id";
        $dlt_subadmin_list           = mysqli_query( $this->conn, $dlt_subadmin_list_query );
        if ( isset( $dlt_subadmin_list ) ) {
            $admin_name     = $admin_info['admin_name'];
            $admin_email    = $admin_info['admin_email'];
            $admin_start    = $admin_info['admin_start'];
            $admin_status   = $admin_info['admin_status'];
            $admin_img_name = $admin_info['admin_img'];

            $add_admin_query = "INSERT INTO admin_info(admin_name,admin_email,admin_start,admin_end,admin_status,admin_img) VALUES('$admin_name','$admin_email','$admin_start',now(),'$admin_status','$admin_img_name')";
            $return_mgs      = mysqli_query( $this->preconn, $add_admin_query );
            if ( $return_mgs ) {
                return "successful";
            }

        } else {
            return "unsuccessful";
        }
    }

    // Add Subadmin
    public function add_subadmin( $data )
    {
        $admin_name          = $data['admin_name'];
        $admin_email         = $data['admin_email'];
        $password            = $data['admin_password'];
        $admin_status        = $data['admin_status'];
        $admin_img_name      = $_FILES['admin_img']['name'];
        $admin_img_tmp_name  = $_FILES['admin_img']['tmp_name'];
        $admin_password      = md5( $password );
        $admin_display_query = "SELECT * FROM admin_info WHERE admin_email='$admin_email'";
        $admins              = mysqli_query( $this->conn, $admin_display_query );
        if ( mysqli_fetch_assoc( $admins ) ) {
            return "unsuccessful";
        } else {
            $add_admin_query = "INSERT INTO admin_info(admin_name,admin_email,admin_password,admin_start,admin_status,admin_img) VALUES('$admin_name','$admin_email','$admin_password',now(),'$admin_status','$admin_img_name')";
            $return_mgs      = mysqli_query( $this->conn, $add_admin_query );
            if ( $return_mgs ) {
                move_uploaded_file( $admin_img_tmp_name, "./assets/img/" . $admin_img_name );
                return "successful";
            } else {
                return "unsuccessful";
            }
        }
    }

    // Update Admin
    public function update_admin( $data )
    {
        $id                  = $data['u_id'];
        $admin_name          = $data['u_admin_name'];
        $admin_email         = $data['u_admin_email'];
        $password            = $data['u_admin_password'];
        $admin_status        = $data['u_admin_status'];
        $admin_img_name      = $_FILES['u_admin_img']['name'];
        $admin_img_tmp_name  = $_FILES['u_admin_img']['tmp_name'];
        $admin_password      = md5( $password );
        $admin_display_query = "SELECT * FROM admin_info WHERE admin_id=$id";
        $admins              = mysqli_query( $this->conn, $admin_display_query );
        $info                = mysqli_fetch_assoc( $admins );
        if ( isset( $info ) ) {
            $update_query      = "UPDATE admin_info SET admin_name='$admin_name',admin_email='$admin_email',admin_password='$admin_password',admin_status='$admin_status',admin_img='$admin_img_name' WHERE admin_id=$id";
            $return_update_mgs = mysqli_query( $this->conn, $update_query );
            if ( $return_update_mgs ) {
                $img = $info['admin_img'];
                unlink( "./assets/img/$img" );
                move_uploaded_file( $admin_img_tmp_name, "./assets/img/" . $admin_img_name );
                return "successful";
            } else {
                return "unsuccessful";
            }
        } else {

            return "unsuccessful";

        }
    }

    // Add Notice
    public function upload_notice( $data )
    {
        $n_title         = $data['n_title'];
        $n_file_name     = $_FILES['n_file']['name'];
        $n_file_tmp_name = $_FILES['n_file']['tmp_name'];
        $n_date          = date( "d-F-Y h:ia" );

        $add_notice_query = "INSERT INTO upload_notice(n_title,n_file,n_date) VALUES('$n_title','$n_file_name','$n_date')";
        $return_mgs       = mysqli_query( $this->conn, $add_notice_query );
        if ( $return_mgs ) {
            move_uploaded_file( $n_file_tmp_name, "../notice/" . $n_file_name );
            return "successful";
        } else {
            return "unsuccessful";
        }

    }

    // Display Residential Info
    // public function residential_info() {
    //     $display_r_query = "SELECT * FROM residential_info ORDER BY r_roll ASC";
    //     $display_r_info  = mysqli_query( $this->conn, $display_r_query );
    //     if ( isset( $display_r_info ) ) {
    //         return $display_r_info;
    //     }
    // }
    // Display Residential Info
    public function residential_info()
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Residential' ORDER BY non_r_roll ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Pagi Residential Info
    public function pagi_residential_info( $pegi_start, $pegi_end )
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Residential' ORDER BY non_r_roll ASC LIMIT $pegi_start,$pegi_end";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Residential Info by Roll
    public function residential_info_by_roll( $roll )
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$roll&&(non_r_status='Residential'||non_r_status='Illegal'))";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Pre Residential Info by Roll
    public function pre_residential_info_by_roll( $roll )
    {
        $display_r_query = "SELECT * FROM residential_info WHERE (non_r_roll=$roll)";
        $display_r_info  = mysqli_query( $this->preconn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Residential Unique Info
    public function r_unique_info( $r_roll )
    {
        $display_r_query = "SELECT * FROM residential_info WHERE r_roll=$r_roll ORDER BY r_year ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Update Paid Status
    public function r_status_update( $data )
    {

        $u_id   = $data['u_r_id'];
        $months = "";
        if ( empty( $data['r_jan'] ) ) {
            $r_jan = "Unpaid";
        } else {
            $r_jan = "Paid";
            if ( $data['r_jan'] == "Paid" ) {
                $months = $months . "JAN ";
            }

        }
        if ( empty( $data['r_feb'] ) ) {
            $r_feb = "Unpaid";
        } else {
            $r_feb = "Paid";
            if ( $data['r_feb'] == "Paid" ) {
                $months = $months . "FEB ";
            }
        }
        if ( empty( $data['r_mar'] ) ) {
            $r_mar = "Unpaid";
        } else {
            $r_mar = "Paid";
            if ( $data['r_mar'] == "Paid" ) {
                $months = $months . "MAR ";
            }

        }
        if ( empty( $data['r_apr'] ) ) {
            $r_apr = "Unpaid";
        } else {
            $r_apr = "Paid";
            if ( $data['r_apr'] == "Paid" ) {
                $months = $months . "APR ";
            }

        }
        if ( empty( $data['r_may'] ) ) {
            $r_may = "Unpaid";
        } else {
            $r_may = "Paid";
            if ( $data['r_may'] == "Paid" ) {
                $months = $months . "MAY ";
            }

        }
        if ( empty( $data['r_jun'] ) ) {
            $r_jun = "Unpaid";
        } else {
            $r_jun = "Paid";
            if ( $data['r_jun'] == "Paid" ) {
                $months = $months . "JUN ";
            }

        }
        if ( empty( $data['r_jul'] ) ) {
            $r_jul = "Unpaid";
        } else {
            $r_jul = "Paid";
            if ( $data['r_jul'] == "Paid" ) {
                $months = $months . "JUL ";
            }

        }
        if ( empty( $data['r_aug'] ) ) {
            $r_aug = "Unpaid";
        } else {
            $r_aug = "Paid";
            if ( $data['r_aug'] == "Paid" ) {
                $months = $months . "AUG ";
            }

        }
        if ( empty( $data['r_sep'] ) ) {
            $r_sep = "Unpaid";
        } else {
            $r_sep = "Paid";
            if ( $data['r_sep'] == "Paid" ) {
                $months = $months . "SEP ";
            }

        }
        if ( empty( $data['r_oct'] ) ) {
            $r_oct = "Unpaid";
        } else {
            $r_oct = "Paid";
            if ( $data['r_oct'] == "Paid" ) {
                $months = $months . "OCT ";
            }

        }
        if ( empty( $data['r_nov'] ) ) {
            $r_nov = "Unpaid";
        } else {
            $r_nov = "Paid";
            if ( $data['r_nov'] == "Paid" ) {
                $months = $months . "NOV ";
            }

        }
        if ( empty( $data['r_dec'] ) ) {
            $r_dec = "Unpaid";
        } else {
            $r_dec = "Paid";
            if ( $data['r_dec'] == "Paid" ) {
                $months = $months . "DEC ";
            }

        }
        $r_paid_query    = "UPDATE residential_info SET r_jan='$r_jan',r_feb='$r_feb',r_mar='$r_mar',r_apr='$r_apr', r_may='$r_may',r_jun='$r_jun',r_jul='$r_jul',r_aug='$r_aug',r_sep='$r_sep',r_oct='$r_oct',r_nov='$r_nov',r_dec='$r_dec' WHERE r_id=$u_id";
        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
        if ( $return_paid_mgs ) {
            //Put History
            if ( !empty( $months ) ) {
                $r_roll_query    = "SELECT * FROM residential_info WHERE r_id=$u_id";
                $r_roll_data     = mysqli_query( $this->conn, $r_roll_query );
                $ph_roll_display = mysqli_fetch_assoc( $r_roll_data );
                if ( $ph_roll_display ) {
                    $ph_roll         = $ph_roll_display['r_roll'];
                    $ph_year         = $ph_roll_display['r_year'];
                    $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$ph_roll";
                    $r_display_data  = mysqli_query( $this->conn, $r_display_query );
                    $ph_info         = mysqli_fetch_assoc( $r_display_data );
                    if ( $ph_info ) {
                        $dlt_receipt_number = $_SESSION['r_roll'];
                        $ph_name            = $ph_info['non_r_name'];
                        $ph_roll            = $ph_info['non_r_roll'];
                        $ph_reg             = $ph_info['non_r_reg'];
                        $ph_submitted       = $_SESSION['admin_name'];
                        $months             = $months . " (" . $ph_year . ")";
                        $r_history_query    = "INSERT INTO payment_history(ph_name,ph_roll,ph_reg,ph_receipt_num,ph_month,ph_date,ph_submitted) VALUES('$ph_name',$ph_roll,$ph_reg,$dlt_receipt_number,'$months',now(),'$ph_submitted')";
                        $r_history_mgs      = mysqli_query( $this->conn, $r_history_query );
                        if ( $r_history_mgs ) {
                            // Delete  Receipt Number

                            $receipt_dlt_query   = "DELETE FROM receipt_info WHERE receipt_num=$dlt_receipt_number";
                            $receipt_deleted_mgs = mysqli_query( $this->conn, $receipt_dlt_query );

                            if ( $receipt_deleted_mgs ) {
                                unset( $_SESSION['r_roll'] );
                                return "successful";

                            }
                        }
                    }
                }
            }

        } else {
            return "Unsuccessful";
        }

    }

    // Residential Paid Status
    public function r_paid_status( $data )
    {
        $count     = 0;
        $p_roll    = $_SESSION['r_roll'];
        $p_receipt = $_SESSION['receipt_num'];
        $p_book    = $_SESSION['book_num'];

        $p_month         = $data['p_month'];
        $p_year          = $data['p_year'];
        $p_amount        = $data['p_amount'];
        $r_months        = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
        $display_months  = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );
        $paid_months     = "";
        $r_roll_query    = "SELECT * FROM residential_info WHERE r_roll=$p_roll&&r_year=$p_year";
        $r_roll_data     = mysqli_query( $this->conn, $r_roll_query );
        $ph_roll_display = mysqli_fetch_assoc( $r_roll_data );
        if ( $ph_roll_display ) {
            $addmission_month = $ph_roll_display['r_addmission_month'];
            $addmission_year  = $ph_roll_display['r_addminssion_year'];
            if ( $addmission_year == $p_year ) {
                for ( $i = $addmission_month; $i <= 12; $i++ ) {
                    $m = $r_months[$i];
                    if ( $ph_roll_display[$m] == "Unpaid" ) {
                        $count++;
                        $r_paid_query    = "UPDATE residential_info SET $m='Paid' WHERE r_roll=$p_roll&&r_year=$p_year";
                        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
                        $paid_months     = $paid_months . $display_months[$i] . " ";
                    }
                    if ( $count == $p_month ) {
                        break;
                    }
                }

            } else {
                for ( $i = 1; $i <= 12; $i++ ) {
                    $m = $r_months[$i];
                    if ( $ph_roll_display[$m] == "Unpaid" ) {
                        $count++;
                        $r_paid_query    = "UPDATE residential_info SET $m='Paid' WHERE r_roll=$p_roll&&r_year=$p_year";
                        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
                        $paid_months     = $paid_months . $display_months[$i] . " ";
                    }
                    if ( $count == $p_month ) {
                        break;
                    }
                }
            }
            //Put History
            if ( !empty( $paid_months ) ) {

                $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$p_roll";
                $r_display_data  = mysqli_query( $this->conn, $r_display_query );
                $ph_info         = mysqli_fetch_assoc( $r_display_data );
                if ( $ph_info ) {
                    $ph_name         = $ph_info['non_r_name'];
                    $ph_reg          = $ph_info['non_r_reg'];
                    $ph_submitted    = $_SESSION['admin_name'];
                    $paid_months     = $paid_months . " (" . $p_year . ")";
                    $r_history_query = "INSERT INTO payment_history(ph_name,ph_roll,ph_reg,book_num,ph_receipt_num,ph_amount,ph_month,ph_date,ph_submitted) VALUES('$ph_name',$p_roll,$ph_reg,$p_book,$p_receipt,$p_amount,'$paid_months',now(),'$ph_submitted')";
                    $r_history_mgs   = mysqli_query( $this->conn, $r_history_query );
                    if ( $r_history_mgs ) {
                        // Delete  Receipt Number

                        $receipt_dlt_query   = "DELETE FROM receipt_info WHERE receipt_num=$p_receipt";
                        $receipt_deleted_mgs = mysqli_query( $this->conn, $receipt_dlt_query );

                        if ( $receipt_deleted_mgs ) {
                            unset( $_SESSION['receipt_num'] );
                            unset( $_SESSION['book_num'] );
                            return "successful";

                        }
                    }
                }

            }
        }

    }

    // Change Paid Status
    public function r_payment_change( $data )
    {

        $u_id   = $data['u_r_id'];
        $months = "";
        if ( empty( $data['r_jan'] ) ) {
            $r_jan = "Paid";
        } else {
            $r_jan = "Unpaid";
            if ( $data['r_jan'] == "Unpaid" ) {
                $months = $months . "JAN ";
            }

        }
        if ( empty( $data['r_feb'] ) ) {
            $r_feb = "Paid";
        } else {
            $r_feb = "Unpaid";
            if ( $data['r_feb'] == "Unpaid" ) {
                $months = $months . "FEB ";
            }
        }
        if ( empty( $data['r_mar'] ) ) {
            $r_mar = "Paid";
        } else {
            $r_mar = "Unpaid";
            if ( $data['r_mar'] == "Unpaid" ) {
                $months = $months . "MAR ";
            }

        }
        if ( empty( $data['r_apr'] ) ) {
            $r_apr = "Paid";
        } else {
            $r_apr = "Unpaid";
            if ( $data['r_apr'] == "Unpaid" ) {
                $months = $months . "APR ";
            }

        }
        if ( empty( $data['r_may'] ) ) {
            $r_may = "Paid";
        } else {
            $r_may = "Unpaid";
            if ( $data['r_may'] == "Unpaid" ) {
                $months = $months . "MAY ";
            }

        }
        if ( empty( $data['r_jun'] ) ) {
            $r_jun = "Paid";
        } else {
            $r_jun = "Unpaid";
            if ( $data['r_jun'] == "Unpaid" ) {
                $months = $months . "JUN ";
            }

        }
        if ( empty( $data['r_jul'] ) ) {
            $r_jul = "Paid";
        } else {
            $r_jul = "Unpaid";
            if ( $data['r_jul'] == "Unpaid" ) {
                $months = $months . "JUL ";
            }

        }
        if ( empty( $data['r_aug'] ) ) {
            $r_aug = "Paid";
        } else {
            $r_aug = "Unpaid";
            if ( $data['r_aug'] == "Unpaid" ) {
                $months = $months . "AUG ";
            }

        }
        if ( empty( $data['r_sep'] ) ) {
            $r_sep = "Paid";
        } else {
            $r_sep = "Unpaid";
            if ( $data['r_sep'] == "Unpaid" ) {
                $months = $months . "SEP ";
            }

        }
        if ( empty( $data['r_oct'] ) ) {
            $r_oct = "Paid";
        } else {
            $r_oct = "Unpaid";
            if ( $data['r_oct'] == "Unpaid" ) {
                $months = $months . "OCT ";
            }

        }
        if ( empty( $data['r_nov'] ) ) {
            $r_nov = "Paid";
        } else {
            $r_nov = "Unpaid";
            if ( $data['r_nov'] == "Unpaid" ) {
                $months = $months . "NOV ";
            }

        }
        if ( empty( $data['r_dec'] ) ) {
            $r_dec = "Paid";
        } else {
            $r_dec = "Unpaid";
            if ( $data['r_dec'] == "Unpaid" ) {
                $months = $months . "DEC ";
            }

        }

        $r_paid_query    = "UPDATE residential_info SET r_jan='$r_jan',r_feb='$r_feb',r_mar='$r_mar',r_apr='$r_apr', r_may='$r_may',r_jun='$r_jun',r_jul='$r_jul',r_aug='$r_aug',r_sep='$r_sep',r_oct='$r_oct',r_nov='$r_nov',r_dec='$r_dec' WHERE r_id=$u_id";
        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
        if ( $return_paid_mgs ) {
            //Put History
            if ( !empty( $months ) ) {

                $r_roll_query    = "SELECT * FROM residential_info WHERE r_id=$u_id";
                $r_roll_data     = mysqli_query( $this->conn, $r_roll_query );
                $ph_roll_display = mysqli_fetch_assoc( $r_roll_data );
                if ( $ph_roll_display ) {
                    $ph_roll         = $ph_roll_display['r_roll'];
                    $ph_year         = $ph_roll_display['r_year'];
                    $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$ph_roll";
                    $r_display_data  = mysqli_query( $this->conn, $r_display_query );
                    $ph_info         = mysqli_fetch_assoc( $r_display_data );
                    if ( $ph_info ) {
                        $ph_name         = $ph_info['non_r_name'];
                        $ph_roll         = $ph_info['non_r_roll'];
                        $ph_reg          = $ph_info['non_r_reg'];
                        $ph_submitted    = $_SESSION['admin_name'];
                        $receipt_num     = $_SESSION['c_receipt_num'];
                        $book_num        = $_SESSION['c_book_num'];
                        $ph_amount       = $_SESSION['c_ph_amount'];
                        $months          = $months . " (" . $ph_year . ")</br> Changed";
                        $r_history_query = "INSERT INTO payment_history(ph_name,ph_roll,ph_reg,book_num,ph_receipt_num,ph_amount,ph_month,ph_date,ph_submitted) VALUES('$ph_name',$ph_roll,$ph_reg,$book_num,$receipt_num,$ph_amount,'$months',now(),'$ph_submitted')";
                        $r_history_mgs   = mysqli_query( $this->conn, $r_history_query );
                        if ( $r_history_mgs ) {
                            // Insert Receipt Number

                            $display_receipt_query  = "SELECT * FROM receipt_info WHERE book_num=$book_num&&receipt_num=$receipt_num";
                            $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
                            $varifyed               = mysqli_fetch_assoc( $return_display_receipt );
                            if ( !isset( $varifyed ) ) {
                                $add_receipt_query = "INSERT INTO receipt_info(book_num,receipt_num) VALUES($book_num,$receipt_num)";
                                $return_mgs        = mysqli_query( $this->conn, $add_receipt_query );
                                if ( $return_mgs ) {
                                    unset( $_SESSION['c_receipt_num'] );
                                    unset( $_SESSION['c_book_num'] );
                                    unset( $_SESSION['c_ph_amount'] );

                                    return "successful";
                                }

                            }

                            unset( $_SESSION['c_receipt_num'] );
                            unset( $_SESSION['c_book_num'] );
                            unset( $_SESSION['c_ph_amount'] );
                        }
                    }
                }
            }

        } else {
            return "Data cann't Updated successfully.";
        }

    }

    // Completed Paid Status
    // public function u_r_paid_status( $data ) {
    //     $id              = $data[0];
    //     $r_status        = $data[1];
    //     $r_paid_query    = "UPDATE residential_info SET r_status=$r_status WHERE r_id=$id";
    //     $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
    //     if ( $return_paid_mgs ) {
    //         return "Data Updated successfully.";
    //     } else {
    //         return "Data cann't Updated successfully.";
    //     }

    // }

    // Display Residential Info by search
    // public function display_r_data_by_search( $search_bar_data ) {
    //     $info1 = $search_bar_data['r_search_text'];
    //     $info  = trim( $info1 );
    //     if ( $info ) {
    //         $r_display_query = "SELECT * FROM nonresidential_info WHERE ((non_r_roll LIKE '%$info%'&&non_r_status='Residential')||(non_r_reg LIKE '%$info%'&&non_r_status='Residential')||(non_r_rm LIKE '%$info%'&&non_r_status='Residential')) ORDER BY non_r_roll ASC";
    //         $data            = mysqli_query( $this->conn, $r_display_query );

    //     } else {
    //         $data = $info;

    //     }
    //     return $data;
    // }

    // Display Non Residential Info
    public function non_residential_info()
    {
        $display_non_r_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Nonresidential' ORDER BY non_r_roll ASC";
        $display_non_r_info  = mysqli_query( $this->conn, $display_non_r_query );
        if ( isset( $display_non_r_info ) ) {
            return $display_non_r_info;
        }
    }

    // Display Residential Info
    public function display_residential_info()
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Residential' ORDER BY non_r_roll ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Temporary Student Info
    public function display_temp_residential_info()
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Illegal' ORDER BY non_r_roll ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Previous Residential Info
    public function display_pre_residential_info()
    {
        $display_r_query = "SELECT * FROM residential_info ORDER BY non_r_roll ASC";
        $display_r_info  = mysqli_query( $this->preconn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Residential Info by Id
    public function display_residential_info_by_id( $id )
    {
        $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        $result          = mysqli_fetch_assoc( $display_r_info );
        if ( $result ) {
            return $result;
        }
    }

    // Delete Non Residential Info
    public function non_r_delete( $id )
    {
        // Get Image Name
        $search_r_img        = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
        $search_r_img_result = mysqli_query( $this->conn, $search_r_img );
        $img_data            = mysqli_fetch_assoc( $search_r_img_result );

        if ( isset( $img_data ) ) {
            $non_r_dlt_query = "DELETE FROM nonresidential_info WHERE non_r_id=$id";
            $non_r_dlt_mgs   = mysqli_query( $this->conn, $non_r_dlt_query );
            if ( isset( $non_r_dlt_mgs ) ) {
                $img = $img_data['non_r_img'];
                unlink( "../pdf/uploads/$img" );

                return "successful";

            } else {
                return "Delete Unsuccessful.";
            }
        }
    }

    // Delete Residential Info
    public function r_delete( $id )
    {
        // Get Image Name
        $search_r_img        = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
        $search_r_img_result = mysqli_query( $this->conn, $search_r_img );
        $img_data            = mysqli_fetch_assoc( $search_r_img_result );

        if ( isset( $img_data ) ) {
            $non_r_dlt_query = "DELETE FROM nonresidential_info WHERE non_r_id=$id";
            $non_r_dlt_mgs   = mysqli_query( $this->conn, $non_r_dlt_query );
            if ( isset( $non_r_dlt_mgs ) ) {
                // Delete Residential Data
                // $dlt_roll    = $img_data['non_r_roll'];
                // $r_dlt_query = "DELETE FROM residential_info WHERE r_roll=$dlt_roll";
                // $r_dlt_mgs   = mysqli_query( $this->conn, $r_dlt_query );

                // Insert Previous Residential Info
                $non_r_name     = $img_data['non_r_name'];
                $non_r_roll     = $img_data['non_r_roll'];
                $non_r_reg      = $img_data['non_r_reg'];
                $non_r_session  = $img_data['non_r_session'];
                $non_r_dept     = $img_data['non_r_dept'];
                $non_r_fname    = $img_data['non_r_fname'];
                $non_r_mname    = $img_data['non_r_mname'];
                $non_r_mob      = $img_data['non_r_mob'];
                $non_r_email    = $img_data['non_r_email'];
                $non_r_rm       = $img_data['non_r_rm'];
                $non_r_hall_id  = $img_data['non_r_hall_id'];
                $non_r_birth    = $img_data['non_r_birth'];
                $non_r_pre      = $img_data['non_r_pre_address'];
                $non_r_per      = $img_data['non_r_per_address'];
                $non_r_fee      = $img_data['non_r_fee'];
                $non_r_start    = $img_data['non_r_start'];
                $non_r_img_name = $img_data['non_r_img'];

                // Putting Info
                $non_r_query = "INSERT INTO residential_info(non_r_name,non_r_roll,non_r_reg,non_r_session,non_r_dept,non_r_rm,non_r_hall_id,non_r_fname,non_r_mname,non_r_email,non_r_mob,non_r_birth,non_r_pre_address,non_r_per_address,non_r_fee,non_r_start,non_r_end,non_r_img) VALUES('$non_r_name',$non_r_roll,$non_r_reg,$non_r_session,'$non_r_dept',$non_r_rm,$non_r_hall_id,'$non_r_fname','$non_r_mname','$non_r_email','$non_r_mob','$non_r_birth','$non_r_pre','$non_r_per',$non_r_fee,'$non_r_start',now(),'$non_r_img_name')";
                $result      = mysqli_query( $this->preconn, $non_r_query );
                if ( $result ) {
                    // Update payment status for default month
                    $r_payment_count_query = "UPDATE residential_info SET r_status=0 WHERE r_roll=$non_r_roll";
                    $return_update_mgs     = mysqli_query( $this->conn, $r_payment_count_query );
                    if ( isset( $return_update_mgs ) ) {
                        return "successful";
                    }

                }

            } else {
                return "Delete Unsuccessful.";
            }
        }
    }

    // Approve Non Residential Info
    public function non_r_approve( $data )
    {
        $id            = $data['non_r_id'];
        $r_receipt     = $data['non_r_receipt'];
        $non_r_fee     = $data['non_r_fee'];
        $string        = explode( "-", $r_receipt );
        $book_num      = (int) $string[0];
        $non_r_receipt = (int) $string[1];

        // Varified Receipt Number
        $display_receipt_query  = "SELECT * FROM receipt_info WHERE book_num=$book_num&&receipt_num=$non_r_receipt";
        $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
        $varifyed               = mysqli_fetch_assoc( $return_display_receipt );
        if ( isset( $varifyed ) ) {

            // Get Residentiality
            $non_r_approve_query      = "UPDATE nonresidential_info SET book_num=$book_num,non_r_receipt=$non_r_receipt,non_r_fee=$non_r_fee,non_r_start=now(),non_r_status='Residential' WHERE non_r_id=$id";
            $return_non_r_approve_mgs = mysqli_query( $this->conn, $non_r_approve_query );
            if ( $return_non_r_approve_mgs ) {

                // Put Residential Info
                $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
                $r_info          = mysqli_query( $this->conn, $display_r_query );

                while ( $r_unique_info = mysqli_fetch_assoc( $r_info ) ) {
                    $r_roll                = $r_unique_info['non_r_roll'];
                    $r_reg                 = $r_unique_info['non_r_reg'];
                    $r_rm                  = $r_unique_info['non_r_rm'];
                    $r_year                = $r_unique_info['non_r_session'];
                    $non_r_start           = $r_unique_info['non_r_start'];
                    $addmission_month_info = str_split( $non_r_start, 1 );
                    $addmission_month      = (int) ( $addmission_month_info[5] . $addmission_month_info[6] );
                    $addmission_year       = (int) ( str_split( $non_r_start, 4 )[0] );
                    for ( $year = ( $r_year + 1 ); $year <= ( $r_year + 5 ); $year++ ) {
                        $r_jan = "Unpaid";
                        $r_feb = "Unpaid";
                        $r_mar = "Unpaid";
                        $r_apr = "Unpaid";
                        $r_may = "Unpaid";
                        $r_jun = "Unpaid";
                        $r_jul = "Unpaid";
                        $r_aug = "Unpaid";
                        $r_sep = "Unpaid";
                        $r_oct = "Unpaid";
                        $r_nov = "Unpaid";
                        $r_dec = "Unpaid";
                        if ( $year == $addmission_year ) {
                            if ( $addmission_month == 1 ) {
                                $r_jan = "Paid";
                            } elseif ( $addmission_month == 2 ) {
                                $r_feb = "Paid";
                            } elseif ( $addmission_month == 3 ) {
                                $r_mar = "Paid";
                            } elseif ( $addmission_month == 4 ) {
                                $r_apr = "Paid";
                            } elseif ( $addmission_month == 5 ) {
                                $r_may = "Paid";
                            } elseif ( $addmission_month == 6 ) {
                                $r_jun = "Paid";
                            } elseif ( $addmission_month == 7 ) {
                                $r_jul = "Paid";
                            } elseif ( $addmission_month == 8 ) {
                                $r_aug = "Paid";
                            } elseif ( $addmission_month == 9 ) {
                                $r_sep = "Paid";
                            } elseif ( $addmission_month == 10 ) {
                                $r_oct = "Paid";
                            } elseif ( $addmission_month == 11 ) {
                                $r_nov = "Paid";
                            } else {
                                $r_dec = "Paid";
                            }
                        }
                        $r_paid_query    = "INSERT INTO residential_info(r_roll,r_reg,r_year,r_rm,r_jan,r_feb,r_mar,r_apr,r_may,r_jun,r_jul,r_aug,r_sep,r_oct,r_nov,r_dec,r_addmission_month,r_addminssion_year,r_start,r_status) VALUES($r_roll,$r_reg,$year,$r_rm,'$r_jan','$r_feb','$r_mar','$r_apr','$r_may','$r_jun','$r_jul','$r_aug','$r_sep','$r_oct','$r_nov','$r_dec',$addmission_month,$addmission_year,$r_year,1)";
                        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
                    }
                    // Update payment status for default month
                    // $r_payment_count_query = "UPDATE residential_info SET r_status=1 WHERE r_year=$addmission_year";
                    // $return_update_mgs     = mysqli_query( $this->conn, $r_payment_count_query );

                }

                // Display Non Residential Info
                $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
                $r_display_data  = mysqli_query( $this->conn, $r_display_query );
                $ph_info         = mysqli_fetch_assoc( $r_display_data );
                if ( $ph_info ) {
                    $display_months        = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );
                    $ph_name               = $ph_info['non_r_name'];
                    $ph_roll               = $ph_info['non_r_roll'];
                    $ph_reg                = $ph_info['non_r_reg'];
                    $ph_amount             = $ph_info['non_r_fee'];
                    $ph_session            = $ph_info['non_r_session'];
                    $ph_start              = $ph_info['non_r_start'];
                    $addmission_month_info = str_split( $ph_start, 1 );
                    $addmission_month      = (int) ( $addmission_month_info[5] . $addmission_month_info[6] );
                    $addmission_year       = (int) ( str_split( $ph_start, 4 )[0] );
                    $ph_submitted          = $_SESSION['admin_name'];
                    $ph_month              = "Admission Fee + </br>" . $display_months[$addmission_month] . " (" . $addmission_year . ")";
                    // Put Payment History
                    $r_history_query = "INSERT INTO payment_history(ph_name,ph_roll,ph_reg,book_num,ph_receipt_num,ph_amount,ph_month,ph_date,ph_submitted) VALUES('$ph_name',$ph_roll,$ph_reg,$book_num,$non_r_receipt,$ph_amount,'$ph_month',now(),'$ph_submitted')";
                    $r_history_mgs   = mysqli_query( $this->conn, $r_history_query );
                    if ( $r_history_mgs ) {

                        // Delete  Receipt Number
                        $receipt_dlt_query   = "DELETE FROM receipt_info WHERE book_num=$book_num&&receipt_num=$non_r_receipt";
                        $receipt_deleted_mgs = mysqli_query( $this->conn, $receipt_dlt_query );

                        if ( $receipt_deleted_mgs ) {

                            // For send Mail
                            // $to_email = "learnwithfair@gmail.com";
                            // $subject  = "Simple Email Test via PHP";
                            // $body     = "Hi, This is test email send by PHP Script";
                            // $headers  = "From: rahatul.ice.09.pust@gmail.com";

                            // if ( mail( $to_email, $subject, $body, $headers ) ) {
                            //     echo "Email successfully sent to $to_email...";
                            // } else {
                            //     echo "Email sending failed...";
                            // }

                            return "successful";
                        }
                    }
                }

            }
        } else {
            return "Receipt number is invalid.";
        }

    }

    //Temporary Studented Approve
    public function non_r_temp_approve( $data )
    {
        $id                       = $data['non_r_id'];
        $non_r_approve_query      = "UPDATE nonresidential_info SET non_r_start=now(),non_r_status='Illegal' WHERE non_r_id=$id";
        $return_non_r_approve_mgs = mysqli_query( $this->conn, $non_r_approve_query );
        if ( $return_non_r_approve_mgs ) {
            return "successful";
        } else {
            return "Unsuccessful";
        }
    }

    // Update Residential Info
    public function r_update( $data )
    {
        $u_r_id          = $data['u_r_id'];
        $u_r_name        = $data['u_r_name'];
        $u_r_roll        = $data['u_r_roll'];
        $u_r_reg         = $data['u_r_reg'];
        $u_r_session     = $data['u_r_session'];
        $u_r_dept        = $data['u_r_dept'];
        $u_r_rm          = $data['u_r_rm'];
        $u_r_hall_id     = $data['u_r_hall_id'];
        $u_r_birth       = $data['u_r_birth'];
        $u_r_mob         = $data['u_r_mob'];
        $u_r_email       = $data['u_r_email'];
        $u_r_fname       = $data['u_r_fname'];
        $u_r_mname       = $data['u_r_mname'];
        $u_r_pre_address = $data['u_r_pre_address'];
        $u_r_per_address = $data['u_r_per_address'];

        // Get Roll From Non Residential Info
        $r_find_roll_query      = "SELECT * FROM nonresidential_info WHERE non_r_id=$u_r_id";
        $return_r_find_roll_mgs = mysqli_query( $this->conn, $r_find_roll_query );
        $get_roll               = mysqli_fetch_assoc( $return_r_find_roll_mgs );
        $u_roll                 = $get_roll['non_r_roll'];

        // Update Non Residential Info
        $non_r_update_query      = "UPDATE nonresidential_info SET non_r_name='$u_r_name',non_r_roll=$u_r_roll,non_r_reg=$u_r_reg,non_r_session=$u_r_session,non_r_dept='$u_r_dept',non_r_rm=$u_r_rm,non_r_hall_id=$u_r_hall_id,non_r_birth='$u_r_birth',non_r_mob='$u_r_mob',non_r_email='$u_r_email',non_r_fname='$u_r_fname',non_r_mname='$u_r_mname',non_r_pre_address='$u_r_pre_address',non_r_per_address='$u_r_per_address' WHERE non_r_id=$u_r_id";
        $return_non_r_update_mgs = mysqli_query( $this->conn, $non_r_update_query );
        if ( $return_non_r_update_mgs ) {

            // Select Residential Info
            $r_select_query      = "SELECT * FROM residential_info WHERE r_roll=$u_roll";
            $return_r_select_mgs = mysqli_query( $this->conn, $r_select_query );
            $r_ids               = array();

            // Get Residential ID
            while ( $r_id_info = mysqli_fetch_assoc( $return_r_select_mgs ) ) {
                array_push( $r_ids, $r_id_info['r_id'] );

            }
            $r_year = $u_r_session;
            // Update Residential Info
            for ( $i = 0; $i < count( $r_ids ); $i++ ) {
                $r_year++;
                $r_id                = $r_ids[$i];
                $r_update_query      = "UPDATE residential_info SET r_roll=$u_r_roll,r_reg=$u_r_reg,r_year=$r_year,r_rm=$u_r_rm,r_start=$u_r_session WHERE r_id=$r_id";
                $return_r_update_mgs = mysqli_query( $this->conn, $r_update_query );
            }
            return "successful";

        } else {
            return "Update Unsuccessfull.";
        }

    }

    // Put in the Residential Info
    // public function put_r_info( $id ) {
    //     $display_r_query = "SELECT * FROM nonresidential_info WHERE non_r_id=$id";
    //     $r_info          = mysqli_query( $this->conn, $display_r_query );

    //     while ( $r_unique_info = mysqli_fetch_assoc( $r_info ) ) {
    //         $r_roll = $r_unique_info['non_r_roll'];
    //         $r_reg  = $r_unique_info['non_r_reg'];
    //         $r_rm   = $r_unique_info['non_r_rm'];
    //         $r_year = $r_unique_info['non_r_session'];
    //         for ( $year = ( $r_year + 1 ); $year <= ( $r_year + 5 ); $year++ ) {
    //             $r_paid_query    = "INSERT INTO residential_info(r_roll,r_reg,r_year,r_rm,r_jan,r_feb,r_mar,r_apr,r_may,r_jun,r_jul,r_aug,r_sep,r_oct,r_nov,r_dec,r_start,r_status) VALUES($r_roll,$r_reg,$year,$r_rm,'Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid',$r_year,'Uncompleted')";
    //             $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
    //         }

    //     }
    // }

    // Add Year in the Residential Info
    public function r_add_year()
    {
        $roll                = $_SESSION['r_roll'];
        $display_non_r_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$roll";
        $non_r_info          = mysqli_query( $this->conn, $display_non_r_query );
        while ( $non_r_data = mysqli_fetch_assoc( $non_r_info ) ) {

            $r_roll                = $non_r_data['non_r_roll'];
            $r_reg                 = $non_r_data['non_r_reg'];
            $r_year                = $non_r_data['non_r_session'];
            $r_rm                  = $non_r_data['non_r_rm'];
            $non_r_start           = $non_r_data['non_r_start'];
            $addmission_month_info = str_split( $non_r_start, 1 );
            $addmission_month      = (int) ( $addmission_month_info[5] . $addmission_month_info[6] );
            $addmission_year       = (int) ( str_split( $non_r_start, 4 )[0] );
        }
        $display_r_query = "SELECT * FROM residential_info WHERE r_roll=$roll";
        $r_info          = mysqli_query( $this->conn, $display_r_query );
        $year_count      = mysqli_num_rows( $r_info );
        $year            = $r_year + $year_count + 1;

        $r_paid_query    = "INSERT INTO residential_info(r_roll,r_reg,r_year,r_rm,r_jan,r_feb,r_mar,r_apr,r_may,r_jun,r_jul,r_aug,r_sep,r_oct,r_nov,r_dec,r_addmission_month,r_addminssion_year,r_start,r_status) VALUES($r_roll,$r_reg,$year,$r_rm,'Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid',$addmission_month,$addmission_year,$r_year,1)";
        $return_paid_mgs = mysqli_query( $this->conn, $r_paid_query );
        if ( isset( $return_paid_mgs ) ) {
            return "successful";
        } else {
            return "unsuccessful";

        }

    }

    // Display Contact Message
    public function display_message()
    {
        $display_message_query      = "SELECT * FROM message_info ORDER BY message_id DESC";
        $return_display_content_mgs = mysqli_query( $this->conn, $display_message_query );
        if ( isset( $return_display_content_mgs ) ) {
            return $return_display_content_mgs;
        } else {
            die( "Data is not found!!" );
        }

    }

    // Delete Contact Message
    public function mgs_dlt( $id )
    {
        $mgs_dlt_query = "DELETE FROM message_info WHERE message_id=$id";
        $result2       = mysqli_query( $this->conn, $mgs_dlt_query );

        if ( $result2 ) {
            return "successful";

        } else {
            return "Delete Unsuccessfull.";
        }
    }

    // Display Payment History
    public function display_history()
    {
        $display_history_query      = "SELECT * FROM payment_history ORDER BY ph_id DESC";
        $return_display_history_mgs = mysqli_query( $this->conn, $display_history_query );
        if ( isset( $return_display_history_mgs ) ) {
            return $return_display_history_mgs;
        } else {
            die( "History is not found!!" );
        }

    }

    // Delete Payment History
    public function delete_history()
    {
        $from_date    = $_SESSION['from_date'];
        $to_date      = $_SESSION['to_date'];
        $ph_dlt_query = "DELETE FROM payment_history WHERE ph_date BETWEEN '$from_date' AND '$to_date'";
        $result       = mysqli_query( $this->conn, $ph_dlt_query );

        if ( isset( $result ) ) {
            return "successful";
            // unset( $_SESSION['from_date'] );
            // unset( $_SESSION['to_date'] );
        } else {
            return "unsuccessful";

        }

    }

    // Display Payment Query
    public function display_payment_query( $data )
    {
        $from_months = str_split( $data['from_date'], 1 );
        $from_month  = (int) ( $from_months[5] . $from_months[6] );
        $from_year   = (int) ( str_split( $data['from_date'], 4 )[0] );

        $to_months = str_split( $data['to_date'], 1 );
        $to_month  = (int) ( $to_months[5] . $to_months[6] );
        $to_year   = (int) ( str_split( $data['to_date'], 4 )[0] );

        if ( $from_year != $to_year ) {
            $_SESSION['payment_query'] = "unsuccessful";

        } elseif ( $from_month > $to_month ) {
            $_SESSION['payment_query'] = "unsuccessful";

        } else {
            $display_payment_query = "SELECT * FROM residential_info WHERE r_year=$from_year&&r_status=1 ORDER BY r_rm ASC";
            $return_payment_mgs    = mysqli_query( $this->conn, $display_payment_query );
            if ( isset( $return_payment_mgs ) ) {
                return $return_payment_mgs;
            } else {
                die( "No Result found!!" );
            }

        }

    }

    // Display History Query
    public function display_history_query()
    {

        $from_date                  = $_SESSION['from_date'];
        $to_date                    = $_SESSION['to_date'];
        $display_history_query      = "SELECT * FROM payment_history WHERE ph_date BETWEEN '$from_date' AND '$to_date' ORDER BY ph_date ASC";
        $return_display_history_mgs = mysqli_query( $this->conn, $display_history_query );
        if ( isset( $return_display_history_mgs ) ) {
            return $return_display_history_mgs;
        } else {
            die( "History is not found!!" );
        }

    }

    public function non_r_info_by_roll( $roll )
    {
        $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_roll=$roll";
        $r_display_data  = mysqli_query( $this->conn, $r_display_query );
        $r_info          = mysqli_fetch_assoc( $r_display_data );
        return $r_info;
    }

    // Add Receipt Number
    public function add_receipt_num( $data )
    {
        $book_num   = $data['book_num'];
        $from_r_num = $data['from_r_num'];
        $to_r_num   = $data['to_r_num'];
        if ( $from_r_num > $to_r_num ) {
            return "Unsuccessful.";
        } else {
            for ( $i = $from_r_num; $i <= $to_r_num; $i++ ) {
                $receipt_display_query = "SELECT * FROM receipt_info WHERE receipt_num=$i&&book_num=$book_num";
                $receipts              = mysqli_query( $this->conn, $receipt_display_query );
                if ( mysqli_fetch_assoc( $receipts ) ) {
                    return "This Receipt Number Already Registered!!";
                } else {
                    $add_receipt_query = "INSERT INTO receipt_info(receipt_num,book_num) VALUES($i,$book_num)";
                    $return_mgs        = mysqli_query( $this->conn, $add_receipt_query );

                }
            }
            if ( $return_mgs ) {
                return "successful";
            } else {
                return "Unsuccessful.";
            }

        }

    }

    // Display Receipt Number
    public function display_receipt()
    {
        $display_receipt_query  = "SELECT * FROM receipt_info ORDER BY book_num ASC";
        $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
        if ( isset( $return_display_receipt ) ) {
            return $return_display_receipt;
        } else {
            die( "Receipt Number is not found!!" );
        }

    }

    // Display Notice
    public function display_notice()
    {
        $display_receipt_query  = "SELECT * FROM upload_notice ORDER BY n_id DESC";
        $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
        if ( isset( $return_display_receipt ) ) {
            return $return_display_receipt;
        } else {
            die( "Receipt Number is not found!!" );
        }

    }

    // Delete  Receipt Number
    public function receipt_dlt( $id )
    {
        $receipt_dlt_query = "DELETE FROM receipt_info WHERE receipt_id=$id";
        $result            = mysqli_query( $this->conn, $receipt_dlt_query );

        if ( $result ) {
            return "successful";

        } else {
            return "Unsuccessfull.";
        }
    }

    // Delete  Notice
    public function notice_dlt( $id )
    { // Get Image Name
        $search_notice        = "SELECT * FROM upload_notice WHERE n_id=$id";
        $search_notice_result = mysqli_query( $this->conn, $search_notice );
        $notice_data          = mysqli_fetch_assoc( $search_notice_result );

        if ( isset( $notice_data ) ) {
            $notice_dlt_query = "DELETE FROM upload_notice WHERE n_id=$id";
            $result           = mysqli_query( $this->conn, $notice_dlt_query );
            if ( isset( $result ) ) {
                $pdf = $notice_data['n_file'];
                unlink( "../notice/$pdf" );

                return "successful";

            } else {
                return "Delete Unsuccessful.";
            }
        }

    }

    // Update Receipt Number
    public function receipt_update( $data )
    {
        $id                = $data['update_id'];
        $book_num          = $data['book_num'];
        $receipt_num       = $data['receipt_num'];
        $r_receipt_u_query = "UPDATE receipt_info SET book_num=$book_num,receipt_num=$receipt_num  WHERE receipt_id=$id";
        $return_update_mgs = mysqli_query( $this->conn, $r_receipt_u_query );

        if ( $return_update_mgs ) {
            return "successful";

        } else {
            return "Unsuccessfull.";
        }
    }

    // Update Notice
    public function notice_update( $data )
    {
        $id                = $data['update_id'];
        $n_title           = $data['n_title'];
        $r_receipt_u_query = "UPDATE upload_notice SET n_title='$n_title' WHERE n_id=$id";

        $return_update_mgs = mysqli_query( $this->conn, $r_receipt_u_query );

        if ( $return_update_mgs ) {
            return "successful";

        } else {
            return "Unsuccessfull.";
        }
    }

    // Check Receipt Number
    public function receipt_query( $data )
    {
        $book_num               = $data['book_num'];
        $receipt_num            = $data['receipt_num'];
        $display_receipt_query  = "SELECT * FROM receipt_info WHERE book_num=$book_num&&receipt_num=$receipt_num";
        $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
        $varifyed               = mysqli_fetch_assoc( $return_display_receipt );
        $info                   = array();
        array_push( $info, $book_num );
        array_push( $info, $receipt_num );
        if ( isset( $varifyed ) ) {
            $_SESSION['receipt_num'] = $varifyed['receipt_num'];
            $_SESSION['book_num']    = $varifyed['book_num'];
            return $info;

        } else {
            unset( $_SESSION['receipt_num'] );
            unset( $_SESSION['book_num'] );
            return $info;
        }

    }

    // Check Receipt Number for Payment Change
    public function c_receipt_query( $data )
    {
        $book_num               = $data['book_num'];
        $receipt_num            = $data['receipt_num'];
        $ph_roll                = $_SESSION['c_r_roll'];
        $display_receipt_query  = "SELECT * FROM payment_history WHERE ph_roll=$ph_roll&&book_num=$book_num&&ph_receipt_num=$receipt_num";
        $return_display_receipt = mysqli_query( $this->conn, $display_receipt_query );
        $varifyed               = mysqli_fetch_assoc( $return_display_receipt );
        $indicated              = mysqli_num_rows( $return_display_receipt );
        $info                   = array();
        array_push( $info, $book_num );
        array_push( $info, $receipt_num );
        if ( $indicated == 1 ) {
            $_SESSION['c_receipt_num'] = $varifyed['ph_receipt_num'];
            $_SESSION['c_book_num']    = $varifyed['book_num'];
            $_SESSION['c_ph_amount']   = $varifyed['ph_amount'];
            return $info;

        } else {
            unset( $_SESSION['c_receipt_num'] );
            unset( $_SESSION['c_book_num'] );
            unset( $_SESSION['c_ph_amount'] );
            return $info;
        }

    }

    // Check Residential Number
    public function search_r_query( $data )
    {
        $r_roll                = $data['search_r_roll'];
        $display_r_roll_query  = "SELECT * FROM residential_info WHERE r_roll=$r_roll&&r_status=1";
        $return_display_r_roll = mysqli_query( $this->conn, $display_r_roll_query );
        $varifyed              = mysqli_fetch_assoc( $return_display_r_roll );
        if ( isset( $varifyed ) ) {
            $_SESSION['r_roll'] = $varifyed['r_roll'];
            return $r_roll;

        } else {
            unset( $_SESSION['r_roll'] );
            return $r_roll;
        }

    }

    // Check Residential Payment
    public function check_r_payment( $data )
    {
        $r_roll                = $data['search_r_roll'];
        $display_r_roll_query  = "SELECT * FROM residential_info WHERE r_roll=$r_roll&&r_status=1";
        $return_display_r_roll = mysqli_query( $this->conn, $display_r_roll_query );
        $varifyed              = mysqli_fetch_assoc( $return_display_r_roll );
        if ( isset( $varifyed ) ) {
            $_SESSION['check_r_roll'] = $varifyed['r_roll'];
            return $r_roll;

        } else {
            unset( $_SESSION['check_r_roll'] );
            return $r_roll;
        }

    }

    // Check Previous Residential Number
    public function check_pre_r_payment( $data )
    {
        $r_roll                = $data['search_r_roll'];
        $display_r_roll_query  = "SELECT * FROM residential_info WHERE r_roll=$r_roll&&r_status=0";
        $return_display_r_roll = mysqli_query( $this->conn, $display_r_roll_query );
        $varifyed              = mysqli_fetch_assoc( $return_display_r_roll );
        if ( isset( $varifyed ) ) {
            $_SESSION['check_pre_r_roll'] = $varifyed['r_roll'];
            return $r_roll;

        } else {
            unset( $_SESSION['check_pre_r_roll'] );
            return $r_roll;
        }

    }

    // Check Residential Number For change Payment
    public function c_search_r_query( $data )
    {
        $r_roll                = $data['search_r_roll'];
        $display_r_roll_query  = "SELECT * FROM residential_info WHERE r_roll=$r_roll&&r_status=1";
        $return_display_r_roll = mysqli_query( $this->conn, $display_r_roll_query );
        $varifyed              = mysqli_fetch_assoc( $return_display_r_roll );
        if ( isset( $varifyed ) ) {
            $_SESSION['c_r_roll'] = $varifyed['r_roll'];
            return $r_roll;

        } else {
            unset( $_SESSION['c_r_roll'] );
            return $r_roll;
        }

    }

    // Display Total Residential Info
    public function total_residential_info()
    {
        $r_display_query = "SELECT * FROM residential_info";
        $r_display_data  = mysqli_query( $this->conn, $r_display_query );
        $amount          = 0;
        $r_months        = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
        while ( $r_info = mysqli_fetch_assoc( $r_display_data ) ) {
            for ( $i = 1; $i <= 12; $i++ ) {
                $m = $r_months[$i];
                if ( $r_info[$m] == "Paid" ) {
                    $amount++;

                }
            }

        }
        return $amount;
    }

    // Display Yearly amount Info
    public function year_amount_info()
    {
        $that_year = date( "Y" );
        // $data_info       = (int) ( str_split( now(), 4 )[0] );
        $r_display_query = "SELECT * FROM residential_info WHERE r_year=$that_year";
        $r_display_data  = mysqli_query( $this->conn, $r_display_query );
        $amount          = array();
        $r_jan           = 0;
        $r_feb           = 0;
        $r_mar           = 0;
        $r_apr           = 0;
        $r_may           = 0;
        $r_jun           = 0;
        $r_jul           = 0;
        $r_aug           = 0;
        $r_sep           = 0;
        $r_oct           = 0;
        $r_nov           = 0;
        $r_dec           = 0;

        $r_months = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
        while ( $r_info = mysqli_fetch_assoc( $r_display_data ) ) {

            if ( $r_info[$r_months[1]] == "Paid" ) {
                $r_jan++;
            }
            if ( $r_info[$r_months[2]] == "Paid" ) {
                $r_feb++;
            }
            if ( $r_info[$r_months[3]] == "Paid" ) {
                $r_mar++;
            }
            if ( $r_info[$r_months[4]] == "Paid" ) {
                $r_apr++;
            }
            if ( $r_info[$r_months[5]] == "Paid" ) {
                $r_may++;
            }
            if ( $r_info[$r_months[6]] == "Paid" ) {
                $r_jun++;
            }
            if ( $r_info[$r_months[7]] == "Paid" ) {
                $r_jul++;
            }
            if ( $r_info[$r_months[8]] == "Paid" ) {
                $r_aug++;
            }
            if ( $r_info[$r_months[9]] == "Paid" ) {
                $r_sep++;
            }
            if ( $r_info[$r_months[10]] == "Paid" ) {
                $r_oct++;
            }
            if ( $r_info[$r_months[11]] == "Paid" ) {
                $r_nov++;
            }
            if ( $r_info[$r_months[12]] == "Paid" ) {
                $r_dec++;
            }

        }

        array_push( $amount, ( $r_jan * 250 ) );
        array_push( $amount, ( $r_feb * 250 ) );
        array_push( $amount, ( $r_mar * 250 ) );
        array_push( $amount, ( $r_apr * 250 ) );
        array_push( $amount, ( $r_may * 250 ) );
        array_push( $amount, ( $r_jun * 250 ) );
        array_push( $amount, ( $r_jul * 250 ) );
        array_push( $amount, ( $r_aug * 250 ) );
        array_push( $amount, ( $r_sep * 250 ) );
        array_push( $amount, ( $r_oct * 250 ) );
        array_push( $amount, ( $r_nov * 250 ) );
        array_push( $amount, ( $r_dec * 250 ) );
        return $amount;
    }

    // Display Yearly Admission amount Info
    public function yearly_admission_amount_info()
    {
        $total_amount = array();
        $end_month    = array( "", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12" );
        $end_date     = array( "", "31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31" );

        for ( $i = 1; $i <= 12; $i++ ) {
            $amount          = 0;
            $to_year         = (string) ( date( "Y" ) . "-" . $end_month[$i] . "-01" );
            $from_year       = (string) ( date( "Y" ) . "-" . $end_month[$i] . "-" . $end_date[$i] );
            $r_display_query = "SELECT * FROM nonresidential_info WHERE non_r_status='Residential'&&non_r_start BETWEEN '$to_year' AND '$from_year'";
            $r_display_data  = mysqli_query( $this->conn, $r_display_query );
            if ( isset( $r_display_data ) ) {
                while ( $r_info = mysqli_fetch_assoc( $r_display_data ) ) {
                    $amount = $amount + $r_info['non_r_fee'] - 250;
                }
            }

            array_push( $total_amount, $amount );

        }
        return $total_amount;
    }

    ###########################################################################################
    // Temporary Residential
    ###########################################################################################

    //add Illegal student data
    public function add_registration_data( $data )
    {

        $check_r_roll    = $data['check_r_roll'];
        $check_r_hall_id = $data['check_r_hall_id'];

        $check_query     = "SELECT * FROM hall_id WHERE (check_r_roll=$check_r_roll||check_r_hall_id=$check_r_hall_id)";
        $checking_result = mysqli_query( $this->conn, $check_query );
        $result1         = mysqli_fetch_assoc( $checking_result );
        if ( isset( $result1 ) ) {
            return "You are already Registared.";
        } else {
            // Putting Info
            $temp_r_query = "INSERT INTO hall_id(check_r_roll,check_r_hall_id) VALUES($check_r_roll,$check_r_hall_id)";
            $result       = mysqli_query( $this->conn, $temp_r_query );
            if ( $result ) {
                return "successful";
            } else {
                return "Unsuccessfull !!";
            }
        }
    }

    // Display  Residential Hall ID
    public function display_hall_id()
    {
        $display_r_query = "SELECT * FROM hall_id ORDER BY check_r_hall_id ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Display Dining Manager
    public function display_dining_manager()
    {
        $display_r_query = "SELECT * FROM dining_manager ORDER BY manager_id ASC";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        if ( isset( $display_r_info ) ) {
            return $display_r_info;
        }
    }

    // Update  Dining Manager
    public function update_dining_manager( $data )
    {
        $update_id     = $data['update_id'];
        $manager_block = $data['manager_block'];
        $manager_email = $data['manager_email'];
        $manager_pass  = $data['manager_pass'];

        $temp_r_update_query      = "UPDATE dining_manager SET manager_email='$manager_email',manager_pass='$manager_pass',manager_block='$manager_block' WHERE manager_id=$update_id";
        $return_temp_r_update_mgs = mysqli_query( $this->conn, $temp_r_update_query );
        if ( $return_temp_r_update_mgs ) {
            return "successful";
        } else {
            return "Update Unsuccessfull.";
        }
    }

    // Delete  Residential Hall ID
    public function delete_hall_id( $id )
    {

        $non_r_dlt_query = "DELETE FROM hall_id WHERE check_r_id=$id";
        $non_r_dlt_mgs   = mysqli_query( $this->conn, $non_r_dlt_query );
        if ( isset( $non_r_dlt_mgs ) ) {

            return "successful";

        } else {
            return "Delete Unsuccessful.";
        }

    }

    // Update  Residential Hall ID
    public function hall_id_update( $data )
    {
        $update_id         = $data['update_id'];
        $u_check_r_roll    = $data['u_check_r_roll'];
        $u_check_r_hall_id = $data['u_check_r_hall_id'];

        $temp_r_update_query      = "UPDATE hall_id SET check_r_roll=$u_check_r_roll,check_r_hall_id=$u_check_r_hall_id WHERE check_r_id=$update_id";
        $return_temp_r_update_mgs = mysqli_query( $this->conn, $temp_r_update_query );
        if ( $return_temp_r_update_mgs ) {

            return "successful";

        } else {
            return "Update Unsuccessfull.";
        }

    }

    // Check  Residential Hall ID
    public function check_r_info( $r_roll, $r_hall_id )
    {
        $display_r_query = "SELECT * FROM hall_id WHERE (check_r_roll=$r_roll&&check_r_hall_id=$r_hall_id)";
        $display_r_info  = mysqli_query( $this->conn, $display_r_query );
        $info            = mysqli_fetch_assoc( $display_r_info );

        if ( isset( $info ) ) {
            return 1;
        } else {
            return 0;
        }
    }

    ###########################################################################################
    // Temporary Residential
    ###########################################################################################

}
