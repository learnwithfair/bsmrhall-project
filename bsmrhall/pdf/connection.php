<?php
class pdf_print {
    public $conn, $preconn, $conn3;
    public $r_months = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
    public $display_months = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );
    public function __CONSTRUCT() {
        $bdhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "student_info";
        $this->conn = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        $this->conn3 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }
        if ( !( $this->conn3 ) ) {
            die( "Database connection Error!!" );
        }
    }
}