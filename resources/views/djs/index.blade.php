

@extends('layouts.app')

@section('content')
    <section class="w-100 py-5 bg-black bg-gradient p-2 text-white">
        <div class="container p-5 text-center">
            <h1 class="display-4 fw-bold">Summer Music Festival</h1>
            <p class="mt-3 fs-4">June 1st - June 3rd, 2024</p>
        </div>
    </section>

    <div class="container p-5">
        <h1 class="text-center pb-5">Ranking de DJs</h1>
        <div class="row">
            @foreach ($djs as $index => $dj)
                <div class="col-md-4 mb-4">
                    <div class="card h-100"
                         style="width: 25rem; {{ $index == 0 ? 'border: 3px solid gold;' : ($index == 1 ? 'border: 3px solid silver;' : ($index == 2 ? 'border: 3px solid #cd7f32;' : '')) }}">
                        <div class="position-relative">
                            <img src="{{  asset('storage/profiles/' . basename($dj->profile_photo_path)) }}" class="card-img-top" alt="...">
                            @if ($index == 0)
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2 fs-5">🥇 1er Puesto</span>
                            @elseif ($index == 1)
                                <span class="badge bg-light text-dark position-absolute top-0 start-0 m-2 fs-5">🥈 2do Puesto</span>
                            @elseif ($index == 2)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2 fs-5">🥉 3er Puesto</span>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ route('djs.show', $dj->id) }}" class="card-title text-decoration-none display-6">{{ $dj->name }}</a>
                            <p class="card-text">{{ $dj->points }} PUNTOS</p>
                            <a href="{{ route('djs.show', $dj->id) }}" class="btn btn-dark">Ver perfil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
