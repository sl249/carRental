<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Car;
use App\Rental;

class RentalController extends Controller
{


	public function __construct()
	{


		

	}

	public function index()
	{

		if (Auth::check())
		{//get all cars

			$cars = Car::all();

			$sectionArray = array();

			$luxCounter = 0;
			$stanCounter = 0;
			$comCounter = 0;


			foreach ($cars as $car => $key) 
			{
				
				if($key->type == "Luxury")
				{

					$luxCounter++;

				}
				else if ($key->type == "Standard") 
				{
					
					$stanCounter++;

				}
				else if ($key->type == "Compact") 
				{
					
					$comCounter++;

				}

			}

			if($luxCounter > 0)
			{

				array_push($sectionArray, "Luxury");

			}
			
			if($stanCounter > 0) 
			{
				
				array_push($sectionArray, "Standard");


			}

			if($comCounter > 0) 
			{
				
				array_push($sectionArray, "Compact");


			}

			return view('rental.index', compact('cars', 'sectionArray'));

		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function rentSpecific($type)
	{

		if (Auth::check())
		{//get cars of specific type

			$sectionArray = array();

			if($type == "Luxury")
			{

				$cars = Car::where('type', '=', "Luxury")->get();
				array_push($sectionArray, "Luxury");

			}
			else if ($type == "Standard") 
			{
				
				$cars = Car::where('type', '=', "Standard")->get();
				array_push($sectionArray, "Standard");

			}
			else if ($type == "Compact") 
			{
				
				$cars = Car::where('type', '=', "Compact")->get();
				array_push($sectionArray, "Compact");

			}
			else
			{

				return Redirect::to('/'); 	
				
			}

			return view('rental.index', compact('cars', 'sectionArray'));
		}
		else
		{

			return Redirect::to('/'); 			

		}

	}

	public function carSpecific($type, $id)
	{

		if (Auth::check())
		{//get specific car

			$car = Car::find($id);
			return view('rental.rent', compact('car'));

		}
		else
		{

			return Redirect::to('/'); 	

		}

	}

	public function review()
	{

		// validate the info, create rules for the inputs
		$rules = array(

		    'numdays' => 'required|numeric|min:1', 
		
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) 
		{
		
		    return Redirect::to('rent/'.Input::get('type').'/'.Input::get('id'))
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(); // send back the input 
		} 
		else 
		{

			$startCost = "";

			if(Input::get('type') == "Luxury")
			{//caculate price info for car

				$num = 39.00 * Input::get('numdays');

				$tax = number_format($num * .04, 2);

				$startCostSub = number_format($num, 2);

				$startCost = number_format($num + ($num * .04), 2);

			}
			else if(Input::get('type') == "Standard")
			{//caculate price info for car

				$num = 24.95 * Input::get('numdays');

				$tax = number_format($num * .04, 2);

				$startCostSub = number_format($num, 2);

				$startCost = number_format($num + ($num * .04), 2);

			}
			else if(Input::get('type') == "Compact")
			{//caculate price info for car

				$num = 19.95 * Input::get('numdays');

				$tax = number_format($num * .04, 2);

				$startCostSub = number_format($num, 2);

				$startCost = number_format($num + ($num * .04), 2);
				
			}



		    // create review data 
		    $rental = array(
		        'car_id'     => Input::get('id'),
		        'numDays'  => Input::get('numdays'),
		        'initMileage'  => Input::get('initMileage'),
		        'startCostSub' => $startCostSub,
		        'tax' => $tax,  
		        'startCost' => $startCost


		    );

		    $car = Car::find(Input::get('id'));//get car

		    return view('rental.review', compact('rental', 'car'));

		}

	}

	public function process($type, $id)
	{

	    // create our rental data
	    $rental = array(
	    	'user_id'	=> Auth::user()->id,
	        'car_id'     => (int)$id,
	        'numDays'  => (int)Input::get('numDays'),
	        'initMileage'  => Input::get('initMileage'),
	        'firstPayment' => Input::get('firstPayment'),
	        'state'	=> 0

	    );

	    $rental = Rental::create($rental);//create rental

	    $car = Car::find($id);//get car

	    return Redirect::to('/rent/'.$car->type.'/'.$car->id.'/confirm');//redirect to confirmation page

	}

	public function confirm($type, $id)
	{//to prevent form refresh and database re-access. Can be spooffed but poses no threat to databse

		if (Auth::check())
		{
		    
		    $car = Car::find($id);

		    return view('rental.confirm', compact('car'));

		}
		else
		{

			return Redirect::to('/'); 	

		}

	}


}