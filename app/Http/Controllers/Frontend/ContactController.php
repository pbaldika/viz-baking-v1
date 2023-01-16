<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('frontend.contact.index');
    }

    public function create_contact(request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mobile' => '02212312312',
            'title'=>'required',
            'message' => 'required',
         ]);

         Contact::create($request->all());
         
        //  return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
        // return redirect()->back()->with('message', 'Your message has been sent. Thank you!');
        return redirect()->route('home')
            ->with(['message' => 'Thank you for contact us ', 'alert-type' => 'success']);
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create($request->validated() + [
            'user_id' => auth()->check() ? auth()->id() : null
        ]);

        return redirect()->route('home')
            ->with(['message' => 'Thank you for contact us ', 'alert-type' => 'success']);
    }


}
