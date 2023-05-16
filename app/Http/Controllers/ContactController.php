<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function contact(Request $request){
        $data=[
            'email'=> $request->email,
            'asunto'=> $request->asunto,
            'mensaje'=> $request->mensaje,
            'archivo'=>($request->file('files'))->store('files'),
             
        ];
     
     
        Mail::to($data['email'])->send(new CustomerMail($data));

        return response()->json([
            'Success' => 'Excelente email enviado..',
            'code' => '200',
          ],200);
    }
}
