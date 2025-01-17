<x-formulaire>
    <div>
        <h1 class="px-6">Modifier Book</h1>
    </div>    

    <form method="POST" action="{{ route('post.update' , $posts->id) }}">
   @csrf
   @method('PUT')

       <div class="mt-4"> 
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"  placeholder="Title" required  value="{{ $posts->title }}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')"/>
            <textarea class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content"  placeholder="content" value="{{ $posts->content }}" required>{{ old('content', $posts->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="book_id" :value="__('Book')"/>
            <select name="book_id" id="book_id"   class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required value="{{ $posts->authors }}">
                <option :value="__('Author')">{{ _('Choisir des livres')}}</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}"> {{ $book->title }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('book_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-emerald-600">
                {{ __('Mettre à jour') }}
            </x-primary-button>
        </div>

    </form>
       
</x-formulaire>
