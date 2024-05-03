<?php if ( isset( $_POST['rpdf'] ) ) {
    // Connection of Data base
    include_once "connection.php";
    // Get fpdf class
    require 'fpdf.php';
    // Create object of connection.php file class
    $obj3 = new pdf_print();
    $roll = $_POST['rpdfinfo'];

    // Get Residential Info
    $display_r_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$roll&&(non_r_status='Residential'||non_r_status='Illegal'))";
    $display_r_info  = mysqli_query( $obj3->conn, $display_r_query );

    class PDF extends FPDF
    {
        // Page header
        public function Header()
        {
            // Move to the  right
            $this->Cell( 80 );
            // Set Font
            $this->SetFont( 'Arial', 'B', 15 );
            // Logo
            $this->Image( 'assets/pust.png', 95, 5, 15 );
            // Title
            $this->Cell( 30, 40, 'Pabna University Of Science And Technology', 0, 1, 'C' );
            // Position at 3.7 cm from top
            $this->SetY( 37 );
            // Set font
            $this->SetFont( 'Arial', 'B', 13 );
            // Set sub title
            $this->Cell( 0, 0, 'Bangabandhu Sheikh Mujibur Rahman Hall', 0, 1, 'C' );
            // Set Line
            $this->Line( 10, 42, 200, 42 );
            // Set font
            $this->SetFont( 'Arial', '', 10 );
            // Set Date
            $this->Cell( 0, 17, "Date: " . date( "d-m-Y" ), 0, 1, 'R' );
        }

        // Page footer
        public function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY( -15 );
            // Arial italic 8
            $this->SetFont( 'Arial', 'I', 8 );
            // Page number
            $this->Cell( 0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C' );
        }
    }

    // Initialization of Heading
    $info = mysqli_fetch_assoc( $display_r_info );
    // Initialization of Heading and Info
    $info_title   = array( "Full Name", "Roll Number", "Registration No", "Hall ID", "Session", "Date of Birth", "Admission Date", "Room No", "Mobile No", "Email", "Name of the Department", "Father's Name", "Mother's Name", "Present Address", "Permanent Address" );
    $info_heading = array( "non_r_name", "non_r_roll", "non_r_reg", "non_r_hall_id", "non_r_session", "non_r_birth", "non_r_start", "non_r_rm", "non_r_mob", "non_r_email", "non_r_dept", "non_r_fname", "non_r_mname", "non_r_pre_address", "non_r_per_address" );
    // Initialization of Payment Info
    $r_months       = array( "r_year", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
    $display_months = array( "YEAR", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );

    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont( 'Arial', 'B', 13 );
    $pdf->Cell( 0, 5, "\"Residential Information\"", 0, 1, 'C' );
    $pdf->Image( 'uploads/' . $info['non_r_img'], 175, 65, 25 );
    $pdf->SetFont( 'Times', '', 11 );
    $pdf->Ln( 10 );
    // Set Info section
    for ( $i = 0; $i < count( $info_title ); $i++ ) {
        if ( $i == 3 ) {
            $pdf->Cell( 50, 6, $info_title[$i], 0, 0 );
            if ( $info['non_r_status'] == 'Illegal' ) {
                $pdf->Cell( 180, 6, ":  None", 0, 1 );
            } else {
                $pdf->Cell( 180, 6, ":  " . $info[$info_heading[$i]], 0, 1 );
            }

        } elseif ( $i == 4 ) {
            $pdf->Cell( 50, 6, $info_title[$i], 0, 0 );
            $pdf->Cell( 180, 6, ":  " . $info[$info_heading[$i]] . "-" . ( $info[$info_heading[$i]] + 1 ), 0, 1 );
        } else {
            $pdf->Cell( 50, 6, $info_title[$i], 0, 0 );
            $pdf->Cell( 180, 6, ":  " . $info[$info_heading[$i]], 0, 1 );
        }
    }

    if ( $info['non_r_status'] == 'Residential' ) {
        // Get Residential Payment Info
        $display_r_payment_query = "SELECT * FROM residential_info WHERE r_roll=$roll ORDER BY r_year ASC";
        $display_r_payment_info  = mysqli_query( $obj3->conn, $display_r_payment_query );

        // Initialize of Payment Info
        $pdf->Ln( 15 );
        $pdf->SetFont( 'Arial', 'B', 12 );
        $pdf->Cell( 0, 0, 'Payment Info', 0, 1, 'C' );
        $pdf->Ln( 10 );
        $pdf->SetFont( 'Arial', 'B', 10 );
        // Set Payment Title
        for ( $i = 0; $i < 13; $i++ ) {
            $pdf->Cell( 15, 6, $display_months[$i], 0, 0, "C" );
        }
        $pdf->Ln( 8 );
        $pdf->SetFont( 'Times', '', 11 );
        // Set Payment Info
        while ( $payment_info = mysqli_fetch_assoc( $display_r_payment_info ) ) {
            for ( $i = 0; $i < 13; $i++ ) {
                $pdf->Cell( 15, 6, $payment_info[$r_months[$i]], 0, 0, "C" );
            }
            $pdf->Ln( 8 );
        }
    }

    // Set Signature section
    $pdf->Ln( 15 );
    $pdf->SetFont( 'Arial', 'B', 10 );
    $pdf->Cell( 125 );
    $pdf->Cell( 0, 7, "Provost", 0, 1, 'C' );
    $pdf->Cell( 125 );
    $pdf->Cell( 0, 5, "Bangabandhu Sheikh Mujibur Rahman Hall", 0, 1, 'C' );
    $pdf->Cell( 125 );
    $pdf->Cell( 0, 5, "Pabna University Of Science And Technology", 0, 1, 'C' );
    $pdf->Output();

}