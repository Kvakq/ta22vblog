@extends('partials.layout')
@section('title', $post->title)
@section('content')
    <div class="container mx-auto px-8 py-10">
   
        <a class="btn btn-primary mb-6" href="{{ url()->previous() }}">Back</a>

       
        <div class="overflow-x-auto bg-gray-800 text-white shadow-lg rounded-lg p-6">
            <table class="table-auto w-full text-left border-separate border-spacing-4">
                <thead>
                    <tr class="border-b border-gray-600">
                        <th class="px-6 py-4 text-xl font-semibold">Field</th>
                        <th class="px-6 py-4 text-xl font-semibold">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-400">ID</td>
                        <td class="px-6 py-4">{{ $post->id }}</td>
                    </tr>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-400">Title</td>
                        <td class="px-6 py-4">{{ $post->title }}</td>
                    </tr>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-400">Content</td>
                        <td class="px-6 py-4">{!! $post->displayBody !!}</td>
                    </tr>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-400">Created</td>
                        <td class="px-6 py-4">{{ $post->created_at }}</td>
                    </tr>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-400">Updated</td>
                        <td class="px-6 py-4">{{ $post->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
