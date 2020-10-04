<form action="{{ route('localcontacts.store') }}" method="post" class=" form" enctype="multipart/form-data">
    @csrf
    @if($localContact->exists)
    @method('put')
    @endif
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="profesion">Profession</label>
            <select name="profession_id" class="form-control" required>
                <option value="">Select Profession</option>
                @foreach ($professions as $profession)
                <option value="{{ $profession->id }}" class=" text-capitalize">{{$profession->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class=" col-md-4 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class=" form-control" value="{{ old('name') }}" placeholder="Name" required>
        </div>

        <div class=" col-md-4 form-group">
            <label>Contact No.</label>
            <input type="text" name="contact" class=" form-control" value="{{ old('contact') }}" placeholder="Contact No." required>
        </div>

        <div class=" col-md-4 form-group">
            <label for="city">City</label>
            <select name="city_id" class=" form-control" required>
                <option value="">Select City</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" class=" text-capitalize">{{ $city->name }}
                </option>
                @endforeach

            </select>
        </div>

        <div class="col-md-8 form-group">
            <label for="city">Address Line</label>
            <input type="text" name="address_line" class=" form-control" value="{{ old('address_line') }}" placeholder="Local Address Line" required>
        </div>


        <div class="col-md-4 form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" class="  form-control" value="{{ old('email') }}" placeholder="Email">

        </div>

        <div class="col-md-4 form-group">
            <label>Qualification</label>
            <input type="text" name="qulification" class=" form-control" value="{{ old('qualification') }}" placeholder="Qualification">
        </div>
        <div class="col-md-4 form-group">
            <label for="image">Profile Picture</label>
            <input type="file" id="image" name="image" class="  form-control" value="{{ old('image') }}" accept="image/*">
        </div>
        <div class="col-md-8 form-group">
            <label>About</label>
            <textarea name="about" class=" form-control" rows="4" placeholder="About">{{ old('about') }}</textarea>
        </div>

    </div>

    <div class="row form-group">
        <button type="submit" class="btn btn-success">{{ $localContact->exists ? 'Update' : 'Save' }}</button>
    </div>

</form>
