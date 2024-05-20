<x-layout>
    <x-slot:heading>
    My Job Listings
</x-slot:heading>

<div class="space-y-4">
@foreach ($jobs as $job)
    <a href = "/jobs/{{ $job['id'] }}" class = "block px-4 py-6 border border-gray-200 rounded-lg">
        <strong>{{  $job['title'] }}:</strong> Pays {{ number_format( $job['salary']) }}$  per year .
</a>
@endforeach
<div >
    {{ $jobs -> links()}}
    </div>
</div>
</x-layout>
