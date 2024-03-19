@extends('layout.app')
@extends('layout.head')
@section('content')
<table class="table table-borderd">
<thead>
    <th>SiNo</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Dob</th>
    <th>Standard</th>
    <th>Action</th>
</thead>
<tbody>
    @foreach($data as $key=>$value)

    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{$value->first_name}}</td>
        <td>{{$value->last_name}}</td>
        <td>{{$value->dob}}</td>
        <td>{{$value->standard->name}}</td>
        <td>
            <a href="/edit/{{$value->id}}"><button class="btn btn-info">Edit</button></a>
            <a><button class="btn btn-danger" onclick="Remove({{$value->id}})">Remove</button></a>
            
        </td>


    </tr>
    @endforeach    
</tbody>
</table>
<p>Total Records in 1st Std:{{$count}}</p>
@endsection
<script>
    function Remove(id)
    {
        if(confirm("Are You Sure Wants To Delete This Record??"))
        {
            $.ajax({
                type:'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url :"{{ url('student-delete') }}/"+id,
                success:function(res)
                {
                    res=JSON.parse(res);
                    window.location='/'
                    // alert(res['status'])
                }
            })
        }
    }
</script>