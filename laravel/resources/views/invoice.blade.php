
@php
	use Codedge\Fpdf\Fpdf\Fpdf as FPDF;

	$fpdf = new FPDF;
	$fpdf->SetFont('Arial', 'B', 14);
	$fpdf->AddPage('P', 'A4');

	//Cell(width , height , text , border , end line , [align] )

	$fpdf->Cell(130, 5, 'DIGITAL FURNITURE.CO', 0, 0);
	$fpdf->Cell(59, 5, 'INVOICE', 0, 1); //end of line

	//set font to arial, regular, 12pt
	$fpdf->SetFont('Arial', '', 12);

	$fpdf->Cell(130, 5, '[Street Address]', 0, 0);
	$fpdf->Cell(59, 5, '', 0, 1); //end of line

	$fpdf->Cell(130, 5, '[City, Country, ZIP]', 0, 0);
	$fpdf->Cell(25, 5, 'Date', 0, 0);
	$fpdf->Cell(34, 5, '[dd/mm/yyyy]', 0, 1); //end of line

	$fpdf->Cell(130, 5, 'Phone [+12345678]', 0, 0);
	$fpdf->Cell(25, 5, 'Invoice #', 0, 0);
	$fpdf->Cell(34, 5, '[1234567]', 0, 1); //end of line

	$fpdf->Cell(130, 5, 'Fax [+12345678]', 0, 0);
	$fpdf->Cell(25, 5, 'Customer ID', 0, 0);
	$fpdf->Cell(34, 5, '[1234567]', 0, 1); //end of line

	//make a dummy empty cell as a vertical spacer
	$fpdf->Cell(189, 10, '', 0, 1); //end of line

	//billing address
	$fpdf->Cell(100, 5, 'Bill to', 0, 1); //end of line

	//add dummy cell at beginning of each line for indentation
	$fpdf->Cell(10, 5, '', 0, 0);
	$fpdf->Cell(90, 5, '[Name]', 0, 1);

	$fpdf->Cell(10, 5, '', 0, 0);
	$fpdf->Cell(90, 5, '[Company Name]', 0, 1);

	$fpdf->Cell(10, 5, '', 0, 0);
	$fpdf->Cell(90, 5, '[Address]', 0, 1);

	$fpdf->Cell(10, 5, '', 0, 0);
	$fpdf->Cell(90, 5, '[Phone]', 0, 1);

	//make a dummy empty cell as a vertical spacer
	$fpdf->Cell(189, 10, '', 0, 1); //end of line

	//invoice contents
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->Cell(90, 5, 'Description', 1, 0);
	$fpdf->Cell(40, 5, 'Price', 1, 0);
	$fpdf->Cell(25, 5, 'Amount', 1, 0);
	$fpdf->Cell(34, 5, 'Total', 1, 1); //end of line

	$fpdf->SetFont('Arial', '', 12);

	//Numbers are right-aligned so we give 'R' after new line parameter
	// foreach($data as $data){
	// 	$fpdf->Cell(90, 5, $data->name, 1, 0);
	// 	$fpdf->Cell(40, 5, number_format($data->harga), 1, 0);
	// 	$fpdf->Cell(25, 5, $data->jumlah, 1, 0);
	// 	$fpdf->Cell(34, 5, number_format($data->harga*$data->jumlah), 1, 1, 'R');
	// 	$total += $data->harga*$data->jumlah;
	// }
	//summary
	$fpdf->Cell(130, 5, '', 0, 0);
	$fpdf->Cell(25, 5, 'Subtotal', 0, 0);
	$fpdf->Cell(10, 5, 'RP', 1, 0);
	$fpdf->Cell(24, 5, '20', 1, 1, 'R'); //end of line

	$fpdf->Cell(130, 5, '', 0, 0);
	$fpdf->Cell(25, 5, 'Tax Rate', 0, 0);
	$fpdf->Cell(10, 5, 'RP', 1, 0);
	$fpdf->Cell(24, 5, '10%', 1, 1, 'R'); //end of line

	$fpdf->Cell(130, 5, '', 0, 0);
	$fpdf->Cell(25, 5, 'Total Due', 0, 0);
	$fpdf->Cell(10, 5, 'RP', 1, 0);
	$fpdf->Cell(24, 5, '0.1 * $total', 1, 1, 'R');
	$fpdf->output();
@endphp