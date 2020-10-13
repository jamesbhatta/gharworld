<form action="{{route('frontend.local-contacts.search')}}" method="GET" class="form">
    <div class="form-group">
        <label for="select-city" class="text-secondary">Location</label>
        <select name="city_id" id="select-city" class="custom-select rounded-0">
            <option value="">Select Location</option>
            @foreach ($cities as $city)
            <option value="{{ $city->id }}" {{"$city->id" == request()->city_id ? 'selected' : '' }}>
                {{ $city->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="text-secondary">Profession</label>
        <select name="profession_id" id="profession" class="custom-select rounded-0">
            @foreach ($professions as $profession)
            <option value="{{ $profession->id }}" {{"$profession->id" == request()->profession_id ? 'selected' : '' }}>
                {{ $profession->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="text-secondary">Rating</label>
        <a href="" class="d-flex">
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
        </a>
        <a href="" class="d-flex">
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star text-secondary p-1"> And Up</span>

        </a>
        <a href="" class="d-flex">
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"> And Up</span>
        </a>
        <a href="" class="d-flex">
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"> And Up</span>

        </a>
        <a href="" class="d-flex">
            <span class="fa fa-star checked text-warning p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"></span>
            <span class="fa fa-star text-secondary p-1"> And Up</span>
        </a>
    </div>
    <input type="submit">
</form>