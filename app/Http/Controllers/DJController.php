<?php

namespace App\Http\Controllers;

use App\Http\Models\DJ;
use App\Http\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;



class DJController extends Controller
{
    public function index()
    {
        $djs = User::whereNotNull('points')->orderBy('points', 'desc')->get();
        return view('djs.index', compact('djs'));
    }

    public function show($id)
    {
        $dj = User::findOrFail($id);

        // Obtener todos los DJs ordenados por puntos de manera descendente
        $djs = User::orderBy('points', 'desc')->get();

        // Calcular la posición del DJ en el ranking
        $ranking = $djs->search(function ($item) use ($dj) {
                return $item->id === $dj->id;
            }) + 1; // +1 para obtener la posición basada en 1

        return view('djs.show', compact('dj', 'ranking'));
    }


    public function assignTourPermission()
    {
        $permission = Permission::firstOrCreate(['name' => 'participate in tours']);
        $djs = User::role('dj')->get();

        foreach ($djs as $dj) {
            $dj->givePermissionTo($permission);
        }
    }
}
