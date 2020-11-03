@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="p-4">
    <x-section-title>User List</x-section-title>

    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">
                    <table class="table table-hover table-responsive-lg">
                        <tr class="bg-light">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th colspan="3">Action</th>
                        </tr>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->roles}}</td>
                            <td>
                                <a href="{{ route('users.change-password.show', $user) }}" class="fa fa-key btn btn-success" data-toggle="tooltip" title="Password Change"></a>
                                <form action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="40">No data availabale in database</td>
                            </tr>
                        @endforelse


                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection