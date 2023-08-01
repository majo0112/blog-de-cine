@include('layouts.master')

<section class="bg-white dark:bg-gray-900 flex justify-center">
    <div class="max-w-4xl">
        @foreach ($posts as $post)   
            <a href="{{ route('posts.view', $post->id) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-20"> <!-- Agrega el margen aquí (my-4) -->
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/storage/{{ $post->image_url }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                    <p class="text-blue-600 mb-3">{{ $post->filter }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                    <span class="text-sm text-gray-500 dark:text-gray-300"> {{ \Carbon\Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A') }} </span>
                </div>
            </a>   
        @endforeach
    </div>
</section>



