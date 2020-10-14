@extends('layouts.admin')

@section('content')
<div class="p-4">
    <x-section-title>Properties</x-section-title>

    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0 sticky-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('properties.create') }}" class="btn btn-info rounded-0 mb-3 mx-0"> <span
                                    class="mr-2"><i class="fa fa-plus"></i></span> New Property</a>
                        </div>
                        <div class="col-md-9">
                            <form action="{{route('property-search')}}" method="post" class="form">
                                @method('put')
                                @csrf
                                <div class="row">
                                    
                                        <div class="col-md-3">
                                        <select name="by" class="form-control">
                                            <option value="name">Owner Name</option>
                                            <option value="title">Title</option>
                                            <option value="type">Type</option>
                                            <option value="for">For</option>
                                            <option value="city_id">City</option>
                                            <option value="address_line">Address</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9 input-group">
                                        <input type="search" name="search" value="{{old('search')}}" class="form-control" placeholder="Search..." >
                                        <div class="input-group-append">
                                          <button type="submit" class="form-control"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Owner Name</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>For</th>
                                <th>Address</th>
                                <th>Price</th>
                                <th>Area</th>
                                <th>Expiry</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        @foreach ($properties as $property)
                        <tr>
                            <td class="text-capitalize">{{ $property->name }}</td>
                            <td class="text-capitalize">{{ $property->title }}</td>
                            <td class="text-capitalize">{{ $property->type }}</td>
                            <td class="text-capitalize">{{ $property->for }}</td>
                            <td class="text-capitalize">{{ $property->city ->name}}, {{ $property->address_line }}</td>
                            <td>{{ $property->price }}{{ $property->price_per==null ? '' : "/$property->price_per" }}
                            </td>
                            <td>{{ $property->area }}</td>
                            <td>@php
                                $diff=date_diff(now(),date_create("$property->expiry"));
                                echo $diff->format("%R%a days");
                                @endphp</td>
                            <td class="text-capitalize">{{ $property->status}}</td>
                            <td>

                                <a href="{{ route('properties.edit', $property) }}" class="text-muted"><i
                                        class="fa fa-edit text-info"></i></a>
                                <span class="mx-1">|</span>
                                <form action="{{ route('properties.destroy', $property) }}"
                                    onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    {{$properties->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection