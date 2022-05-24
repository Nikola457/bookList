@extends('layouts.app')
@section('content')
<h1 class="heading-index">Books </h1>
    <div class="card-div">    
    @if(count($books) > 0)
    @foreach($books as $book)
            <div class="card-book">
                 <h5 class="book-name" style="margin-bottom:0px;">{{$book->bookName}}</h5><br>
                 <small id="written-author"> Written by: {{$book->bookAuthor}}</small>
                 <img src="storage/cover_images/{{$book->cover_image}}"  class="rounded float-left" style="width:95%; margin-top:10px;" alt="">
                 <small class="book-genre">Genre: {{$book->bookCategory}}</small>
                 <p class="book-description"><?php
                 $description = $book->bookDescription;
                 if(strlen($description)>200){
                     $stringCut = substr($book->bookDescription, 0, 200);
                     $endPoint = strrpos($stringCut, '');
                     $description = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $description .= '...';
                 }
                 echo $description?></p>
                  <a href="books/{{$book->id}}" class="btn btn-primary">See Details</a>
                  @if(!Auth::guest())
                  @if(Auth::user()->id == $book->user_id)
                  <a href="/books/{{$book->id}}/edit" class="btn btn-success">Edit</a>
                    @endif
                  @endif
                <br> <small id="written">Article Written On: {{$book->created_at}} by  {{$book->user->name}}</small>    
            </div>
        @endforeach
        
    </div>
    @else
    <h2>No Books Founds</h2>
    @endif
    <div class="pagination">{{$books->links()}}</div>
@endsection