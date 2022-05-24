@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($books)>0)
                    <h1 id="written-author">{{ __('Books Added By You!') }}</h1><br><br><br>
                    <table>
                    @foreach($books as $book)
                    <tr><td><h2>Title: {{$book->bookName}}</h2></td>
                            <td><a href="books/{{$book->id}}/edit"><button class="btn btn-secondary" style="width:100%; height:45px;">Edit</button></a>  </td></tr>
                    @endforeach
                </table>

                    @else
                    <h1 id='written-author'>{{ __('You Dont Have Any Books Added :(') }}</h1>
                    <a href="books/create"><button class="btn btn-primary" >Add new Book</button></a>  
                    </tr>
                

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
