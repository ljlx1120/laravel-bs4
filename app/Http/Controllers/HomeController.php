<?php

namespace App\Http\Controllers;

use App\Mail\VerfiyEmail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest')->except(['logout', 'home']);
	}

	public function index()
	{
		return view('welcome');
	}

	public function register(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|min:6|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed'
		]);

		$user = User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'verify_token' => Str::random(40),
			'password' => bcrypt($request['password'])
		]);

		if ($user->id === 1) {
			$user->options = serialize(['roles' => ['super_admin', 'admin', 'user']]);
		} else {
			$user->options = serialize(['roles' => ['user']]);
		}

		$user->save();

		Mail::to($user)->send(new VerfiyEmail($user));

		$request->session()->flash('success', 'We have sent you a verification email. Please verify your email!');
		return redirect()->back();
	}

	public function verifyEmail(Request $request)
	{
		$this->validate($request, [
			'email' => 'string|email|max:255',
			'verify_token' => 'string|max:40|min:40'
		]);

		$user = User::where(['email' => $request['email'], 'verify_token' => $request['verify_token']])->first();

		if (! $user) {
			return redirect()->route('welcome');
		}

		$user->status = true;
		$user->verify_token = null;
		$user->save();

		$request->session()->flash('success', 'Your email has been verified!');
		return redirect()->route('welcome');
	}

	public function home()
	{
		return view('pages.home');
	}
}
