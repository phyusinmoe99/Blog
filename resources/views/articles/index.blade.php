@extends("layouts.app")
@section("content")
<div class="container" style="max-width: 800px">
    {{ $articles->links()}}


    @if (session("info"))
        <div class="alert alert-info">{{session("info")}}</div>
    @endif
    @foreach ($articles as $article )
       <div class="card mb-2">
        <div class="card-body">
            <h2 class="h4 card-title">{{ $article->title}}</h2>
            <div class="mb-1">
                <b class="text-success">{{$article->user->name}}</b>
                <small class="text-muted">
                   Category:  {{$article->category->name ?? 'no category' }},
                   Posted:{{ $article->created_at->diffForHumans()}},
                   Updated:{{ $article->updated_at->diffForHumans()}},
                   Comments ({{count($article->comments)}})
                </small>
            </div>
            <div class="mb-2">
                {{ $article->body}}
            </div>
            <a href="{{url("/articles/detail/$article->id")}}">View Detail</a>
        </div>
       </div>
        
    @endforeach
</div>
    
@endsection