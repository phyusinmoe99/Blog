@extends("layouts.app")
@section("content")
<div class="container" style="max-width: 800px">

    @if ($errors->any())
       <div class="alert alert-warning">
           @foreach ($errors->all() as $err )
            {{ $err }}
           @endforeach
        </div>      
    @endif
    <form method="post">
        @csrf
        <input type="hidden" name="user_id"
         value="{{ auth()->user()->id }}">
        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-2">
            <label>Body</label>
            <textarea class="form-control" name="body"></textarea>
        </div>
        <div class="mb-2"> 
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach ( $categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>   
        </div>
        <button class="btn btn-primary">Add Article</button>

    </form>
</div>
    
@endsection
