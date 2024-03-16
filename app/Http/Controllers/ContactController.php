<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('pages.contact', ['contact' => $contact]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::first();
        return view('admin.pages.contact.add', ['contact' => $contact]);
    }

    public function send_mail(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to('0972612200tuyen@gmail.com')->send(new WelcomeEmail($data));


        return redirect()->route('contact.index')->with(['status' => 'Gửi thành công']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);


        Contact::where('id', $id)->update($data);

        return redirect()->route('contact.create', ['contact' => $id])->with(['status' => 'Chỉnh sửa thành thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
