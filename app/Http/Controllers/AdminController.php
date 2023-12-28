<?php

namespace App\Http\Controllers;

use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */


	public function index(Request $request)
	{
		

		if ($request->isMethod('post')) {

			$request->validate(
				[
					'email' => 'required|email|exists:users,email',
					'password' => 'required|min:8|max:16'
				],[
					'email.required' => 'Email is required',
					'email.exists' => 'Please enter a registered email address',
					'password.required' => 'Password is required'
				]);
			

			$validate_admin = User::where('email', $request->email)->first();


			if ($validate_admin && Hash::check($request->password, $validate_admin->password)) {
			} else {
				return redirect()->back()->with('error', 'Credentials do not match our database .');
			}

			if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
				
				return redirect()->intended('home');
			}

			return Redirect::back()->with('error','Credentials do not match our database .');
		}

		return view('admin.login');
	}


	public function passwordChange(Request $request)
	{
		

		if ($request->isMethod('post')) {
			$user = Auth::guard('web')->user();
			$request->validate([
				'old_pass' => 'required|min:8|max:16',
				'new_pass' => 'required|min:8|max:16',
				'confirm_pass' => 'required|min:6|max:16|same:new_pass'
			], [
				'old_pass.required' => 'Password is required',
				'old_pass.min' => 'Old Password minimum 8 character',
				'new_pass.required' => 'New Password is required',
				'new_pass.min' => 'New Password minimum 8 character',
				'confirm_pass.required' => 'Confirm Password is required',
				'confirm_pass.same' => 'New Password and Confirm Password must match',
			]);

			if (!Hash::check($request->old_pass, $user->password)) {
				return back()->with('error', 'Old password does not match!');
			}

			$user->password = Hash::make($request->new_pass);
			$user->save();

			return back()->with('success', 'Password successfully changed!');

			return Redirect::back();
		}
		return view('admin.reset');
	}

	public function logout(Request $request)
	{
		
		Auth::logout();
		Session::flush();
		return redirect()->route('login');
	}
}
