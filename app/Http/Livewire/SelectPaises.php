<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pais;
use App\Models\Region;



class SelectPaises extends Component
{
    public $paisSeleccionado = null, $regionSeleccionada = null, $subRegionSeleccionada = null;
    public $subRegiones = null;
    
    public function render()
    {
        return view('livewire.select-paises',['paises' => Pais::all(), 'regiones'=>Region::all()]);
    }
}
