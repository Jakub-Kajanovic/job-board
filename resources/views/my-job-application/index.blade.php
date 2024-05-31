<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My Job Appcations' => '#']"/>

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
        <div class="flex justify-between items-center text-xs text-slate-500">
            <div>Applied {{$application->created_at->diffForHumans()}}
                <p>Other {{Str::plural('applicant', $application->job->job_applications_count - 1)}}
                    {{$application->job->job_applications_count - 1}}
                </p>
                <p>
                    Your asking salary ${{number_format($application->expected_salary)}}
                </p>
                <p>
                    Avarage asking salary ${{number_format($application->job->job_applications_avg_expected_salary)}}
                </p>
        </div>
            <div>
                <form action="{{route('my-job-applications.destroy', $application)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-button>Cancel</x-button>
                </form>
            </div>
        </div>
        </x-job-card>
    @empty
    <div class="rounded-md border border-dashed border-slate-600 p-8">
        <div class="text-center font-medium">
            No job applications yet
        </div>
        <div class="text-center">
            Go find some jobs <a href="{{route('jobs.index')}}" class="text-indigo-500 hover:underline">here!</a>
        </div>
    </div>
    @endforelse
</x-layout>