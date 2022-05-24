@extends('layouts.app')
@section('container')
<h1>Edit "{{$books->bookName}}" book</h1>
{!! Form::open(['action' => ['App\Http\Controllers\BooksController@update',$books->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <h2> {{Form::label('bookName', 'Book Name')}}</h2>
        {{Form::text('bookName', $books->bookName, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        <h2> {{Form::label('bookAuthor', 'Book Author')}}</h2>
        {{Form::text('bookAuthor', $books->bookAuthor, ['class' => 'form-control', 'placeholder' => 'Book Author'])}}
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
        {{Form::textarea('bookDescription', $books->bookDescription, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Book Description'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
</div>
    <div class="form-group" id="edit">
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Edit!', ['class' =>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    {!!Form::open(['action' =>['App\Http\Controllers\BooksController@destroy', $books->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
         {{Form::hidden('_method', 'DELETE')}}
         {{Form::submit('Delete', ['class' => 'btn btn-danger', "id" => "edit"])}}
      {!! Form::close() !!} 

@endsection