<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-md-4">
            <a href="#">
                <div class="card shadow bg-light">
                    <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                        Iniciar consiliação
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>