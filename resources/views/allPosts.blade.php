@extends('layouts.master')
@section('content') 
<section class=" all-posts bg-white dark:bg-gray-900 flex justify-center">
    <div class="max-w-4xl">
        <div class="flex flex-wrap -mx-4 posts-container">
        @foreach ($posts->take(4) as $post)  
                <div class="w-1/2 md:w-1/2 px-4 mt-10">
                    <a href="{{ route('posts.view', $post->id) }}" class="posts-contenedor flex flex-col items-center hover:bg-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"> 
                        <img class="w-full h-64 md:w-50 md:h-50" src="/storage/{{ $post->image_url }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-50 dark:text-white">{{ $post->title }}</h5>
                            <p class="text-blue-600 mb-3">{{ $post->filter }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ Str::limit($post->body, 150) }}</p>
                            <span class="text-sm text-gray-500 dark:text-gray-300"> {{ \Carbon\Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A') }} </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <button id="ver-mas" type="button" class="py-2.5 px-5 mt-4 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ver Más</button>
    </div>    
</section>
@stop




