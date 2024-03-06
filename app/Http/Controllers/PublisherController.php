<?php


namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('publisher.index', [
            'publishers' => Publisher::get(),
        ]);
    }

    public function create()
    {
        return view('publisher.create', [
            'publishers' => Publisher::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'address' => ['required'],
        ]);

        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        session()->flash('success', 'Added Successfully');

        return redirect()->route('publisher.index');
    }

    public function edit($id)
    {
        $publisher = Publisher::find($id);

        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'address' => ['required'],
        ]);

        $publisher = Publisher::find($id);

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        
        $publisher->save();

        session()->flash('success', 'Updated Successfully');

        return redirect()->route('publisher.index');
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);

        $publisher->delete();

        session()->flash('danger', 'Deleted Successfully');

        return redirect()->route('publisher.index');
    }
}