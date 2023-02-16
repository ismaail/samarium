<div>
  @foreach ($posts as $post)
    <div class="my-4">
      <a href="{{ route('website-webpage-' . $post->permalink) }}">
        <h2>
          {{ $post->name }}
        </h2>
      </a>
      <div>
        <i class="far fa-clock mr-2"></i>
        {{ $post->created_at->toDateString() }}
        |
        {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'nepali')  }}
      </div>
      <hr />
    </div>
  @endforeach
</div>
