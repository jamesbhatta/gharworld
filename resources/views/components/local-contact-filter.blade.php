<form action="{{route('frontend.local-contacts.search')}}" method="GET" class="form">
    <div class="form-group">
        <label for="select-city" class="font-weight-bold text-decoration">Location</label>
        <select name="city_id" id="select-city" class="custom-select rounded-0" onchange='this.form.submit()'>
            <option value="">Select Location</option>
            @foreach ($cities as $city)
            <option value="{{ $city->id }}" {{"$city->id" == request()->city_id ? 'selected' : '' }}>
                {{ $city->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold text-decoration">Profession</label>
        <select name="profession_id" id="profession" class="custom-select rounded-0" onchange='this.form.submit()'>
            @foreach ($professions as $profession)
            <option value="{{ $profession->id }}" {{"$profession->id" == request()->profession_id ? 'selected' : '' }}>
                {{ $profession->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="font-weight-bold text-decoration">Rating</div>
    <div class="px-2 py-2">
        <div>
            <input type="radio" name="overall_rating" value="5" id="5" onchange='this.form.submit()' style="display: none">

            <label for="5">
                @for ($i = 1; $i <= 5; $i++) @if(5>= $i)
                    <span class="fa fa-star text-warning"></span>
                    @else
                    <span class="fa fa-star-o "></span>
                    @endif
                    </span>
                    @endfor
            </label>
        </div>
        <div>
            <input type="radio" name="overall_rating" value="4" id="4" onchange='this.form.submit()' style="display: none">
            <label for="4">
            @for ($i = 1; $i <= 5; $i++) @if(4>= $i)
                <span class="fa fa-star text-warning"></span>
                @else
                <span class="fa fa-star-o "></span>
                @endif
                </span>
                @endfor
                And Up
            </label>
        </div>
        <div>
            <input type="radio" name="overall_rating" value="3" id="3"  onchange='this.form.submit()' style="display: none">
            <label for="3">
            @for ($i = 1; $i <= 5; $i++) @if(3>= $i)
                <span class="fa fa-star text-warning"></span>
                @else
                <span class="fa fa-star-o "></span>
                @endif
                </span>
                @endfor
                And Up
            </label>
        </div>
        <div>
            <input type="radio" name="overall_rating" value="2" id="2" onchange='this.form.submit()' style="display: none">
            <label for="2">
            @for ($i = 1; $i <= 5; $i++) @if(2>= $i)
                <span class="fa fa-star text-warning"></span>
                @else
                <span class="fa fa-star-o "></span>
                @endif
                </span>
                @endfor
                And Up
            </label>
        </div>
        <div>
            <input type="radio" name="overall_rating" value="1" id="1" onchange='this.form.submit()' style="display: none">
            <label for="1">
            @for ($i = 1; $i <= 5; $i++) @if(1>= $i)
                <span class="fa fa-star text-warning"></span>
                @else
                <span class="fa fa-star-o "></span>
                @endif
                </span>
                @endfor
                And Up
            </label>
        </div>

    </div>
</form>