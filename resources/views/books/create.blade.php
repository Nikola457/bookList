@extends('layouts.app')
@section("container")
<h1>Insert new book</h1>
{!! Form::open(['action' => 'App\Http\Controllers\BooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <h2> {{Form::label('bookName', 'Book Name')}}</h2>
        {{Form::text('bookName', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        <h2> {{Form::label('bookAuthor', 'Book Author')}}</h2>
        {{Form::text('bookAuthor', '', ['class' => 'form-control', 'placeholder' => 'Book Author'])}}
    </div>
    <div class="form-group">
        <h2> {{Form::label('bookReleaseDate', 'Book Release Date')}}</h2>
        {{Form::date('bookReleaseDate', \Carbon\Carbon::now())}}
    </div>
    <div class="form-group">
        <h2> {{Form::label('bookCategory', 'Book Category')}}</h2>
        {{Form::select('bookCategory', array('Action' => 'Action',
        'Comedy' => 'Comedy',
        'Drama' => 'Drama',
        'Fantasy'=>'Fantasy',
        'Horror'=>'Horror',
        'Mystery'=>'Mystery',
        'Romance'=>'Romance',
        'Thriller'=>'Thriller',
        'Western'=>'Western'))}}
    </div>
    <div class="form-group">
        <h2> {{Form::label('bookDescription', 'Book Description')}}</h2>
        {{Form::textarea('bookDescription', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Book Description'])}}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
    <div class="form-group">
        {{Form::submit('Add new Book!', ['class' =>'btn btn-primary'])}}
    </div>
{!! Form::close() !!}
@endsection