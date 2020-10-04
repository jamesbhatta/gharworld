<?php

namespace App\Http\Livewire;

use App\LocalContact;
use Livewire\Component;

class LocalContactStatusSwitch extends Component
{
    public $localContact;
    public $active;

    public function mount(LocalContact $localContact)
    {
        $this->localContact = $localContact;
        $this->active = $localContact->active;
    }

    public function updatedActive($value)
    {
        $this->localContact->update(['active' => $value]);
    }

    public function render()
    {
        return view('livewire.local-contact-status-switch');
    }
}
