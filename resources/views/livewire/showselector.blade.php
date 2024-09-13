 <div class="container mt-5">
        <h2 class="text-black text-center mb-4">
            <strong>{{ Auth::user() ? Auth::user()->points : 'Guest' }} Puntos</strong>
        </h2>

        <h2 class="text-center mb-4">
            <strong>Selecciona un festival para asistir</strong>
        </h2>

        <!-- Display Success or Error Messages -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display Festivals -->
        <div class="row">
            @foreach ($festivals as $festival)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-center"><strong>{{ $festival->name }}</strong></h5>
                                <p class="card-text text-center">Puntos: {{ $festival->points }}</p>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button wire:click="attendFestival({{ $festival->id }})" class="btn btn-primary">
                                    Asistir
                                </button>
                                <button wire:click="cancelFestival({{ $festival->id }})" class="btn btn-danger">
                                    Cancelar Asistencia
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

