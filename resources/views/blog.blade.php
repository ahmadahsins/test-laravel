<x-layout>
  <x-slot:title>
    {{ $title }} | {{ config('app.name') }}
  </x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Latest Blog Posts</h1>
      <p class="text-xl text-gray-600">Discover our latest stories and insights</p>
    </div>
    
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($posts as $post)
        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
          <div class="p-6">
            <div class="flex flex-col gap-2 justify-center mb-4">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=random" alt="{{ $post->author->name }}">
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">{{ $post->author->name }}</p>
                <div class="flex space-x-1 text-sm text-gray-500">
                  <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                    {{ $post->created_at->diffForHumans() }}
                  </time>
                </div>
              </div>

              <a href="/post/{{ $post->slug }}" class="block mt-2">
                <h2 class="text-xl font-semibold text-gray-900 hover:text-indigo-600 transition-colors duration-200">
                  {{ $post->title }}
                </h2>
                <p class="mt-3 text-base text-gray-600 line-clamp-3">
                  {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 160) }}
                </p>
              </a>
            </div>
            
            {{-- <a href="{{ route('posts.show', $post) }}" class="block mt-2">
              <h2 class="text-xl font-semibold text-gray-900 hover:text-indigo-600 transition-colors duration-200">
                {{ $post->title }}
              </h2>
              <p class="mt-3 text-base text-gray-600 line-clamp-3">
                {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 160) }}
              </p>
            </a> --}}
            
            {{-- <div class="mt-4">
              <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                Read more →
              </a>
            </div> --}}
          </div>
        </article>
      @empty
        <div class="col-span-full text-center py-12">
          <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h3 class="mt-2 text-sm font-medium text-gray-900">No posts yet</h3>
          <p class="mt-1 text-sm text-gray-500">Check back later for new content.</p>
        </div>
      @endforelse
    </div>
  </div>
</x-layout>