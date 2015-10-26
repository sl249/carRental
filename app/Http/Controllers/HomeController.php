<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{


	public function __construct()
	{


		

	}

	public function index()
	{


		return view('home');

	}

	public function login()
	{

		if (Auth::check())
		{

			return Redirect::to('/'); 

		}
		else
		{
			
			return view('login');

		}
	}

	public function doLogin()
	{
		
		// validate the info, create rules for the inputs
		$rules = array(

		    'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
		
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) 
		{
		
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 
		else 
		{

		    // create our user data for the authentication
		    $userdata = array(
		        'username'     => Input::get('username'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        return Redirect::to('/');

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('login');

		    }

		}
	}

	public function doLogout()
	{

		if (Auth::check())
		{

			Auth::logout(); // log the user out of our application
	   		return Redirect::to('login'); 

	   	}
	   	else
	   	{

	   		return Redirect::to('/'); 

	   	}

	}

	public function register()
	{

		if (Auth::check())
		{
		    
		    return Redirect::to('/'); 
		
		}
		else
		{

			return view('register');
		
		}

	}

	public function doRegister()
	{

		$rules = array(

		    'password' => 'required|alpha_num|min:3', // password can only be alphanumeric and has to be greater than 3 characters
		    'username' => 'required|min:3',
		    'firstName' => 'required',
		    'lastName' => 'required'

		
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) 
		{
		
		    return Redirect::to('register')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		else
		{

			$credentials = Input::only('firstName', 'lastName','username', 'password');
			$credentials['password'] = Hash::make($credentials['password']);

			try 
			{
				
			   $user = User::create($credentials);
			
			} 
			catch(Exception $e) 
			{
			 
			   return Response::json(['error' => 'User already exists.'], Illuminate\Http\Response::HTTP_CONFLICT);
			
			}

			$userdata = array(
		        'username'     => Input::get('username'),
		        'password'  => Input::get('password')
		    );

			if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        return Redirect::to('/');

		    } else {        

		        // validation not successful
		        return Redirect::to('/');

		    }

		}

	}

}