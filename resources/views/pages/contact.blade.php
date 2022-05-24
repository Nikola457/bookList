@extends('layouts.app')
    @section('container')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1 id="written-author" >{{ __('Your Account Informations') }}</h1><br><br><br>
        <table>
        <tr><td><h2 style="padding:5px 0px 0px 5px;">Name: <?php 
            $name = $users->name;
            $arr = explode(' ',trim($name));
            echo $arr[0];?></h2></td></tr>
             <tr><td><h2 style="padding:5px 0px 0px 5px;">Surname: <?php 
                echo $arr[1];?></h2></td></tr>
        </tr><td><h2 style="padding:5px 0px 0px 5px;">Email: {{$users->email}}</h2></td></tr>
         </tr><td><h2 style="padding:5px 0px 0px 5px;">Account Created At: {{$users->created_at}}</h2></td></tr>
        </tr><td><h2 style="padding:5px 0px 0px 5px;">Number Of Books That You've Read: <?php echo $number = count($users->books);  ?></h2></td></tr>
   
    </table>


    </div>
    @endsection
