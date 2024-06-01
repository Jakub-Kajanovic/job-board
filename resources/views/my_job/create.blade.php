<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />
        <x-card>
        <form action="{{route('my-jobs.store')}}" method="POST">
            @csrf
        <div class="grid grid-cols-2 mb-4 gap-4">
            <div class="">
                <x-label for="title" :required="true">Job Title</x-label>
                <x-text-input type="text" name="title" />
            </div>
            <div class="">
                <x-label for="Location" :required="true">Location</x-label>
                <x-text-input type="text" name="location" />
            </div>
            <div class="col-span-2">
                <x-label for="salary" :required="true">Salary</x-label>
                <x-text-input type="number" name="salary" />
            </div>
            <div class="col-span-2">
                <x-label for="description" :required="true">Description</x-label>
                <x-text-input type="textarea" name="description" />
            </div>
            <div>
            <x-label for="experience" :required="true">Experience</x-label>
            <x-radio-group name="experience" :allOption="false" :value="old('experience')" :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience),\App\Models\Job::$experience,)"/>
            </div>
            <div>
                <x-label for="category" :required="true">Category</x-label>
                <x-radio-group name="category" :allOption="false" :value="old('category')" :options="\App\Models\Job::$category"/>
            </div>
        </div>
        <x-button class="w-full">Create Job</x-button>
        </form>
        </x-card>
</x-layout>