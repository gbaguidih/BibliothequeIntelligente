@csrf
<x-navbar>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ _('Liste des Auteurs')}}
        </h2>    
    </x-slot>
</x-navbar>
<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="container mx-auto p-8 bg-gray-50 rounded shadow-lg">
        <div class="flex justify-end items-center mb-8">
            <div class="hidden space-x-8 my-2  sm:flex">
                    <x-third_button><a href="{{ route('author.create') }}">{{ __('Créer un Auteur') }}</a></x-third_button>
            </div>
        </div>
    <div>
        <x-table>
            <x-thead>
                <tr>
                    <th class="w-1/2 px-6 py-3 ">Nom de l'Auteur</th>
                    <th class="w-1/2 px-6 py-3 ">Biographie</th>
                    <th class="w-1/2 px-6 py-3 ">Action</th>
                </tr>
            </x-thead>
            <tbody>
                @foreach ($authors as $author)
                <tr class="hover:bg-sky-200">
                    <td class="w-1/2 px-6 py-3 text-center">{{ $author->name }}</td>
                    <td class="w-1/2 px-6 py-3 text-center">{{ $author->biography }}</td>
                    <td class="w-1/2 px-6 py-3 text-center ">
                        <a href="{{ route('author.edit', $author->id) }}" class="text-blue-500 hover:text-blue-950  ">Modifier</a>
                        <form action="{{ route('author.destroy', $author->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500  hover:text-red-950 mt-4">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</div>

