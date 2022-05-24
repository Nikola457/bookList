@extends('layouts.app')
@section('container')
    <div class="card" id="card-show" style=" padding:15px 15px 0px 15px">
        <a href="/books" class="btn btn-secondary" style="width:7%;">Go Back</a>
        <h1 class="book-name-show" style="font-size:50px;">{{$books->bookName}}</h1>
        
        <small style="color:#005e9e"> Written by: {{$books->bookAuthor}}</small>
        <small class="book-genre" style="color:#005e9e">Genre: {{$books->bookCategory}}</small>
        <img src="../storage/cover_images/{{$books->cover_image}}" width="30%;" class="round float-left"><br>
        <p class="book-description" style="text-align:justify;">{{$books->bookDescription}}<br>
         <a href="/books/{{$books->id}}/edit" id="edit" class="btn btn-success">Edit</a><br>
          
       <br> <small id="written">Article Written On: {{$books->created_at}} by  {{$books->user->name}}</small>   
      
   </div>
 
@endsection