<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Quote;

class Multiform extends Component
{
    use WithFileUploads;

    public $date;
    public $name_project;    
    public $code;
    public $amount;
    public $construction_type;
    public $square_meter;
    public $execution_time;
    public $road_type;
    public $unit_value;
    public $subtotal;
    public $iva;
    public $total;
    public $value_add;
    public $validity;
    public $status;
    public $state;
    public $city;
    public $payment_method;
    public $customer;
    public $scope;

    public $totalSteps = 3;
    public $currentStep = 1;



    public function render()
    {
        return view('quotes.create');
    }

    public function increaseStep (){
        $this->resetErrorBag();
        $this->validateData(); // Revisar si se usa
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = 1;
        }
    }

    public function decreaseStep (){
        $this->resetErrorBag();        
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function register(){
        $this->errorBag();
        if($this->currentStep == 3){
            
        }
    }
}
