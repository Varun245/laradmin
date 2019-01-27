@extends('layouts.app') 
@section('content')

<div class="container-fluid">
    @if(Session::has('status'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
    @endif

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)

            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->address }}</td>
                <td><a href="/admin/userList/edit/{{ $user->id }}" class="btn btn-xs btn-primary">Edit</td>
                <td><a href="/admin/userList/edit/{{ $user->id }}/delete" class="btn btn-xs btn-danger">Delete</td>
            </tr>

            @endforeach
        
        </tbody>

    </table>
    <br><br>

    <div class="pagination">

        {{$users->links()}}

    </div>
    
</div>
@endsection
