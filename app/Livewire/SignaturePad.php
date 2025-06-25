<?php

namespace App\Livewire;

use Livewire\Component;

class SignaturePad extends Component
{
   public string $signature = '';
    public function render()
    {
        return view('livewire.signature-pad');
    }
}
