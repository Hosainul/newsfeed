<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){

        $contacts = Contact::all();
        return view('admin.contact',compact('contacts'));
    }

    public function destroy($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();

        Toastr::success('Contact Deleted Successfully','success');
        return redirect()->back();
    }
}
