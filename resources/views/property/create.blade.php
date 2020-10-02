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
                    <h3>{{ $property->exists ? 'Edit Property' : 'New Property' }}</h3>
                    <form action="{{ $property->exists ? route('properties.update', $property) : route('properties.store') }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @if($property->exists)
                        @method('put')
                        @endif
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type" class="required">Property Type</label>
                                    <select type="text" name="type" class="form-control" value="{{ old('type') }}" required>
                                        @foreach(config('property.types') as $key => $value)
                                        <option value="{{ $key }}" @if (old('type', $property->type) == $key) selected @endif> {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="for" class="required">Property For</label>
                                <select type="text" name="for" id="for" value="{{ old('for') }}" class="form-control" required>
                                    <option value="sale">Sale</option>
                                    <option value="rent" {{ old('for', $property->for) == 'rent' ? 'selected': '' }}>Rent</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="required">Property Title</label>
                                    <input class="form-control" name="title" id="title" value="{{ old('title', $property->title) }}" type="text" placeholder="Property Title">
                                </div>
                            </div>
                            <div class="col-md-4  form-group">
                                <label for="price" class="required">Price</label>
                                <input type="number" min="0" class=" form-control" name="price" id="facilities" value="{{ old('price', $property->price) }}" placeholder="Price Rs.">
                            </div>
                            <div class="col-md-4  form-group">
                                <label for="price_per" class="required">Price Per</label>
                                <select class=" form-control" name="price_per" id="price_per">
                                    <option value="month">Month</option>
                                    <option value="year" @if(old('price_per', $property->price_per) == 'year') selected @endif>Year</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="area" class=" required">Size</label>
                                <input type="text" name="area" id="area" class=" form-control" value="{{ old('area',$property->area) }}" placeholder="Area size with unit" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="city" class="required">City</label>
                                <select name="city_id" id="city" class="form-control">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @if(old('city_id', $property->city_id) == $city->id) selected @endif >
                                        {{ $city->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="address_line" class="required">Address Line</label>
                                <input type="text" name="address_line" id="address_line" class="form-control" value="{{ old('address_line', $property->address_line) }}" placeholder=" address_line Address" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="features" class="required">Features</label>
                                <div class="row">
                                    @foreach ($features as $feature)
                                    <div class="col-md-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="features[]" class="custom-control-input" id="feature-{{ $feature->name }}" value="{{ $feature->name }}"  @if(in_array($feature->name, old('features', $property->getFeaturesArray() ))) checked @endif />
                                            <label class="custom-control-label" for="feature-{{ $feature->name }}">{{ ucfirst($feature->name) }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="falilities" class="required">Facilities</label>
                                    <div class="row">
                                        @foreach ($facilities as $facility)
                                        <div class="col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="facilities[]" class="custom-control-input" id="facility-{{ $facility->name }}" value="{{ $facility->name }}" @if(in_array($facility->name, old('facilities', $property->getFacilitiesArray() ))) checked @endif />
                                                <label class="custom-control-label" for="facility-{{ $facility->name }}">{{ ucfirst($facility->name) }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class=" form-control" cols=" 30" rows="5">{!! old('description', $property->description) !!}</textarea>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $property->location) }}" placeholder="Location">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="image" class="required">Cover Image</label>
                                <input type="file" name="image" id="image" class="form-control-file" accept="image/*" hidden>
                                <label class="d-block btn btn-primary z-depth-0 my-0" for="image">Choose Image</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="city" class="required">Status</label>
                                <select class=" form-control" name="status" id="status" value="{{ old('status') }}">
                                    @foreach(config('property.status') as $label => $value)
                                    <option value="{{ $value }}" @if (old('status', $property->status) == $value) selected @endif> {{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success">{{ $property->exists ? 'Update' : 'Add Property' }}</button>
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
