<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
use Image;
use App\Http\Requests\BookRequest;

class BookController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $dis['books'] = $books;

        return view('admin.book.index', $dis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dis['categories'] = Category::all();
        
        return view('admin.book.create', $dis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = new Book();
        $image = $request->file('image');
        $data = $request->only([
            'name',
            'slug',
            'author',
            'number_of_page',
            'publish_date',
            'title',
            'description',
        ]);

        $data['total_rate'] = 0;
        $data['total_like'] = 0;
        $data['image'] = $this->uploadImage($image);

        try {
            $createBook = $book->create($data);
            $createBook->categories()->attach(($request['category_ids']));
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }

        return redirect()->route('book.index');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $dis['nodes'] = Category::all();
        $dis['checkedNodes'] = $book->categories()->allRelatedIds()->toArray();
        $dis['book'] = $book;

        return view('admin.book.edit', $dis);
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
        $book = Book::findOrFail($id);

        $input = $request->only([
            'name',
            'publish_date',
            'author',
            'number_of_page',
            'title',
            'description',
        ]);

        $image = $request->file('image');
        $input['image'] = $image ? $this->uploadImage($image) : $book->image;
        $input['slug'] = $request->slug ?: str_slug($request->name);
        $input['total_rate'] = 0;
        $input['total_like'] = 0;
        \DB::beginTransaction();

        try{
            $book->update($input);
            $book->categories()->sync(($request['category_ids']));
            \DB::commit();
        } catch(\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return back();
    }
}
