<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => '#']" />
<x-card>
    <div class="mb-8 text-right">
        <x-linkbutton href="{{route('my-jobs.create')}}">Add New</x-linkbutton>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>
                                {{$application->user->name}}
                            </div>
                            <div>
                                {{$application->created_at->diffForHumans()}}
                            </div>
                            <div>
                                Download CV 
                            </div>
                        </div>
                        <div>${{number_format($application->expected_salary)}}</div>
                    </div>
                @empty
                    <div class="mb-4">
                        <div>
                            No job applications yet
                        </div>
                    </div>
                @endforelse
                <div class="flex justify-between items-center">
                    <x-linkbutton href="{{route('my-jobs.edit', $job)}}">Edit</x-linkbutton>
                    <form action="{{route('my-jobs.destroy', $job)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="bg-red-300">Delete</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
        @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8 ">
            <div class="text-center font-medium">
                No jobs yet
            </div>
            <div class="text-center">
                Post your first job <a href="{{route('my-jobs.create')}}" class="text-indigo-500 hover:underline">here!</a>
            </div>
        </div>
    @endforelse
</x-card>
</x-layout>