<?php

namespace App\Http\Controllers\crm;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\clients;

class sendEmailController extends Controller
{
    public function sendEmailReminder(Request $request)
    {
        $client = clients::findOrFail(1);

        Mail::send('front_office.emails.reminder', ['client' => $client], function ($m) use ($client) {
            $m->from('khoudichahrazed@gmail.com', 'Your Application');

            $m->to('hayetkhoudi@gmail.com', 'chahrazed')->subject('Your Reminder!');
        });
    }
}
