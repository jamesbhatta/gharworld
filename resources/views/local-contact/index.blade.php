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
            <div class="card z-depth-0 sticky-top">
                <div class="card-body">
                    <a href="{{ route('local-contacts.create') }}" class="btn btn-info rounded-0 mb-3 mx-0"> <span class="mr-2"><i class="fa fa-plus"></i></span> New Local Contacts</a>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Profession</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        @forelse ($localContacts as $localContact)
                            
                        
                        <tr>
                            <td class="text-capitalize">{{ $localContact->name}}</td>
                            <td class="text-capitalize">{{ $localContact->city->name.", ".$localContact->address_line }}</td>
                            <td>{{ $localContact->contact}}</td>
                            <td>{{$localContact->profession->name}}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('local-contacts.edit',$localContact) }}" class="text-muted"><i class="fa fa-edit text-info"></i></a>
                                <span class="mx-3">|</span>
                                <form action="{{ route('local-contacts.destroy',$localContact) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                       
                        @empty
                        <tr>
                            <td colspan="42" class="text-center text-danger font-italic">No data available</td>
                        </tr>
                            
                        @endforelse

                    </table>
                    {{$localContacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
