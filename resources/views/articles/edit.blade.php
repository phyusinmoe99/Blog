@extends("layouts.app")
@section("content")
<div class="container" style="max-width: 800px">

    <form method="post">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$article->title}}">
        </div>
        <div class="mb-2">
            <label>Body</label>
            <textarea class="form-control" name="body">{{$article->body}}</textarea>
        </div>
        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach ( $categories as $category )
                <option value="{{$category->id}}" {{$article->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>   
        </div>
        <button class="btn btn-primary">Edit</button>
    </form>
</div>
    
@endsection

