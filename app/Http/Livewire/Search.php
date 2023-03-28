<?php

namespace App\Http\Livewire;

use App\Models\Prodact;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $prodact ;
    public function searchProduct(){
 
        // $this->prodact=Prodact::where('name', 'like', '%'.$this->search.'%')->get();
        //  dd($this->prodact);
}


    public function render()
    {
        if(empty($this->search)){
      $this->prodact=Prodact::where('name',$this->search)->get();

        }else{

            $this->prodact=Prodact::where('name','like','%'.$this->search.'%')->get();
        }
        return view('livewire.search');
        
    }

   

   
}
