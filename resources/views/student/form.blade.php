@extends('layout.app')
@extends('layout.head')
@section('content')

<form method="post" action="{{ route ('student.save')}}">
    @csrf
    <div class="row">
    <div class="col-md-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="fname">
        @if($errors->getBag('default')->first('fname')>0)<label style="color:red">{{$errors->getBag('default')->first('fname')}}</label>@endif
    </div>
    </div>
    <div class="row">
    <div class="col-md-3">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname">
        @if($errors->getBag('default')->first('lname')>0)<label style="color:red">{{$errors->getBag('default')->first('lname')}}</label>@endif
    </div>
    </div>
    <div class="row">
    <div class="col-md-3">
        <label>Email:</label>
    <input type="email" class="form-control" name="email">
    @if($errors->getBag('default')->first('email')>0)<label style="color:red">{{$errors->getBag('default')->first('email')}}</label>@endif
    </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Dob</label>
            <input type="date" name="dob" class="form-control"> 
            @if($errors->getBag('default')->first('dob')>0)<label style="color:red">{{$errors->getBag('default')->first('dob')}}</label>@endif

        </div>
    </div>
    <div class="row">
    <div class="col-md-3">
        <label>Standard</label>
        <select class="form-control" name="std">
            <option>--Select Standard--</option>
        @foreach ($data as $value)
        <option value="{{$value->id}}">{{ $value->name}}</option>
        @endforeach
        @if($errors->getBag('default')->first('std')>0)<label style="color:red">{{$errors->getBag('default')->first('std')}}</label>@endif
        </select>
    </div>
    </div>
    <div class="row">
        <br>
        <div class="col-md-3">
            <input type="submit" class="btn btn-info" value="Save">
        </div>
    </div>
    <br>
</form>
@endsection