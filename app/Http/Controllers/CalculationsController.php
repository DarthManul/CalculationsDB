<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Support\Facades\Storage;

class CalculationsController extends Controller
{
    public function index()
    {
        $calculations = Calculation::all();

        return view('calculation.index', compact('calculations'));
    }

    public function create(){
        return view('calculation.create');
    }

    public function store()
    {
        //dd( request()->file('inputFile'));
        $data = request() -> validate([
            'sender' =>'required',
            'typeCalc' => 'required',
            //'inputFile' => 'required|mimetypes:text/plain,application/octet-stream|regex:^[a-zA-Z0-9_.-]+$',
            'extra_info' => 'max:255',
            ]);
        //dd(mime_content_type(request()->file('inputFile')));
        $file = request() -> file('inputFile');
        $upload_folder = 'public/calculations';

        $filename = date('d_M_y_H-i-s', $file->getMTime()).'_'.$file->getClientOriginalName();
        Storage::putFileAs($upload_folder, $file, $filename);
        $request = [
          'sender' => $data['sender'],
          'typeCalc' => $data['typeCalc'],
          'input_file_path' => $upload_folder.'/'.$filename,
          'fileName' => $file->getClientOriginalName(),
        ];
        Calculation::create($request);
        return redirect(route('calculation.index'))->with('success', 'Расчёт успешно добавлен');
    }

    public function edit(Calculation $calculation)
    {
        return view('calculation.edit', compact('calculation'));
    }

    public function show(Calculation $calculation)
    {
        return view('calculation.show', compact('calculation'));
    }

    public function update(Calculation $calculation){

        $data = request() ->validate([
            'extra_info' => 'max:255',
        ]);
        $calculation->update($data);
        return redirect()->back();
    }

    public function destroy(Calculation $calculation){

        $calculation ->delete();
        return redirect(route('calculation.index'));
    }
}
