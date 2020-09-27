@extends('layouts.admin')

@section('content')
<div class="p-4">
    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>
    <div class="row">
        {{-- Add & Edit Form --}}
        <div class="col-md-4 mx-auto">
            <div class="card z-depth-0 sticky-top">
                <div class="card-body">
                    <form action="{{ $city->id ? route('cities.update', $city) : route('cities.store') }}" method="POST" class="form">
                        @csrf
                        @if($city->id)
                        @method('put')
                        <input type="hidden" name="id" value="{{ $city->id }}">
                        @endif
                        <div class="form-group">
                            <label for="" class="required">City Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $city->name) }}" placeholder="Enter city name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ $city->id ? 'Update' : 'ADD' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Cities List --}}
        <div class="col-md-8 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a href="{{ route('cities.edit', $city) }}" class="text-muted"><i class="fa fa-edit"></i></a>
                                    <span class="mx-3">|</span>
                                    <form action="{{ route('cities.destroy', $city) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="42" class="text-center">No Data Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
