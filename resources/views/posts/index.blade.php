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
                <div class="px-6 py-2 border-t border-gray-200 bg-gray-100">
                    <p class="text-sm text-gray-600">Written by <span class="font-semibold">{{ $post->employer->name }}</span></p>
                </div>
            </a>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
