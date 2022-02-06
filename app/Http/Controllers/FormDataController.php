<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormDataController extends Controller
{
    public function index(Request $request)
    {
        $form = FormData::all();
        
        return view('formData.store', compact('form'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:30',
            'message'=>'required|string|max:50'
        ]);
        if($validator->fails()){
            return response()->json([
            $validator -> getMessageBag()->getMessages()
            ], 400);
        }    

        $form = new FormData;
        $form->name = $request->name;
        $form->email = $request->email;
        $form->message = $request->message;
        $form->save();
        return redirect()->back();

    }
}
