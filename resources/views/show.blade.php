<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $person->first_name }} {{ $person->last_name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Parents --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Parents</h3>
            <table class="min-w-full table-auto border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($person->parents as $parent)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $parent->first_name }} {{ $parent->last_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-2 text-gray-500 italic">Aucun parent enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Enfants --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Enfants</h3>
            <table class="min-w-full table-auto border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($person->children as $child)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $child->first_name }} {{ $child->last_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-2 text-gray-500 italic">Aucun enfant enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
