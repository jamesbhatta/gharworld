@extends('layouts.admin')
@push('styles')
    <style>
        label.required:after {
            content: '*';
            color: #fa5661;
        }

        /* Summer note */
        .note-editor {
            box-shadow: none;
        }

    </style>
@endpush

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
                    <div class="card-body">

                        <form action="{{ route('properties.store') }}" method="POST" class="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="type" class="required">Property Type</label>
                                        <select type="text" name="type" class="form-control" value="{{ old('type') }}"
                                            required>
                                            <option value="house">House</option>
                                            <option value="land">Land</option>
                                            <option value="room">Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="for" class="required">Property For</label>
                                    <select type="text" name="for" id="for" value="{{ old('for') }}" class="form-control"
                                        required>
                                        <option value="sale">Sale</option>
                                        <option value="rent">Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title" class="required">Property Title</label>
                                        <input class=" form-control" name="title" id="title" value="{{ old('title') }}"
                                            type="text" placeholder=" Property Title" required>
                                    </div>
                                </div>
                                <div class="col-md-4  form-group">
                                    <label for="price">Price <span class=" text-danger">*</span></label>
                                    <input type="number" min="0" class=" form-control" name="price" id="facilities"
                                        value="{{ old('price') }}" placeholder=" Price Rs." required>
                                </div>
                                <div class="col-md-4  form-group">
                                    <label for="price_per"> Price Per <span class=" text-danger">*</span></label>
                                    <select class=" form-control" name="price_per" id="price_per"
                                        value="{{ old('price_per') }}">
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="area" class=" required">Size</label>
                                    <input type="text" name="area" id="area" class=" form-control" value="{{ old('area') }}"
                                        placeholder="Area size with unit" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="city" class="required">City</label>
                                    <select class=" form-control" name="city_id" id="city" value="{{ old('city') }}">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" class="text-capitalize">{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="address_line" class="required">Address Line</label>
                                    <input class=" form-control" name="address_line" id="address_line" value="{{ old('address_line') }}"
                                        type="text" placeholder=" address_line Address" required>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label for="falilities" class="required">Facilities</label>
                                        <div class="row">
                                            @foreach ($facilities as $facility)
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="facilities[]"
                                                            class="custom-control-input" id="facility-{{ $facility->name }}"
                                                            value="{{ $facility->name }}" />
                                                        <label class="custom-control-label"
                                                            for="facility-{{ $facility->name }}">{{ ucfirst($facility->name) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="features" class="required">Features</label>
                                    <div class="row">
                                        @foreach ($features as $feature)
                                            <div class="col-md-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="features[]" class="custom-control-input"
                                                        id="feature-{{ $feature->name }}" value="{{ $feature->name }}" />
                                                    <label class="custom-control-label"
                                                        for="feature-{{ $feature->name }}">{{ ucfirst($feature->name) }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="description">Description <span class=" text-danger">*</span></label>
                                    <textarea name="description" id="description" class=" form-control"
                                        value="{{ old('description') }} cols=" 30" rows="5"
                                        placeholder="Description"></textarea>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" id="location" class=" form-control" value="{{ old('location') }}"
                                        placeholder="Location">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="image" class="required">Cover Image</label>
                                    <input type="file" name="image" onchange="readURL(this);" id="image"
                                        value="{{ old('image') }}" class="form-control-file" accept=" image/*" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="city" class="required">Status</label>
                                    <select class=" form-control" name="status" id="status" value="{{ old('status') }}">
                                        <option value="{{ \App\Property::AVAILABLE }}">Available</option>
                                        <option value="{{ \App\Property::SOLD }}">Sold Out</option>
                                        <option value="{{ \App\Property::BOOKED }}">Booked</option>
                                        <option value="{{ \App\Property::HIDDEN }}">Hidden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#description').summernote({
                height: 250
            });
        });

    </script>
@endpush
