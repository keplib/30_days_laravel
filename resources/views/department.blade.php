<x-layout heading="Employees">
    <h1>Employees</h1>

    <ul>
    @foreach ($employees as $employee)
        <li>

            {{ $employee['first_name'] }}  {{ $employee['last_name'] }}

        </li>
    @endforeach
    </ul>
</x-layout>
