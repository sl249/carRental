<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Car;
use App\Rental;


class HistoryController extends Controller
{


	public function __construct()
	{


		

	}

	public function index()
	{

		if (Auth::check())
		{


			$rentals = Rental::where('user_id', Auth::user()->id)->get();
			$openRentals =  Rental::where('state', 0)->where('user_id', Auth::user()->id)->get();
			$closedRentals =  Rental::where('state', 1)->where('user_id', Auth::user()->id)->get();

			$sectionArray = array();

			if ($rentals->count()) 
			{//not empty

				$empty = false;
			    
			}
			else
			{

				array_push($sectionArray, "Open");
				$empty = true;

			}


			if ($openRentals->count()) 
			{//not empty

				array_push($sectionArray, "Open");
			    
			}
			else
			{


			}

			if ($closedRentals->count()) 
			{//not empty

				array_push($sectionArray, "Closed");
			    
			}
			else
			{


			}



			$cars = Car::all();
			
			return view('history.rentals', compact('rentals', 'cars', 'sectionArray'))->with('empty', $empty);

		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function view($type)
	{

		if (Auth::check())
		{

			$cars = Car::all();

			if($type =="open")
			{

				$sectionArray = array('Open');
				$rentals =  Rental::where('state', 0)->where('user_id', Auth::user()->id)->get();
				
				if ($rentals->count()) 
				{//not empty

					$empty = false;
				    
				}
				else
				{

					$empty = true;

				}


			}
			else 
			{

				$sectionArray = array('Closed');
				$rentals =  Rental::where('state', 1)->where('user_id', Auth::user()->id)->get();

				if ($rentals->count()) 
				{//not empty

					$empty = false;
				    
				}
				else
				{

					$empty = true;

				}
			
			}
				
			return view('history.rentals', compact('rentals', 'cars', 'sectionArray'))->with('empty', $empty);

		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function complete($id)
	{

		if (Auth::check())
		{

			$rental = Rental::find($id);
			$car = Car::find($rental->car_id);
			return view('history.return', compact('rental', 'car'));


		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function review($id)
	{

		if (Auth::check())
		{

			$rental = Rental::find($id);

			$rules = array(

		    'finalMileage' => 'required|numeric|min:'.$rental->initMileage, 
		
			);

			// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) 
			{
			
			    return Redirect::to('rentals/open/'.$id)
			        ->withErrors($validator) // send back all errors to the login form
			        ->withInput(); // send back the input 
			} 
			else 
			{

				$car = Car::find($rental->car_id);//get car

				$mileage = Input::get('finalMileage') - (int)$car->mileage;

				$lastPaymentSub = number_format($mileage * .32, 2);

				$tax = number_format(($mileage * .32) * .04, 2);

				$lastPayment = number_format(($mileage * .32) + (($mileage * .32) * .04), 2);

			    // create review data 
			    $rentalReturn = array(
			    	'id'	=> $id,
			        'numDays'  => $rental->numDays,
			        'initMileage'  => Input::get('initMileage'),
			        'finalMileage'	=> Input::get('finalMileage'),
			        'lastPaymentSub' => $lastPaymentSub,
			        'tax' => $tax,  
			        'lastPayment' => $lastPayment


			    );

			    return view('history.review', compact('rentalReturn', 'car'));

			}


		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function process($id)
	{

		if (Auth::check())
		{

			//update rental
			$rental = Rental::find($id);
			$rental->finMileage = Input::get('finalMileage');
			$rental->lastPayment = Input::get('lastPayment');
			$rental->state = 1;
			$rental->save();

			//update car
			$car = Car::find($rental->car_id);
			$car->mileage = Input::get('finalMileage');
			$car->save();

			return view('history.confirm', compact('car'));

		}
		else
		{

			return Redirect::to('/'); 

		}

	}

	public function receipt($id)
	{

		if (Auth::check())
		{

			$rental = Rental::find($id);
			$car = Car::find($rental->car_id);

			return view('history.receipt', compact('rental','car'));

		}
		else
		{

			return Redirect::to('/'); 

		}

	}

}