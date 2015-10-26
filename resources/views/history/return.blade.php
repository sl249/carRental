@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    {!! Form::open(array('url' => 'rentals/open/'.$rental->id.'/review', 'class'=>'col s12 m12 l8 offset-l2')) !!}
      
      <div class="card ">

        <div class="card-content">

          <span class="card-title teal-text accent-4">Return Car</span>

          {{ $errors->first('finalMileage') }}
          
          <div class="row">
            
            <div class="col s12">


              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Car Name:</span> {{$car->year}} {{$car->manufacturer}} {{$car->model}}</h6> 
              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Car Type:</span> {{$car->type}}</h6> 
              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Starting Mileage:</span> {{$car->mileage}} Miles</h6>

              @if($car->type == "Luxury")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $39.00</h6> 

              @elseif($car->type == "Standard")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $24.95</h6> 

              @elseif($car->type == "Compact")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $19.95</h6> 

              @endif

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Number of Days:</span> {{$rental['numDays']}}</h6> 

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Mileage Charge:</span> $0.32/Mile</h6> 

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> First Payment:</span> ${{$rental->firstPayment}}</h6>            

            </div>

            <div class="input-field col s12">
            

            {!! Form::input('number', 'finalMileage', null, array('class'=>'validate', 'required'=>'required'))!!} 
            <label for="finMileage">Final Mileage</label>
          
            </div>

          </div>

        </div>

        <div class="card-action">
            
            <button class="btn waves-effect waves-light" type="submit" name="action">Review
              
              <i class="material-icons right">send</i>
            
            </button>

        </div>

      </div>

    {!! Form::close() !!}

  </div>

</div>

@stop