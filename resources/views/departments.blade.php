<x-layout heading="Departments">
    <h1>Departments</h1>

    <ul>
    @foreach ($departments as $department)
        <li>
            <a href="/departments/{{$department['id']}}" class="text-blue-500 hover:underline">
                {{ $department['department_name'] }}
            </a>
        </li>
    @endforeach
    </ul>
</x-layout>
