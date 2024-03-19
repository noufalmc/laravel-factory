@extends('layout.app')
@extends('layout.head')
@section('content')
<form action="/editUpdate/{{$data->id}}" method="POST">
@csrf
@method('PUT')
    <div class="row">
        <div class="col-md-3">
            <label>First Name:</label>
            <input type="text" class="form-control" name="fname" value="{{$data->first_name}}"> 
        </div>
    </div>

        <div class="row">
            <div class="col-md-3">
                <label>Last name:</label>
                <input type="text" class="form-control" name="lname" value="{{$data->last_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Emai:</label>
                <input type="text" class="form-control" name="email" value="{{$data->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">Dob</label>
                <input type="text" name="dob" class="form-control" value="{{$data->dob}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Std:</label>
                <select class="form-control" name="std">
                    @foreach ($standard as  $value)
                    <option value="{{$value->id}}" @if($value->id==$data->std)
                        selected="true"@endif>{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <input type="submit" class="btn btn-info" value="submit">
            </div>
        </div>
</form>
@endsection