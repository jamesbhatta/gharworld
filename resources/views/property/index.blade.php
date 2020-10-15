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
                    <a href="{{ route('properties.create') }}" class="btn btn-info rounded-0 mb-3 mx-0"> <span
                            class="mr-2"><i class="fa fa-plus"></i></span> New Property</a>
                    <button onclick="myFunction()" class="btn-info btn rounded-0 mb-3 mx-0"> <i class="fa fa-filter"
                            aria-hidden="true"></i> Filter</button>
                    <form action="{{route('localcontact-search')}}" method="POST" class="form" id="myDIV"
                        style="display:none;">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="name">Owner Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Owner Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No.">
                            </div>
                           
                            <div class="col-md-4 form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Type</label>
                                <select type="text" name="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="room">Room</option>
                                    <option value="house">House</option>
                                    <option value="land">Land</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">For</label>
                                <select type="text" name="For" class="form-control">
                                    <option value="">Select For</option>
                                    <option value="rent">Rent</option>
                                    <option value="sale">Sale</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="name">City</label>
                                <select type="text" name="city_id" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address_line" class="form-control" placeholder="Address">
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label for="address">Expiry</label>
                                <input type="date" name="address_line" class="form-control" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Status</label>
                                <select type="text" name="status" class="form-control">
                                    @foreach(config('property.status') as $label => $value)
                                    <option value="{{ $value }}" @if (old('status', $property->status) == $value) selected @endif> {{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input type="submit" class="form-control btn-info" value="Search">
                            </div>
                        </div>
                    </form>
                    {{-- <div class="row">
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
                                <input type="search" name="search" value="{{old('search')}}" class="form-control"
                                    placeholder="Search...">
                                <div class="input-group-append">
                                    <button type="submit" class="form-control"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Owner Name</th>
                        <th>Contact</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>For</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Expiry</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                @foreach ($properties as $property)
                <tr>
                    <td class="text-capitalize">{{ $property->name }}</td>
                    <td class="text-capitalize">{{ $property->contact }}</td>
                    <td class="text-capitalize">{{ $property->title }}</td>
                    <td class="text-capitalize">{{ $property->type }}</td>
                    <td class="text-capitalize">{{ $property->for }}</td>
                    <td class="text-capitalize">{{ $property->city ->name}}, {{ $property->address_line }}</td>
                    <td>{{ $property->price }}{{ $property->price_per==null ? '' : "/$property->price_per" }}
                    </td>
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
<script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>