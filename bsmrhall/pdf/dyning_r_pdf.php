<?php if ( isset( $_POST['rpdf'] ) ) {
    // Connection of Data base
    include_once "connection.php";
    // Get fpdf class
    require 'fpdf.php';
    session_start();
    // Create object of connection.php file class
    $obj3          = new pdf_print();
    $manager_block = $_SESSION['manager_block'];

    // Get Dining Info

    // Get Previous Date
    // $week = 0;
    // $week = date( 'w' );
    // $date = date( 'Y-m-d', strtotime( "-" . ( 1 + $week ) . " days" ) );
    $date = $_POST['pdf_dining_meal_date'];
    if ( $manager_block == "A" ) {
        $display_ad_query = "SELECT * FROM dining_meal  WHERE meal_date='$date' ORDER BY meal_roll ASC";
        $display_d_info   = mysqli_query( $obj3->conn3, $display_ad_query );
    } else {
        $display_bd_query = "SELECT * FROM bdining_meal  WHERE meal_date='$date' ORDER BY meal_roll ASC";
        $display_d_info   = mysqli_query( $obj3->conn3, $display_bd_query );
    }

    class PDF extends FPDF
    {
        // Page header
        public function Header()
        {
            // Move to the  right
            $this->Cell( 80 );
            // Set Font
            $this->SetFont( 'Arial', 'B', 15 );
            // Title
            $this->Cell( 30, 15, 'Pabna University Of Science And Technology', 0, 1, 'C' );
            // Position at 3.7 cm from top
            $this->SetY( 37 );
            // Set font
            $this->SetFont( 'Arial', 'B', 13 );
            // Set sub title
            $this->Cell( 0, -20, 'Bangabandhu Sheikh Mujibur Rahman Hall', 0, 1, 'C' );
            // Set Line
            $this->Line( 10, 35, 200, 35 );
            // Set font
            $this->SetFont( 'Arial', '', 10 );
            // Set Date
            $this->Cell( 0, 47, "Date: " . date( "d-m-Y" ), 0, 1, 'R' );
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

        public function headerTable()
        {
            $this->SetFont( "Times", "B", 12 );
            $this->Cell( 10, 8, "S/N", 1, 0, 'C' );
            $this->Cell( 50, 8, "Full Name", 1, 0, 'C' );
            $this->Cell( 21, 8, "Roll", 1, 0, 'C' );
            $this->Cell( 21, 8, "Room No", 1, 0, 'C' );
            $this->Cell( 21, 8, "Breakfast", 1, 0, 'C' );
            $this->Cell( 21, 8, "Lunch", 1, 0, 'C' );
            $this->Cell( 21, 8, "Dinner", 1, 0, 'C' );
            $this->Cell( 21, 8, "Total", 1, 0, 'C' );
            $this->Ln();
        }

    }

    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $dash_pos = 0;
    $pdf->SetFont( 'Arial', 'B', 13 );

    $manager_block = $_SESSION['manager_block'];
    if ( $manager_block == "A" ) {
        $pdf->Cell( 0, -20, "\"A-Block Dining Meal Info\"", 0, 1, 'C' );
    } else {
        $pdf->Cell( 0, -20, "\"B-Block Dining Meal Info\"", 0, 1, 'C' );
    }

    $pdf->Cell( 0, 10, "", 0, 1 );

    $pdf->SetFont( 'Times', '', 11 );
    $pdf->Ln( 10 );
    // Set Header section
    $pdf->headerTable();
// Calculate Total
    $count        = 0;
    $morning_meal = 0;
    $lunch_meal   = 0;
    $dinner_meal  = 0;
    $total        = 0;

    // Set Dining Info
    if ( isset( $display_d_info ) ) {
        while ( $data = mysqli_fetch_assoc( $display_d_info ) ) {
            $count++;
            $pdf->Cell( 10, 7, $count, 1, 0, 'C' );
            $pdf->Cell( 50, 7, $data['meal_name'], 1, 0, 'L' );
            $pdf->Cell( 21, 7, $data['meal_roll'], 1, 0, 'C' );
            $pdf->Cell( 21, 7, $data['meal_room'], 1, 0, 'C' );
            $pdf->Cell( 21, 7, $data['morning_meal'], 1, 0, 'C' );
            $morning_meal = $morning_meal + $data['morning_meal'];
            $pdf->Cell( 21, 7, $data['lunch'], 1, 0, 'C' );
            $lunch_meal = $lunch_meal + $data['lunch'];
            $pdf->Cell( 21, 7, $data['dinner'], 1, 0, 'C' );
            $dinner_meal = $dinner_meal + $data['dinner'];
            $pdf->Cell( 21, 7, $data['meal_total'], 1, 0, 'C' );
            $total = $total + $data['meal_total'];
            $pdf->Ln();
        }

    }

    $pdf->SetFont( "Times", "B", 12 );
    $pdf->Cell( 10, 8, "", 1, 0, 'C' );
    $pdf->Cell( 50, 8, "", 1, 0, 'C' );
    $pdf->Cell( 21, 8, "", 1, 0, 'C' );
    $pdf->Cell( 21, 8, "Total", 1, 0, 'C' );
    $pdf->Cell( 21, 8, $morning_meal, 1, 0, 'C' );
    $pdf->Cell( 21, 8, $lunch_meal, 1, 0, 'C' );
    $pdf->Cell( 21, 8, $dinner_meal, 1, 0, 'C' );
    $pdf->Cell( 21, 8, $total, 1, 0, 'C' );
    $pdf->Ln();

    $pdf->Output();

}