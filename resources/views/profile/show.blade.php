
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold text-dark">{{ __('Perfil') }}</h2>
        </div>

        <div class="card shadow-sm p-4">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mb-5">
                    @livewire('profile.update-profile-information-form')
                </div>

                <hr class="my-4">
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-5">
                    @livewire('profile.update-password-form')
                </div>

                <hr class="my-4">
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-5">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <hr class="my-4">
            @endif

            <div class="mt-5">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr class="my-4">

                <div class="mt-5">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
@endsection

