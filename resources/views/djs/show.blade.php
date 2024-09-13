@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/profiles/' . $dj->profile_photo_path) }}" alt="{{ $dj->name }}" class="img-fluid rounded-circle mb-4" style="width: 150px; height: 150px; object-fit: cover;">

                        <h2 class="card-title">{{ $dj->name }}</h2>

                        <h4 class="mt-2"><span class="badge bg-dark">Ranking #{{ $ranking }}</span></h4>

                        <div class="mt-3">
                            <p class="mb-1"><strong>Edad:</strong> {{ $dj->age }}</p>
                            <p class="mb-1"><strong>Puntos acumulados:</strong> {{ $dj->points }}</p>
                            <p class="mb-1"><strong>Últimos shows:</strong>
                                @if ($dj->last_festivals)
                                    {{ implode(', ', array_map('ucwords', json_decode($dj->last_festivals))) }}
                                @else
                                    No hay shows recientes
                                @endif
                            </p>

                        </div>

                        <div class="mt-4">
                            <a href="{{ route('djs.index') }}" class="btn btn-outline-dark">Volver al Ranking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
