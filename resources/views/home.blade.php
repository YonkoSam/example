<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Job Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Employer
                </th>
                <th scope="col" class="px-6 py-3">
                    Salary
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job )
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white underline">
                        <a href="/jobs/{{ $job->id}}">{{ $job ->title }}  </a>
                    </th>
                    <td class="px-6 py-4 underline">
                        <a href="/jobs/list/{{ $job->employer_id}}">{{ $job->employer->name }}  </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ number_format( $job->salary)  }} $
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

        <div class="bg-white py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-3 lg:px-4">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Latest Posts :</h2>
                </div>
                <div
                    class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    @foreach($posts as $post)
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16"
                                      class="text-gray-500">{{date("Y-m-d", strtotime($post->created_at))}}</time>
                                <a href="#"
                                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">example</a>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{substr($post->title, 0, 18)}} ...
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{$post->description}}</p>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                @if($post->employer->profile_picture != null )
                                    <img
                                        src="{{asset('images/' .$post->employer->profile_picture) }}"
                                        alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                @else
                                    <img
                                        src="{{asset('images/' .'Avatar.png') }}"
                                        alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                @endif
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="#">
                                            <span class="absolute inset-0"></span>
                                            {{$post->employer->name}}
                                        </a>
                                    </p>
                                    <p class="text-gray-600">Co-Founder / CTO</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="pt-12 border-t-2 border-gray-100 text-center">
        <a class="relative group inline-block py-4 px-7 font-semibold text-grey-900 hover:text-orange-50 rounded-full bg-grey-50 transition duration-300 overflow-hidden"
           href="/posts">
            <div
                class="absolute top-0 right-full w-full h-full bg-gray-900 transform group-hover:translate-x-full group-hover:scale-102 transition duration-500"></div>
            <span class="relative">See More Posts</span>
        </a>
    </div>
    </div>
    </div>
    </section>
    </div>
</x-layout>
