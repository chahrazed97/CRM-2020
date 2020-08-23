<?php

namespace App\Http\Controllers\crm;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Messg;

class sendEmailController extends Controller
{
    

    public function index()
    {
        return view('front_office.emails.writingArea');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function sendEmail()
    {
       
            Mail::send('front_office.emails.envoyerEmail', ['mesg' => 'msggg'], function ($m) use ($email_dest) {
                $m->from('khoudichahrazed@gmail.com', 'Your Application');

                $m->to($email_dest, 'CRM 2020')->subject('Promotion!');
            });
           
            if (count(Mail::failures()) > 0) {
                return redirect('ajax')->with("ok", "Erreur");
            } else {
               
                return view('front_office.emails.envoyerEmail')->with("ok", "Envoyé!");
            }
    }
}
