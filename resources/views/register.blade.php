@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    {!! Form::open(array('url' => 'register', 'class'=>'col s12 m12 l12 card')) !!}
      
      <div class="card-content">

        <span class="card-title teal-text accent-4">Register</span>
            
            {{ $errors->first('firstName') }}
            {{ $errors->first('lastName') }}
            {{ $errors->first('username') }}
            {{ $errors->first('password') }}

        <div class="row">
          
          <div class="input-field col s12">
            
            {!! Form::text('firstName', Input::old('firstName'), array('class'=> 'validate', 'required' => 'required', 'autofocus' => 'autofocus' )) !!} 
            <label for="firstName">First Name</label>
          
          </div>
        
        </div>

        <div class="row">
          
          <div class="input-field col s12">
            
            {!! Form::text('lastName', Input::old('lastName'), array('class'=> 'validate', 'required' => 'required')) !!} 
            <label for="firstName">Last Name</label>
          
          </div>
        
        </div>

        <div class="row">
          
          <div class="input-field col s12">
            
            {!! Form::text('username', Input::old('username'), array('class'=> 'validate', 'required' => 'required')) !!} 
            <label for="username">Username</label>
          
          </div>
        
        </div>
        
        <div class="row">
          
          <div class="input-field col s12">


            {!! Form::password('password', array('class' => 'validate', 'required' => 'required')) !!} 
            <label for="password">Password</label>
          
          </div>
        
        </div>

      </div>

      <div class="card-action">
          
          <button class="btn waves-effect waves-light" type="submit" name="action">Register
            
            <i class="material-icons right">send</i>
          
          </button>
        
        </div>

    {!! Form::close() !!}

  </div>

</div>
  
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <br><br>


@stop