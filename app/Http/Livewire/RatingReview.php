<?php

namespace App\Http\Livewire;


use App\Rate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RatingReview extends Component
{
    public $model;
    public $value = 0;
    public $review;
    public $rate;
   


    public function mount($model)
    {
        // if(get_class($property)){}
        $this->model = $model;
    }
    // public function rate1()
    // {
    //     $this->value = "1";
    // }
    // public function rate2()
    // {
    //     $this->value = "2";
    // }
    // public function rate3()
    // {
    //     $this->value = "3";
    // }
    // public function rate4()
    // {
    //     $this->value = "4";
    // }
    // public function rate5()
    // {
    //     $this->value = "5";
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
                'rate' => $this->value,
                'review' => $this->review,
                'user_id' => Auth::user()->id,
                'status' => "verified",
            ]);
            $this->model->rate()->save($rate);
        } 
        // else {
        //     $rates = Rate::whereHasMorph(
        //         'rateable',get_class($this->model),
        //         function (Builder $query) {
        //           $query->where(['user_id' => auth()->user()->id, 'rateable_id' => $this->model->id]);
        //         }
        //     )->update([
        //         'rate' => $this->value,
        //         'review' => $this->review,
        //     ]);
        // }
        $this->rating();
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
        $this->rating();
    }
    public function rating(){
        $rates =Rate::where('status',"verified")->whereHasMorph(
            'rateable',get_class($this->model),
            function (Builder $query) {
              $query->where(['rateable_id' => $this->model->id]);
            }
        )->get('rate');
        $rating = 0;
        $count=$rates->count();
        if($count>0){
            foreach ($rates as $rate ) {
                $rating =$rating + $rate->rate;
            }
            $overAllRating=round($rating/$count);
        }else{
            $overAllRating=null;
        }
        
     $this->model->update(['overall_rating'=>$overAllRating ]);
    }
}
