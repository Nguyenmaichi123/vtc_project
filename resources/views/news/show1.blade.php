@vite('resources/scss/news.scss')
@extends('layouts.new')

@section('content')

    <div class="news-item mb-4">
        <a href="{{ route('news.show1', ['slug' => $new->slug]) }}">
            <h1 class="text-dark fw-bold ">{{ $new->title }}</h1>
        </a>

        <br>
        <p class="text-muted fst-italic">Ngày đăng: {{ $new->created_at->format('d/m/Y') }}</p>

        <img src="{{ asset('uploads/news/' . $new->image) }}" alt="{{ $new->title }}" class="img-fluid mb-3">

        <!-- <p>{!! $new->content !!}</p> -->
    <!-- </div> -->
    <div class="content">
        <p>{!! $new->detail !!}</p>
       
    </div>
</div>
@endsection