<x-layout>
    <x-slot name="heading">
        Posts
    </x-slot>

    <div class="space-y-8">
        @foreach ($posts as $post)
            <a href="/posts/{{ $post->id }}" class="block border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-bold text-blue-500">{{ $post->title }}</h2>
                    <p class="text-gray-800 mt-2">{{ $post->description }}</p>
                </div>

            </a>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
