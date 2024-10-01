<x-layout heading="Comments">
    <h1>Comments</h1>

    <ul>
    @foreach ($comments as $comment)
        <li>
            <a href="/comments/{{$comment['id']}}" class="text-blue-500 hover:underline">
                <strong>{{ $comment['title'] }}</strong>
            </a>
        </li>
    @endforeach
    </ul>
</x-layout>
