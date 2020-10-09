@extends('layouts.admin')

@section('content')
<div class="p-4">
    <x-section-title>Contacts</x-section-title>

    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>
    </div>
    <div class="row">
        {{-- contacts List --}}
        <div class="col-md-12 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    <div class=" pl-md-2 text-left" style="height:140px; width:320px; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                    {!! $contact->message !!}
                                    </div>
                                </td>
                                <td>
                             
                                <form action="{{route('contact.destroy',$contact)}}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
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
                    {{$contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
