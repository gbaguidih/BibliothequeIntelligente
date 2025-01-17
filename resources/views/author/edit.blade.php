<x-formulaire>
    <div>
        <h1 class="px-6">Modifier Author</h1>
    </div>    

    <form method="POST" action="{{ route('author.update' , $authors->id) }}">
   @csrf
   @method('PUT')

       <div class="mt-4"> 
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  placeholder="Name" required  value="{{ $authors->name }}"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="biography" :value="__('Biography')"/>
            <textarea class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="biography"  placeholder="Biography" required  value="{{ $authors->biography }}">{{ old('biography', $authors->biography) }}</textarea>
            <x-input-error :messages="$errors->get('biography')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 bg-emerald-600">
                {{ __('Mettre à jour') }}
            </x-primary-button>
        </div>

    </form>
       
</x-formulaire>
