<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ProjectsController extends Controller
	{
		public function __construct()
		{
			$this->middleware('home.redirect');
		}

		public function index()
		{
			return view('pages.projects');
		}
	}
