<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function index(Request $request)
    {
        $form = FormData::all();
        
        return view('formData.store', compact('form'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:20',
            'email'=>'required|Email|max:30',
            'message'=>'required|string|max:50'
        ]);

        $form = new FormData;
        $form->name = $request->name;
        $form->email = $request->email;
        $form->message = $request->message;
        $form->save();
        return redirect()->back();

    }
}
