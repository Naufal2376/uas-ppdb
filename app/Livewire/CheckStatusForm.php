<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Registration;

class CheckStatusForm extends Component
{
    public $registration_number;
    public $statusResult = null;
    public $errorMessage = null;

    public function checkStatus()
    {
        $this->validate([
            'registration_number' => 'required|string',
        ]);

        $this->errorMessage = null;
        $this->statusResult = null;

        $registration = Registration::where('registration_number', $this->registration_number)->first();

        if ($registration) {
            $this->statusResult = $registration->status;
        } else {
            $this->errorMessage = 'Nomor Pendaftaran tidak ditemukan. Periksa kembali format input Anda.';
        }
    }

    public function render()
    {
        return view('livewire.check-status-form');
    }
}
