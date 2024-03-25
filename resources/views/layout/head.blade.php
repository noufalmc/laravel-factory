@section('head')
<nav class="navbar navbar-default">
  <div class="container-fluid">
     
    <ul class="nav navbar-nav">
      <li><a href="{{ route ('student.home')}}">List</a></li>
      <li><a href="{{ route ('student.form')}}">register</a></li>
     @if(auth()->user())<li><a href="{{ route ('logout')}}">Logout</a></li>@endif
    </ul>
  </div>
</nav>
@endsection
<style>
  .navbar-default
  {
    background-color:black !important;
  }
  .navbar-nav a
  {
    color:white !important;
  }
  
  </style>