<x-layout heading="Jobs">
    <h1>Jobs</h1>

    <div>
    @foreach ($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-300 mb-2 rounded-lg">
                <div class="font-bold text-cyan-600 text-sm">
                    {{ $job->employer->name}}
                </div>
                <div>
                    <strong>{{ $job['title'] }}:</strong> Pays {{  $job['salary'] }}
                </div>
            </a>
    @endforeach
    <div>
        {{ $jobs->links() }}
    </div>
    </div>
</x-layout>
