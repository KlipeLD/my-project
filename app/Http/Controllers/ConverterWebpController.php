<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConverterService;

class ConverterWebpController extends Controller
{
    protected ConverterService $converterservice;

    public function __construct(ConverterService $converterservice)
    {
        $this->converterservice = $converterservice;
    }

    public function show()
    {
        return view('converterwebp.show');
    }

    public function store(Request $request)
    {
        if($request->hasFile('img'))
        {
            $folderName = time().'_'.rand();
            mkdir("img/convertWebp/".$folderName, 0700);
            foreach ($request->file('img') as $imagefile) {
                $data['img'] = $this->converterservice->uploadedImage($imagefile, $folderName);
            }
        }
        return redirect(route('converterwebp.show'));
    }
}
