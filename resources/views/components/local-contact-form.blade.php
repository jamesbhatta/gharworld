<form action="{{ $localContact->exists ? route('local-contacts.update', $localContact) : route('local-contacts.store') }}" method="post" class=" form" enctype="multipart/form-data">
    @csrf
    @if($localContact->exists)
    @method('put')
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="profesion" class="required">Profession</label>
                    <select name="profession_id" class="form-control" required>
                        <option value="">Select Profession</option>
                        @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}" @if(old('profession_id', $localContact->profession_id) == $profession->id) selected @endif>{{$profession->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="name" class="required">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $localContact->name) }}" placeholder="Name" required>
                </div>

                <div class="col-md-6 form-group">
                    <label class="required">Contact No.</label>
                    <input type="text" name="contact" class="form-control" value="{{ old('contact', $localContact->contact) }}" placeholder="Contact No." required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="city" class="required">City</label>
                    <select name="city_id" class="form-control" required>
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if(old('city_id', $localContact->city_id) == $city->id) selected @endif>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="city" class="required">Address Line</label>
                    <input type="text" name="address_line" class="form-control" value="{{ old('address_line', $localContact->address_line) }}" placeholder="Detail Address Line" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="email" class=" form-control" value="{{ old('email', $localContact->email) }}">
                </div>

                <div class="col-md-6 form-group">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $localContact->qualification) }}">
                </div>

                <div class="col-md-12 form-group">
                    <label>About</label>
                    <textarea name="about" class=" form-control" id="about" rows="8" placeholder="Let them know the specialities">{!! old('about', $localContact->about) !!}</textarea>
                </div>

                <div class="col-md-6 form-group">
                    <button type="submit" class="btn btn-success btn-lg w-100">{{ $localContact->exists ? 'Update' : 'Save' }}</button>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group text-center">
                @php
                if ( Storage::exists($localContact->image) ) {
                $imageUrl = asset('storage/' . $localContact->image);
                } else{
                $imageUrl = asset('assets/img/person-avatar.png');
                }
                @endphp
                <img id="profileImagePreview" class="img-fluid img-thumbnail" src="{{ $imageUrl }}" alt="" style="max-height: 300px;">
                <input type="file" name="image" id="profileImage" value="{{ old('image') }}" accept="image/*" hidden>
                <label for="profileImage" class="btn btn-primary btn-lg mt-3" for="">Select Profile Image</label>
                <script>
                    let profileImage = document.getElementById('profileImage');
                    let profileImagePreview = document.getElementById('profileImagePreview');

                    function readProductImageURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                profileImagePreview.setAttribute('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    profileImage.addEventListener("change", function() {
                        readProductImageURL(this);
                    });

                </script>
            </div>
        </div>

    </div>
</form>
@push('scripts')
<script>
    $(function() {
        $('#about').summernote({
            height: 250
        });
    });

</script>
@endpush