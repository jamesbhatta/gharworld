<?php

namespace App\Http\Livewire;

use App\Rate;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ReviewList extends Component
{
    public $model;
    public function mount($model)
    {
        // if(get_class($property)){}
        $this->model = $model;
    }
    public function render()
    {
        $rates =Rate::where('status',"verified")->whereHasMorph(
            'rateable',get_class($this->model),
            function (Builder $query) {
              $query->where(['rateable_id' => $this->model->id]);
            }
        )->latest()->paginate(10);
        return view('livewire.review-list',['rates'=>$rates]);
    }
}
