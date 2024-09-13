<?php

namespace App\Livewire;

use App\Http\Models\Festival;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class ShowSelector extends Component
{
    public $festivals;

    public function mount()
    {
        $this->festivals = Festival::all();
    }

    public function attendFestival($festivalId)
    {
        $dj = Auth::user();
        $festival = Festival::find($festivalId);

        if (!$dj->festivals->contains($festival)) {
            $dj->festivals()->attach($festival);
            $dj->points += $festival->points;
            $dj->save();

            $this->dispatch('pointsUpdated');

            session()->flash('success', '¡Te has registrado en ' . $festival->name . ' y has ganado ' . $festival->points . ' puntos!');
        } else {
            session()->flash('error', 'Ya asististe a este festival.');
        }
    }


    public function cancelFestival($festivalId)
    {
        $dj = Auth::user();
        $festival = Festival::find($festivalId);

        if ($dj->festivals->contains($festival)) {
            $dj->festivals()->detach($festival);
            $dj->points -= $festival->points;
            $dj->save();

            $this->dispatch('pointsUpdated');


            session()->flash('success', 'Has cancelado tu asistencia al ' . $festival->name . ' y se han restado ' . $festival->points . ' puntos.');
        } else {
            session()->flash('error', 'No estás registrado en este festival.');
        }
    }

    public function render()
    {
        return view('livewire.showselector', [
            'festivals' => $this->festivals,
        ]);
    }
}
