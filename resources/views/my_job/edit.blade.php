<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-4" />
        <x-card>
        <form action="{{route('my-jobs.update', $job)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="grid grid-cols-2 mb-4 gap-4">
            <div class="">
                <x-label for="title" :required="true">Job Title</x-label>
                <x-text-input type="text" :value="$job->title" name="title" />
            </div>
            <div class="">
                <x-label for="Location" :required="true">Location</x-label>
                <x-text-input type="text" :value="$job->location" name="location" />
            </div>
            <div class="col-span-2">
                <x-label for="salary" :required="true">Salary</x-label>
                <x-text-input type="number" :value="$job->salary" name="salary" />
            </div>
            <div class="col-span-2">
                <x-label for="description" :required="true">Description</x-label>
                <x-text-input type="textarea" :value="$job->description" name="description" />
            </div>
            <div>
            <x-label for="experience" :required="true">Experience</x-label>
            <x-radio-group name="experience" :value="$job->experience" :allOption="false" :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience),\App\Models\Job::$experience,)"/>
            </div>
            <div>
                <x-label for="category" :required="true">Category</x-label>
                <x-radio-group name="category" :value="$job->category" :allOption="false" :options="\App\Models\Job::$category"/>
            </div>
        </div>
        <x-button class="w-full">Edit Job</x-button>
        </form>
        </x-card>
</x-layout>