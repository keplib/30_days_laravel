<x-layout heading="Jobs">
    <h1>Jobs</h1>

    <ul>
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
                <strong>{{ $job['title'] }}:</strong> Pays {{  $job['salary'] }}
            </a>
        </li>
    @endforeach
    </ul>
</x-layout>
