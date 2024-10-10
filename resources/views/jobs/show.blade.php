<x-layout heading="Job detail">
    <h2 class="font-bold text-lg">
        {{ $job->title }}
    </h2>
    <p>
        This job pasy {{ $job->salary}} per year.
    </p>
    <p class="mt-10">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
</x-layout>
