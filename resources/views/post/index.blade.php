<x-navbar>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des Posts') }} 
            
        </h2>    
    </x-slot>
</x-navbar>
<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="container mx-auto p-8 bg-gray-50 rounded shadow-lg">
        <div class="flex justify-end items-center mb-8">
            <div class="hidden space-x-8 my-2  sm:flex">
                    <x-third_button><a href="{{ route('post.create') }}">{{ __('Créer un Post') }}</a></x-third_button>
            </div>
        </div>
    <div>
    <div>
        <x-table>
            <x-thead>
                <tr>
                    <th class="w-1/2 px-6 py-3 ">{{__('Titles') }} </th>
                    <th class="w-1/2 px-6 py-3 ">{{__('Content')}}</th>
                    <th class="w-1/2 px-6 py-3 ">{{__('Book')}}</th>
                    <th class="w-1/2 px-6 py-3 ">Action</th>
                </tr>
            </x-thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="hover:bg-sky-200">
                    <td class="w-1/2 px-6 py-3 text-center">{{$post->title}}</td>
                    <td class="w-1/2 px-6 py-3 text-center">{{$post->content}}</td>
                    <td class="w-1/2 px-6 py-3 text-center">{{$post->book?->title ?? 'Aucun livre' }}</td>
                    <td class="w-1/2 px-6 py-3 text-center ">
                        <a href="{{ route('post.edit', $post->id) }}" class="text-blue-500 hover:text-blue-950  ">Modifier</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-950 mt-4">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</div>
