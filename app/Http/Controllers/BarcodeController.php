<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KlipeLD\TextToBarcode\Code128ToBarcode;

class BarcodeController extends Controller
{
    public function code128(string $text = "Hello world :)") 
    {
        $clear_text = htmlspecialchars($text);
        $barcode = Code128ToBarcode::codeIt(htmlspecialchars($text));
        return view('barcode.code128',[
            'barcode' => $barcode,
            'clear_text' => $clear_text
        ]);
    }

    public function code128_show() 
    {
        $clear_text = htmlspecialchars(request('text'));
        $barcode = Code128ToBarcode::codeIt($clear_text);
        return view('barcode.code128show',[
            'barcode' => $barcode,
            'clear_text' => $clear_text
        ]);
    }
}
