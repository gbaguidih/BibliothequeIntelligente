<x-formulaire>
    <div>
        <h1 class="px-6">Create Post</h1>
    </div>    

    <form method="POST" action="{{ route('post.store') }}">
   @csrf

       <div class="mt-4"> 
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"  placeholder="Title" required/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')"/>
            <textarea class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content"  placeholder="content" required></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="book_id" :value="__('Book')"/>
            <select name="book_id" id="book_id"   class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option :value="__('Book')"></option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('book_id')" class="mt-2" />
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-sky-600">
                {{ __('Create') }}
            </x-primary-button>
        </div>

    </form>
       
</x-formulaire>
