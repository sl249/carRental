@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    {!! Form::open(array('url' => 'rent/'.$car->type.'/'.$car->id.'/process', 'class'=>'col s12 m12 l8 offset-l2')) !!}
      
      <div class="card ">

        <div class="card-content">

            <span class="card-title teal-text accent-4">Rental Review</span>
            
            <div class="input-field col s12">
              

              {!! Form::hidden('numDays', $rental['numDays'])!!} 
              {!! Form::hidden('initMileage', $rental['initMileage'])!!} 
              {!! Form::hidden('firstPayment', $rental['startCost'])!!} 
            
            </div>
          
          

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

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> SubTotal:</span> ${{$rental['startCostSub']}}</h6> 

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Tax:</span> ${{$rental['tax']}}</h6>               

            </div>

          </div>

        </div>

        <div class="card-action">
            
            <h5><span class="teal-text accent-4 "> First Payment:</span> ${{$rental['startCost']}}</h5> 

            <br>

            <button class="btn waves-effect waves-light" type="submit" name="action">Rent Car
              
              <i class="material-icons right">send</i>
            
            </button>

            

            
    
        </div>

      </div>

    {!! Form::close() !!}

  </div>

</div>

@stop