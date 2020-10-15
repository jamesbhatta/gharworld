@extends('layouts.admin')

@section('content')
<div class="p-4">
    <x-section-title>Local Contacts</x-section-title>

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

                    <a href="{{ route('local-contacts.create') }}" class="btn btn-info rounded-0 mb-3 mx-0">
                        <span class="mr-2"><i class="fa fa-plus"></i></span> New Local Contacts</a>
                    <button onclick="myFunction()" class="btn-info btn rounded-0 mb-3 mx-0"> <i class="fa fa-filter"
                            aria-hidden="true"></i> Filter</button>
                    <form action="{{route('localcontact-search')}}" method="POST" class="form" id="myDIV"
                        style="display:none;">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="profession">Profession</label>
                                <select type="text" name="profession_id" id="profession" class="form-control">
                                    <option value="">Select Profession</option>
                                    @foreach ($professions as $profession)
                                    <option value="{{$profession->id}}">{{$profession->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="name">Contact No.</label>
                                <input type="tel" name="contact" class="form-control" placeholder="Contact No.">
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
                            
                                <input type="date" name="expiry" class="form-control" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="col-md-1">
                                <input type="submit" class="form-control btn-info" value="Search">
                            </div>
                        </div>
                    </form>
                    {{-- <form action="{{route('localcontact-search')}}" method="post" class="form">
                    @method('put')
                    @csrf
                    <div class="row">

                        <div class="col-md-3">
                            <select name="by" class="form-control">
                                <option value="name">Name</option>
                                <option value="profession">Profession</option>
                                <option value="contact">Contact</option>
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
                    </form> --}}
                </div>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Profession</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Expiry</th>
                        <th>Active</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                @forelse ($localContacts as $localContact)
                <tr>
                    <td class="text-capitalize">{{ $localContact->name }}</td>
                    <td>{{ $localContact->profession->name }}</td>
                    <td>{{ $localContact->contact }}</td>
                    <td class="text-capitalize">
                        {{ $localContact->city->name . ', ' . $localContact->address_line }}</td>
                    <td>@php
                        $diff=date_diff(now(),date_create("$localContact->expiry"));
                        echo $diff->format("%R%a Remaining days");
                        @endphp</td>
                    <td>
                        <livewire:local-contact-status-switch :localContact="$localContact" />
                    </td>
                    <td>
                        <a href="{{ route('local-contacts.edit', $localContact) }}" class="text-muted"><i
                                class="fa fa-edit text-info"></i></a>
                        <span class="mx-3">|</span>
                        <form action="{{ route('local-contacts.destroy', $localContact) }}"
                            onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="42" class="text-center text-danger font-italic">No data available</td>
                </tr>

                @endforelse

            </table>
            {{ $localContacts->links() }}
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