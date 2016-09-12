<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        //fetch all items from the database
        $items = Item::All();
        return view('item.index', compact($items));
    }

    public function show($id)
    {

        $item = Item::find($id);

        if (is_null($item)) {
            abort(404);
        }
        return view('item.show', compact('item'));
    }

    
    public function create()
    {
        return view('item.create');
    }

    public function store(Requests\CreateItem $request)
    {


        $item = new Item($request->all());

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $file->move(public_path() . '/uploads', $file->getClientOriginalName());

            echo "File Uploaded";
//
//        form does not submit}


        }


    }

   


}