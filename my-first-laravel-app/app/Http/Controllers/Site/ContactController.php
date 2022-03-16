<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 
use Notification; 
use App\Notifications\NewContact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(view:'site.contact.index');
    }

    public function form(ContactFormRequest $request) 
    {
        $contact = Contact::create($request->all());  
        Notification::route('mail', config('mail.from.address')) ->notify(new NewContact($contact)); 

        toastr()->success('O contato foi criado com sucesso!');
        return back()->with([
        ]);
    }
}
