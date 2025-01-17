<x-formulaire>
    <div>
        <h1 class="px-6">Modifier Book</h1>
    </div>    

    <form method="POST" action="{{ route('book.update' , $books->id) }}">
   @csrf
   @method('PUT')

       <div class="mt-4"> 
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"  placeholder="Title" required  value="{{ $books->title }}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="author_id" :value="__('Author')"/>
            <select name="author_id" id="author_id"   class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required value="{{ $books->authors }}">
                <option :value="__('Author')">Liste des auteurs</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
        </div>

        <div class="mt-4"> 
            <x-input-label for="isbn" :value="__('Isbn')"/>
            <x-text-input id="isbn" class="block mt-1 w-full" type="number" name="isbn"  placeholder="Isbn" required  value="{{ $books->isbn }}"/>
            <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
        </div>

        <div class="mt-4"> 
            <x-input-label for="published_year" :value="__('Published year')"/>
            <x-text-input id="published_year" class="block mt-1 w-full" type="date" name="published_year"  placeholder="Published year" required  value="{{ $books->published_year }}"/>
            <x-input-error :messages="$errors->get('published_year')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-emerald-600">
                {{ __('Mettre à jour') }}
            </x-primary-button>
        </div>

    </form>
       
</x-formulaire>
