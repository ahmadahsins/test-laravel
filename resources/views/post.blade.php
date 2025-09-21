<x-layout>
    <x-slot:title>
        {{ $post->title }} {{ config('app.name') }}
    </x-slot:title>

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Post Header -->
        <header class="text-center mb-12">
            
            <div class="flex items-center justify-center space-x-4 mt-6">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full" 
                         src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=random" 
                         alt="{{ $post->author->name }}">
                </div>
                <div class="text-left">
                    <p class="text-sm font-medium text-gray-900">{{ $post->author->name }}</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                            {{ $post->created_at->format('F j, Y') }}
                        </time>
                        <span class="mx-2">•</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->
        <div class="prose prose-lg max-w-none">
            {!! $post->body !!}
        </div>

        <!-- Back to Blog Link -->
        <div class="mt-12 text-center">
            <a href="/blog" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </article>
</x-layout>