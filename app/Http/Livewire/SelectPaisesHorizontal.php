<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pais;
use App\Models\Region;
use App\Models\Subregion;

class SelectPaisesHorizontal extends Component
{
    public $paisSeleccionado = null, $regionSeleccionada = null, $subRegionSeleccionada = null;
    public $regiones = null, $subregiones = null;
    
    public function render()
    {
        return view('livewire.select-paises-horizontal',['paises' => Pais::all()]);
    }

    public function updatedpaisSeleccionado($pais_id){
        $this->regiones = Region::where('paises_id', $pais_id)->orderBy('name','asc')->get();
        $this->subregiones = null;
    }

    public function updatedregionSeleccionada($region_id){
        $this->subregiones = Subregion::where('regiones_id', $region_id)->orderBy('name','asc')->get();
    }
}
