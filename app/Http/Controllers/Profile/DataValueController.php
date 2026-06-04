<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\DataValue;
use Illuminate\Http\Request;

class DataValueController extends Controller
{
    public function index()
    {
        $datavalue = DataValue::first(); 
        return view('data_value.viewDataValue', compact('datavalue'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $dataValue = DataValue::first();
    
        $validated = $request->validate([
            'title1' => 'nullable|string',
            'title2' => 'nullable|string',
            'title3' => 'nullable|string',
            'title4' => 'nullable|string',
            'data1' => 'nullable|string',
            'data2' => 'nullable|string',
            'data3' => 'nullable|string',
            'data4' => 'nullable|string',
            'value1' => 'nullable|string',
            'value2' => 'nullable|string',
            'value3' => 'nullable|string',
            'value4' => 'nullable|string',
            
           
        ]);
    
        $dataValue->update($validated);
    
        return redirect()->back()->with('success', 'Data Value berhasil diperbarui.');
    }   
}
