@extends('layouts.admin')

@section('content')
<div class="p-4">
    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-6 mx-auto">
            @include('alerts.all')
        </div>

        <div class="col-md-12"></div>
        {{-- Add & Edit Form --}}
        <div class="col-md-6 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">
                    <form action="{{ $facility->id ? route('facilities.update', $facility) : route('facilities.store') }}" method="POST" class="form">
                        @csrf
                        @if($facility->id)
                        @method('put')
                        <input type="hidden" name="id" value="{{ $facility->id }}">
                        @endif
                     
                        <div class="form-group">
                            <label for="" class="required">Facility Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $facility->name) }}" placeholder="Enter facility name">
                        </div>
                        <div class="form-group">
                            <label for="" class="required">Facility Icon</label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon', $facility->icon) }}" placeholder="Enter icon (fa fa-icon)">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ $facility->id ? 'Update' : 'ADD' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- facilities List --}}
        <div class="col-md-8 mx-auto">
            <div class="card z-depth-0">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($facilities as $facility)
                            <tr>
                                <td>{{ $facility->id }}</td>
                                <td>{{ $facility->name }}</td>
                                <td>{!! $facility->fontAwesomeIcon !!}</td>

                                <td>
                                    <a href="{{ route('facilities.edit', $facility) }}" class="text-muted"><i class="fa fa-edit"></i></a>
                                    <span class="mx-3">|</span>
                                    <form action="{{ route('facilities.destroy', $facility) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
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
