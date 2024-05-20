<x-layout>
    <x-slot name="heading">
        Post: {{ $post['title'] }}
    </x-slot>
    @php
        $tags = "";
        if ($post && $post->tags->isNotEmpty()) {

    foreach ( $post->tags as $tag ){
        $tags .= $tag ->name .",";
    }
    $tags = rtrim($tags, ",") . ".";
        }
    @endphp
    <div class="max-w-3xl mx-auto">
        <article class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post['title'] }}</h1>
            <div class="font-bold text-blue-500 text-sm"> {{ $tags}} </div>
            @foreach($post->images as $image)
                <img class="relative inline-flex items-center mt-8 h-500 w-200 rounded-2xl bg-gray-50"
                     src="{{ asset('images/'.$image->path) }}" alt="Image">
            @endforeach()

            <p class="text-gray-800 mt-6 mb-6 ">{{ $post->description }}</p>

            <div class="px-6 py-2 border-t border-gray-200 bg-gray-100">
                <p class="text-sm text-gray-600">Written by <span
                        class="font-semibold">{{ $post->employer->name }}</span></p>

            </div>
            <p class="mt-12">
                @can ('edit',$post)
                    <x-button href="/posts/{{ $post ->id }}/edit">Edit Post</x-button>
                @endcan
            </p>
        </article>


    </div>
</x-layout>
