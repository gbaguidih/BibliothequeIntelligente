<x-formulaire>
    <div>
        <h1 class="px-6">Create Comment</h1>
    </div>    

    <form method="POST" action="{{ route('comment.store') }}">
   @csrf
    
        <div class="mt-4">
            <x-input-label for="post_id" :value="__('Post')"/>
            <select name="post_id" id="post_id"   class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option :value="__('Post')"></option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('post_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="author_id" :value="__('Author')"/>
            <select name="author_id" id="author_id"   class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option :value="__('Author')"></option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')"/>
            <textarea class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content"  placeholder="content" required></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-sky-600">
                {{ __('Create') }}
            </x-primary-button>
        </div>

    </form>
       
</x-formulaire>
