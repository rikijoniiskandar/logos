<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\StoreAboutRequest;
use App\Http\Requests\About\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(StoreAboutRequest $request)
    {
        $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($about = About::create($params)) {
            $about->image = $imagePath;
            $about->save();

            return redirect()->route('abouts.index')->with('success', 'Added!');
        }
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request, string $id): RedirectResponse
    {
        $hero = About::findOrFail($id);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            //delete old image
            Storage::delete('public/images/' . $hero->image);
            //update about with new image
            $hero->update([
                'image'     => 'storage/images/' . $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {
            $hero->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        return redirect()->route('abouts.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $about = About::findOrFail($id);
        // Memflip nilai is_active
        $about->is_active = !$about->is_active;

        $about->save();

        return redirect()->route('abouts.index')->with('message', 'Status change complete');
    }

    /* Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        //lakukan delete pada data customer sesuai parameter id
        About::where('id', $id)->delete();

        return redirect()->route('abouts.index')->with('success', 'Successfully delete data');
    }
}
