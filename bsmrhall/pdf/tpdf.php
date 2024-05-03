<?php

if ( isset( $_POST['t_download'] ) ) {
    // Connection of Data base
    include_once "connection.php";
    // Get fpdf class
    require 'fpdf.php';

    $obj3 = new pdf_print();
    session_start();

    // Initialization of Heading and Info
    $info_title  = array( "Full Name", "Roll Number", "Registration No", "Session", "Name of the Dept.", "Residential Status", "Last Payment" );
    $departments = array( "", "CSE", "EEE", "Mathematics", "B. Administration", "EECE", "ICE", "Physics", "Economics", "GE", "Bangla", "Civil Engineering", "Architecture", "Pharmacy", "Chemistry", "Social Work", "Statistics", "URP", "English", "P. Administration", "HBS", "THM" );

    // Initialization of Payment Info
    $r_months       = array( "r_year", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
    $display_months = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );
    class PDF extends FPDF
    {
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

        // Dash Line
        public function SetDash( $black = null, $white = null )
        {
            if ( $black !== null ) {
                $s = sprintf( '[%.3F %.3F] 0 d', $black * $this->k, $white * $this->k );
            } else {
                $s = '[] 0 d';
            }

            $this->_out( $s );
        }
    }
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $dash_pos = 0;
    $qr_pos   = array( 0, 17, 88, 158, 229 );
    for ( $i = 1; $i <= $_SESSION['t_count']; $i++ ) {
        $data = "";
        $dash_pos++;
        $t_names = "t_name" . (string) $i;
        $t_rolls = "t_roll" . (string) $i;
        $t_regs  = "t_reg" . (string) $i;
        $roll    = $_SESSION[$t_rolls];

        $pdf->SetFont( 'Arial', 'B', 13 );
        $pdf->Cell( 0, 5, "\"TOKEN OF BSMRH (PUST)\"", 0, 1, 'C' );
        $pdf->SetFont( 'Arial', '', 8 );
        $pdf->Cell( 185, 2, "Date: " . date( "d-m-Y" ), 0, 0, 'R' );
        $pdf->SetFont( 'Times', '', 11 );
        $pdf->Ln( 7 );
        $pdf->Cell( 50, 6, "Full Name", 0, 0 );
        $pdf->Cell( 180, 6, ":  " . $_SESSION[$t_names], 0, 1 );
        $pdf->Cell( 50, 6, "Roll No", 0, 0 );
        $pdf->Cell( 180, 6, ":  " . $_SESSION[$t_rolls], 0, 1 );
        $data .= "Roll:" . $_SESSION[$t_rolls] . "\n";
        $reg_r_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$roll)";
        $reg_r_info  = mysqli_query( $obj3->conn, $reg_r_query );
        $reg_check   = mysqli_fetch_assoc( $reg_r_info );
        if ( isset( $reg_check ) ) {
            $pdf->Cell( 50, 6, "Reg No", 0, 0 );
            $pdf->Cell( 180, 6, ":  " . $reg_check['non_r_reg'], 0, 1 );
            $data .= "Reg:" . $reg_check['non_r_reg'] . "\n";
        } else {
            $pdf->Cell( 50, 6, "Reg No", 0, 0 );
            $pdf->Cell( 180, 6, ":  " . $_SESSION[$t_regs], 0, 1 );
        }

        $session = (int) ( str_split( $_SESSION[$t_rolls], 2 )[0] );
        $s       = $session - 1;
        $pdf->Cell( 50, 6, "Session", 0, 0 );
        $pdf->Cell( 180, 6, ":  20" . $s . "-20" . $session, 0, 1 );
        $data .= "Session:20" . $s . "-20" . $session . "\n";
        $subject = (int) ( str_split( $_SESSION[$t_rolls], 2 )[1] );
        $pdf->Cell( 50, 6, "Name of the Dept.", 0, 0 );
        $pdf->Cell( 180, 6, ":  " . $departments[$subject], 0, 1 );
        // $data .= "Dept:" . $departments[$subject] . "\n";
        // Get Residential Info
        $display_r_query = "SELECT * FROM nonresidential_info WHERE (non_r_roll=$roll&&(non_r_status='Residential'||non_r_status='Illegal'))";
        $display_r_info  = mysqli_query( $obj3->conn, $display_r_query );
        $check           = mysqli_fetch_assoc( $display_r_info );
        if ( isset( $check ) ) {
            $pdf->Cell( 50, 6, "Residential Status", 0, 0 );
            $pdf->Cell( 180, 6, ":  Residential", 0, 1 );
            $data .= "Residential-Status:Residential" . "\n";
        } else {
            $pdf->Cell( 50, 6, "Residential Status", 0, 0 );
            $pdf->Cell( 180, 6, ":  Non-residential", 0, 1 );
            $data .= "Residential-Status:Non-residential";
        }
        if ( isset( $check ) ) {
            if ( $check['non_r_status'] == "Residential" ) {
                // Get Residential Payment Info

                $display_r_payment_query = "SELECT * FROM residential_info WHERE r_roll=$roll ORDER BY r_year DESC";
                $display_r_payment_info  = mysqli_query( $obj3->conn, $display_r_payment_query );
                while ( $unique_info = mysqli_fetch_assoc( $display_r_payment_info ) ) {
                    // $year++;
                    $year  = $unique_info['r_year'];
                    $month = 0;
                    for ( $j = 12; $j >= 1; $j-- ) {
                        if ( $unique_info[$r_months[$j]] == "Paid" ) {
                            $month = $j;
                            break;
                        }
                    }
                    if ( $month != 0 ) {
                        break;
                    }
                }
                $date = $display_months[$month] . " - " . $year;
                $pdf->Cell( 50, 6, "Last Payment", 0, 0 );
                $pdf->Cell( 180, 6, ":  " . $date, 0, 1 );
                $data .= "LastPayment:" . $display_months[$month] . "-" . $year;
            } else {
                $pdf->Cell( 50, 6, "Last Payment", 0, 0 );
                $pdf->SetFont( 'Times', 'B', 11 );
                $pdf->Cell( 180, 6, ":  \"All Due\"", 0, 1 );
                $pdf->SetFont( 'Times', '', 11 );
                $data .= "LastPayment:All-Due";

            }
        } else {
            $pdf->Cell( 50, 6, "", 0, 0 );
            $pdf->Cell( 180, 6, "", 0, 1 );
        }

        // QR code genarate
        $pdf->Image( "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={$data}", 160, $qr_pos[$dash_pos], 50, 50, "png" );

        $pdf->SetLineWidth( 0.1 );
        $pdf->SetDash( 2, 4.5 ); //5mm on, 5mm off
        if ( $i % 4 == 0 ) {
            $pdf->Ln( 11.5 );
            $pdf->Line( 0, 70 * $dash_pos, 220, 70 * $dash_pos );
            $dash_pos = 0;
        } else {
            $pdf->Ln( 11.5 );
            $pdf->Line( 0, 70 * $dash_pos, 220, 70 * $dash_pos );
            $pdf->Ln( 5 );
        }
    }
    $pdf->Output();
}