<?php

namespace App\Http\Livewire;


use App\Rate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RatingReview extends Component
{
    public $model;
    public $msg = 0;
    public $review;
    public $review1;
    public $rate;
    public $name;


    public function mount($model)
    {
        // if(get_class($property)){}
        $this->model = $model;
    }
    // public function rate1()
    // {
    //     $this->msg = "1";
    // }
    // public function rate2()
    // {
    //     $this->msg = "2";
    // }
    // public function rate3()
    // {
    //     $this->msg = "3";
    // }
    // public function rate4()
    // {
    //     $this->msg = "4";
    // }
    // public function rate5()
    // {
    //     $this->msg = "5";
    // }
    public function submit()
    { 
        $rates = Rate::whereHasMorph(
            'rateable',get_class($this->model),
            function (Builder $query) {
              $query->where(['user_id' => auth()->user()->id, 'rateable_id' => $this->model->id]);
            }
        )->get();
        if (!count($rates)) {
            $rate = new Rate([
                'rate' => $this->msg,
                'review' => $this->review,
                'user_id' => Auth::user()->id,
                'status' => "verified",
            ]);
            $this->model->rate()->save($rate);
        } else {
            $rates = Rate::whereHasMorph(
                'rateable',get_class($this->model),
                function (Builder $query) {
                  $query->where(['user_id' => auth()->user()->id, 'rateable_id' => $this->model->id]);
                }
            )->update([
                'rate' => $this->msg,
                'review' => $this->review,
            ]);
        }
    }
    public function render()
    {
    
            $rates = Rate::whereHasMorph(
                'rateable',get_class($this->model),
                function (Builder $query) {
                    $query->where(['user_id' => auth()->user()->id, 'rateable_id' => $this->model->id]);
                }
                )->first();
            
        return view('livewire.rating-review', [
            'rates' => $rates,
        ]);
    }
    public function delete(){
        $rates = Rate::whereHasMorph(
            'rateable',get_class($this->model),
            function (Builder $query) {
              $query->where(['user_id' => auth()->user()->id, 'rateable_id' => $this->model->id]);
            }
        )->delete();
    }
}
