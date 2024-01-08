<?php

namespace App\Http\Controllers;

use config\Models\Calculation;
use Illuminate\Http\Request;
use function Sodium\add;

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
        $data = request() -> validate([
            'sender' =>'',
            'typeCalc' => '',
            'fileName' => '',
            'extra_info' => '',
            ]);
        Calculation::create($data);
        return redirect(route('calculation.index'));
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
            'extra_info' => '',
        ]);
        $calculation->update($data);
        return redirect()->back();
    }
    public function destroy(Calculation $calculation){
        $calculation ->delete();
        return redirect(route('calculation.index'));
    }
}
