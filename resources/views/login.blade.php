@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    {!! Form::open(array('url' => 'login', 'class'=>'col s12 m12 l12 card')) !!}
      
      <div class="card-content">

        <span class="card-title teal-text accent-4">Login</span>
          
            {{ $errors->first('username') }}
            {{ $errors->first('password') }}

        <div class="row">
          
          <div class="input-field col s12">
            
            {!! Form::text('username', Input::old('username'), array('class'=> 'validate', 'required' => 'required', 'autofocus' => 'autofocus' )) !!} 
            <label for="username">User Name</label>
          
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
          
          <button class="btn waves-effect waves-light" type="submit" name="action">Sign In
            
            <i class="material-icons right">send</i>
          
          </button>

          <a class="teal-text accent-4" href="/register"> &nbsp;&nbsp; Not a user?</a>
        
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