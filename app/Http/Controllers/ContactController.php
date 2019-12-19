<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
	    'nome'=>'required',
            'email'=>'required',
            'telefone'=>'required',
            'cep'=>'required',
            'uf'=>'required',
            'cidade'=>'required',
            'bairro'=>'required',
	    'rua'=>'required'
        ]);

        $contact = new Contact([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'cep' => $request->get('cep'),
            'uf' => $request->get('uf'),
            'cidade' => $request->get('cidade'),
	    'bairro' => $request->get('bairro'),
	    'rua' => $request->get('rua')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
	$request->validate([
	    'nome'=>'required',
            'email'=>'required',
            'telefone'=>'required',
            'cep'=>'required',
            'uf'=>'required',
            'cidade'=>'required',
            'bairro'=>'required',
	    'rua'=>'required'
        ]);

        $contact = Contact::find($id);
        $contact->nome =  $request->get('nome');
        $contact->email = $request->get('email');
        $contact->telefone = $request->get('telefone');
        $contact->cep = $request->get('cep');
        $contact->uf = $request->get('uf');
        $contact->cidade = $request->get('cidade');
	$contact->bairro = $request->get('bairro');
	$contact->rua = $request->get('rua');
        $contact->save();

        return redirect('/contacts')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'User deleted!');
    }
}
