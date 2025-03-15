@extends('layouts.app')
@section('content')
    <style>
        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }
    </style>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ $post->logo ? asset($post->logo) : asset('assets/img/post-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @if (session('success'))
                <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subTitle }}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $post->user->first_name ?? 'Unknown' }}</a>
                            on {{ $post->created_at->format('F j, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{ $post->body }}</p>
                    <h2 class="section-heading">{{ $post->subTitle }}</h2>
                    <p>{{ $post->{"second_body"} }}</p>

                    @if($post->logo)
                        <a href="#!"><img class="img-fluid" src="{{ asset($post->logo) }}" alt="Post image" /></a>
                    @endif
                    {{-- @if ($post->logo)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $post->logo) }}" alt="Blog image" class="img-fluid">
                    </div>
                @endif --}}

                    {{-- <p>Logo URL: {{ $post->logo }}</p> --}}

                    <span class="caption text-muted">{{ $post->title }}</span>
                    <!-- Comments Section -->

                    <h2 class="section-heading"> Comments</h2>

                    @if($post->comments && $post->comments->count())
                        @foreach($post->comments as $comment)
                            <div class="card custom-card mb-3 bg-light rounded shadow-sm" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong class="fs-5">{{ $comment->user->first_name ?? 'Anonymous' }}</strong>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="card-text text-secondary">{{ $comment->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No comments yet. Be the first to comment!</p>
                    @endif

                    <!-- Comment Form -->
                    @auth
                        <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <textarea name="body" rows="3" class="form-control" placeholder="Enter your comment here"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
                    @endauth
                </div>
            </div>
        </div>
        </div>
    </article>
@endsection
