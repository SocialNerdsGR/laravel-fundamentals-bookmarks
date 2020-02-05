<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    public function index()
    {
        $bookmakrs = Bookmark::all();
        return view('bookmarks.index')->with('bookmarks', $bookmakrs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:30|unique:bookmarks',
            'url' => 'required|url'
        ]);

        Bookmark::create($validatedData);
        return redirect('/')->withSuccess('Bookmark created!');
    }

    public function delete(Bookmark $bookmark)
    {
        $bookmark->delete();
        return redirect(route('home'));
    }
}
