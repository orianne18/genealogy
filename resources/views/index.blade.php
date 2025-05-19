<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des personnes') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Messages de session --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif


    <table>

        <thead>
          <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Créé(e) par</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($people as $person )
            <tr>
                <td>{{$person->first_name}}</td>
                <td>{{$person->last_name}}</td>
                <td>{{$person->creator->first_name}} {{$person->creator->last_name}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>


    </x-app-layout>
