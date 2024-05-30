<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(StoreClientRequest $request)
    {
        $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($client = Client::create($params)) {
            $client->image = $imagePath;
            $client->save();

            return redirect()->route('client.index')->with('success', 'Added!');
        }
    }

     /* Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        //lakukan delete pada data customer sesuai parameter id
        Client::where('id', $id)->delete();

        return redirect()->route('client.index')->with('success', 'Successfully delete data');
    }

}
