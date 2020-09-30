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
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0 sticky-top">
                <div class=" card-header">Property List</div>
                <div class="card-body">
                    <table class=" table  table-responsive">
                        <thead class="  thead-light">
                            <tr>
                                <th>Title</th>
                                <th>Property Type</th>
                                <th>Property For</th>
                                <th>Address</th>
                                <th>Price</th>
                                <th>Area</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        
                            @foreach ($properties as $property)
                            <tr>
                                <td class=" text-capitalize">{{$property->title}}</td>
                                <td class=" text-capitalize">{{$property->type}}</td>
                                <td class=" text-capitalize">{{$property->for}}</td>
                                <td class=" text-capitalize">{{$property->city->name}}, {{ $property->address_line}}</td>
                                <td>{{$property->price}} /{{ $property->price_per}}</td>
                                <td>{{$property->area}}</td>
                                <td>
                                    <a href="{{ route('properties.edit', $property) }}" class="text-muted"><i class="fa fa-edit"></i></a>
                                    <span class="mx-3">|</span>
                                    <form action="{{ route('properties.destroy', $property) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
