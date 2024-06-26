<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium ">{{$job->title}}</h2>
        <div class="text-slate-500">${{number_format($job->salary)}}</div>
    </div>
    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex items-center space-x-4">
            <div>{{$job->employer->company_name}}</div>
            <div>{{$job->location}}</div>
            @if ($job->deleted_at)
                <span class="text-xs text-red-500">Job has been deleted</span>
            @endif
        </div>
        <div class="flex lg:flex-row flex-col lg:space-y-0 space-y-2 space-x-1 items-center">
            <x-tag><a href="{{route('jobs.index', [ 'experience' => $job->experience ]) }}">{{Str::ucfirst($job->experience)}}</a></x-tag>
            <x-tag class="rounded-md border px-2 py-1"><a href="{{route('jobs.index' , ['category' => $job->category ]) }}">{{$job->category}}</a></x-tag>
        </div>
    </div>
  
    
    {{$slot}}
</x-card>