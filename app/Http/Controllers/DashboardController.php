<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;
use PDF;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
    	return view('create');
    }
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('edit',compact('contact'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',


        ]);
    	$contact = new Contact;
    	$contact->name = $request->name;
    	$contact->user_id = Auth::user()->id;
    	$contact->phone = $request->phone;
    	$contact->email = $request->email;

    	$contact->save();

    	return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
            $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
         ]);
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->user_id = Auth::user()->id;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->route('home');

    }
    public function delete($id)
    {
        Contact::find($id)->delete();
         return redirect()->route('home');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $contacts = Contact::orWhere('name','LIKE','%'.$query.'%')
                            ->orWhere('phone','LIKE','%'.$query.'%')
                            ->where('user_id',Auth::id())
                            ->get();

        return view('search',compact('contacts'));
    }

    public function MakePdf($id)
    {
        $contact = Contact::find($id);
        $pdf = PDF::loadView('pdf', compact('contact'));
        return $pdf->stream('conatact.pdf');
    }
}
