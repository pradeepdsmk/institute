<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// return view('home/landing');
		return redirect()->to('/access');
	}
	
}
