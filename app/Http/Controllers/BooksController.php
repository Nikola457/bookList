<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\Book;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    public function index()
    {
        $id = Auth::id(); 
        if(Auth::check()){   
           $books  = Book::where('user_id', $id)->paginate(9);
           return view('books.index')->with('books', $books); 
       }
       else{
        $books  = Book::orderBy("bookName","desc")->paginate(9);
        return view('books.index')->with('books', $books); 
       
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bookName' => 'required',
            'bookDescription' => 'required',
            'bookReleaseDate' =>  'required',
            'bookCategory' => 'required',
            'bookAuthor' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            $fileNameExt =  $request->file('cover_image')->getClientOriginalName(); //gets the file name
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = "noimage.jpg";
        }
        $books = new Book;
        $books->bookName = $request->input('bookName');
        $books->bookReleaseDate = $request->input('bookReleaseDate');
        $books->bookAuthor = $request->input('bookAuthor');
        $books->bookCategory = $request->input('bookCategory');
        $books->bookDescription = $request->input('bookDescription');
        $books->cover_image = $fileNameToStore;
        $books->user_id = auth()->user()->id;
        $books->save();
        return   redirect('/books')->with('success', 'New book inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::find($id);
        return view('books.show')->with('books', $books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::find($id);
        return view('books.edit')->with('books', $books);

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'bookName' => 'required',
            'bookDescription' => 'required',
            'bookReleaseDate' =>  'required',
            'bookCategory' => 'required',
            'bookAuthor' => 'required',
            'cover_image' => 'image|nullable|max:1999|required'
        ]);
        if($request->hasFile('cover_image')){
            $fileNameExt =  $request->file('cover_image')->getClientOriginalName(); //gets the file name
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = "noimage.jpg";
        }
        $books = Book::find($id);
        $books->bookName = $request->input('bookName');
        $books->bookReleaseDate = $request->input('bookReleaseDate');
        $books->bookAuthor = $request->input('bookAuthor');
        $books->bookCategory = $request->input('bookCategory');
        $books->bookDescription = $request->input('bookDescription');
        $books->cover_image = $fileNameToStore;
        $books->user_id = auth()->user()->id;
        $books->save();
        return   redirect('/books')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();
        return   redirect('/books')->with('success', 'Book is removed!');

    }
}
