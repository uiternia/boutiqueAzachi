<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSending;

class ContactController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.contacts.index',compact('user'));
    }

    public function thanks(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

          $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
           ];

           Mail::to(env('MAIL_ADMIN'))->send(new ContactSending($data));
           Mail::to($data['email'])->send(new ContactSending($data));
        

        return redirect('/')->with(['message' => 'お問い合わせを受け付けました。',
        'status' => 'success']);
    }

    
}
