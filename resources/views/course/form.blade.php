<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Course') }}
        </h2>
    </header>


    <form method="post" action="{{ isset($course)?(route('course.update',$course->id)):route('course.store') }}" class="mt-6 space-y-6">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title',$course->title??'')" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description',$course->description??'')" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="teacher_id" :value="__('Teacher')" />
            <select id="teacher_id" name="teacher_id" type="text" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"  required>
                <option disabled selected>Select Teacher</option>
                @foreach(\App\Models\Teacher::all() as $teacher)
                    <option {{ isset($course)?(($course->teacher_id == $teacher->id)?"selected":""):'' }} value="{{ $teacher->id }}">{{ ucwords($teacher->name) }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('teacher_id')" />
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route("course.index") }}" style="float: right" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Cancel
            </a>
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
