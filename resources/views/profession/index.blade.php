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
        <div class="col-md-4">
            {{-- Add & Edit Form --}}
            <div class="card z-depth-0 sticky-top">
                <div class="card-body">
                    <form action="{{ $profession->id ? route('professions.update', $profession) : route('professions.store') }}" method="POST" class="form">
                        @csrf
                        @if($profession->id)
                        @method('put')
                        <input type="hidden" name="id" value="{{ $profession->id }}">
                        @endif
                        <div class="form-group">
                            <label for="" class="required">Profession Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $profession->name) }}" placeholder="Enter profession name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ $profession->id ? 'Update' : 'ADD' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card z-depth-0">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($professions as $profession)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $profession->name }}</td>
                                <td>
                                    <a href="{{ route('professions.edit', $profession) }}" class="text-muted"><i class="fa fa-edit"></i></a>
                                    <span class="mx-3">|</span>
                                    <form action="{{ route('professions.destroy', $profession) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="42" class="text-center text-italic">No Professions found in database</td>
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
