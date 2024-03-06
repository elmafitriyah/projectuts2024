<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author.index', [
            'authors' => Author::get(),
        ]);
    }

    public function create()
    {
        return view('author.create', [
            'authors' => Author::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $author = new Author();

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photo');
        }

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('success', 'Added Successfully');

        return redirect()->route('author.index');
    }

    public function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit', [
            'author' => $author
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $author = Author::find($id);

        $photo = $author->photo;

        if ($request->hasFile('photo')) {
            if (Storage::exists($author->photo)) {
                Storage::delete($author->photo);
            }
            $photo = $request->file('photo')->store('photo');
        }

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('success', 'Updated Successfully');

        return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        $author->delete();

        session()->flash('danger', 'Deleted Successfully');

        return redirect()->route('author.index');
    }
}