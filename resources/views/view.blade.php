@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-8">
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg overflow-hidden"> 
                <img class="w-full h-96 object-cover" src="/storage/{{ $post->image_url }}" alt="Post Image"> 
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    @if ($post->user)
                        <p class="text-blue-700 dark:text-blue-700 mt-2 mb-4 font-semibold">Por: {{ $post->user->name }}</p>
                    @endif
                    <p class="mb-3 text-gray-500 dark:text-gray-400 first-line:uppercase first-line:tracking-widest first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 dark:first-letter:text-gray-100 first-letter:mr-3 first-letter:float-left">{{ $post->body }}</p>
                </div>
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-800">
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection









