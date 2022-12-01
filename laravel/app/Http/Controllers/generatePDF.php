<?php

namespace App\Http\Controllers;

use App\Models\id_update;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;


class generatePDF extends Controller
{
    protected $fpdf;
    private $total = 0;
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function generatePDF(Request $request)
    {   
        $data = DB::table('beli')
            ->join('barang', 'beli.id_barang', '=', 'barang.id')
            ->select('barang.gambar', 'barang.name', 'barang.harga', 'beli.jumlah', 'beli.*')
            ->where([
                ['beli.id_user', '=', auth()->user()->id],
                ['beli.status', '=', 'pending'],
            ])
            ->get();


            $this->fpdf->SetFont('Arial', 'B', 14);
            $this->fpdf->AddPage('P', 'A4');
    
            //Cell(width , height , text , border , end line , [align] )
    
            $this->fpdf->Cell(130, 5, 'DIGITAL FURNITURE.CO', 0, 0);
            $this->fpdf->Cell(59, 5, 'INVOICE', 0, 1); //end of line
    
            //set font to arial, regular, 12pt
            $this->fpdf->SetFont('Arial', '', 12);
    
            $this->fpdf->Cell(130, 5, 'JALAN JALAN KE NEGERI CINA', 0, 0);
            $this->fpdf->Cell(59, 5, '', 0, 1); //end of line
    
            $this->fpdf->Cell(130, 5, 'JAKARTA, INDONESIA, 90909', 0, 0);
            $this->fpdf->Cell(25, 5, 'Date', 0, 0);
            $this->fpdf->Cell(34, 5, date("Y/m/d"), 0, 1); //end of line
    
            $this->fpdf->Cell(130, 5, 'Phone +62888624921', 0, 0); //end of line
            $this->fpdf->Cell(25, 5, 'Customer ID', 0, 0);
            $this->fpdf->Cell(34, 5, auth()->id(), 0, 1); //end of line
    
            //make a dummy empty cell as a vertical spacer
            $this->fpdf->Cell(189, 10, '', 0, 1); //end of line
    
            //billing address
            $this->fpdf->Cell(100, 5, 'Bill to', 0, 1); //end of line
    
            //add dummy cell at beginning of each line for indentation
            $this->fpdf->Cell(10, 5, '', 0, 0);
            $this->fpdf->Cell(90, 5, Auth::user()->name, 0, 1);
    
            $this->fpdf->Cell(10, 5, '', 0, 0);
            $this->fpdf->Cell(90, 5, Auth::user()->name, 0, 1);
    
            $this->fpdf->Cell(10, 5, '', 0, 0);
            $this->fpdf->Cell(90, 5, Auth::user()->name, 0, 1);
    
            //make a dummy empty cell as a vertical spacer
            $this->fpdf->Cell(189, 10, '', 0, 1); //end of line
    
            //invoice contents
            $this->fpdf->SetFont('Arial', 'B', 12);
    
            $this->fpdf->Cell(90, 5, 'Description', 1, 0);
            $this->fpdf->Cell(40, 5, 'Price', 1, 0);
            $this->fpdf->Cell(25, 5, 'Amount', 1, 0);
            $this->fpdf->Cell(34, 5, 'Total', 1, 1); //end of line
    
            $this->fpdf->SetFont('Arial', '', 12);
    
            //Numbers are right-aligned so we give 'R' after new line parameter
            foreach($data as $data){
                $this->fpdf->Cell(90, 5, $data->name, 1, 0);
                $this->fpdf->Cell(40, 5, number_format($data->harga), 1, 0);
                $this->fpdf->Cell(25, 5, $data->jumlah, 1, 0);
                $this->fpdf->Cell(34, 5, number_format($data->harga*$data->jumlah), 1, 1, 'R');
                $this->total += $data->harga*$data->jumlah;
            }
            //summary
            $this->fpdf->Cell(130, 5, '', 0, 0);
            $this->fpdf->Cell(25, 5, 'Subtotal', 0, 0);
            $this->fpdf->Cell(10, 5, 'RP', 1, 0);
            $this->fpdf->Cell(24, 5, $this->total, 1, 1, 'R'); //end of line
    
            $this->fpdf->Cell(130, 5, '', 0, 0);
            $this->fpdf->Cell(25, 5, 'Tax Rate', 0, 0);
            $this->fpdf->Cell(10, 5, 'RP', 1, 0);
            $this->fpdf->Cell(24, 5, '10%', 1, 1, 'R'); //end of line
    
            $this->fpdf->Cell(130, 5, '', 0, 0);
            $this->fpdf->Cell(25, 5, 'Total Due', 0, 0);
            $this->fpdf->Cell(10, 5, 'RP', 1, 0);
            $this->fpdf->Cell(24, 5, (0.1 * $this->total)+$this->total, 1, 1, 'R'); //end of line
            
            DB::table('beli')
            ->whereIn('id', json_decode($request->session()->pull('id', 'default')))
            ->update(['status'=>'paid']);
            
            $this->fpdf->Output('D', 'invoice.pdf');
    }

    public function coba(){
        return view('thankyou');
    }
}
