<?php

namespace App\Http\Controllers\Hero;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hero\StoreHeroRequest;
use App\Http\Requests\Hero\UpdateRequest;
use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('hero.index', ['heroes' => $heroes]);
    }

    /**
     * Show the form for creating a new hero.
     */
    public function create()
    {
        return view('hero.create');
    }

    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        return view('hero.edit', compact('hero'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($hero = Hero::create($params)) {
            $hero->image = $imagePath;
            $hero->save();

            return redirect()->route('hero.index')->with('success', 'Added!');
        }
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $hero = Hero::findOrFail($id);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

             //delete old image
             Storage::delete('public/images/'.$hero->image);
              //update hero with new image
            $hero->update([
                'image'     => 'storage/images/'.$image->hashName(),
                'title'     => $request->title,
                'subtitle'   => $request->subtitle,
            ]);
        } else {
            $hero->update([
                'title'     => $request->title,
                'subtitle'   => $request->subtitle,
            ]);
        }

        return redirect()->route('hero.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);
        // Memflip nilai is_active
        $hero->is_active = !$hero->is_active;

        $hero->save();

        return redirect()->route('hero.index')->with('message', 'Status change complete');
    }

    /* Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        //lakukan delete pada data customer sesuai parameter id
        Hero::where('id', $id)->delete();

        return redirect()->route('hero.index')->with('success', 'Successfully delete data');
    }
}
