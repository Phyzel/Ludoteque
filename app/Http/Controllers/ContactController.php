<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index() {
    	return view('contact');
    }

    public function send(Request $request) {
    	$name = $request->input('name');
    	$mail = $request->input('mail');

    	return view('contact_ok', ['name' => $name]);
    }

}