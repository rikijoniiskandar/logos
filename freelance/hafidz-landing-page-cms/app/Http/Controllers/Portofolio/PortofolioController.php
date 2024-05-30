<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portofolio\StorePortofolioRequest;
use App\Http\Requests\Portofolio\UpdatePortofolioRequest;
use App\Models\Portofolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();

        return view('portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        return view('portofolio.create');
    }

    public function store(StorePortofolioRequest $request)
    {
        $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($about = Portofolio::create($params)) {
            $about->image = $imagePath;
            $about->save();

            return redirect()->route('portofolios.index')->with('success', 'Added!');
        }
    }

    public function edit($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('portofolio.edit', compact('portofolio'));
    }

    public function update(UpdatePortofolioRequest $request, string $id): RedirectResponse
    {
        $portofolio = Portofolio::findOrFail($id);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            //delete old image
            Storage::delete('public/images/' . $portofolio->image);
            //update portofolio with new image
            $portofolio->update([
                'image'     => 'storage/images/' . $image->hashName(),
                'name'     => $request->name,
               
            ]);
        } else {
            $portofolio->update([
                'name'     => $request->name,
            ]);
        }

        return redirect()->route('portofolios.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);
        // Memflip nilai is_active
        $portofolio->is_active = !$portofolio->is_active;

        $portofolio->save();

        return redirect()->route('portofolios.index')->with('message', 'Status change complete');
    }

    /* Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        //lakukan delete pada data customer sesuai parameter id
        Portofolio::where('id', $id)->delete();

        return redirect()->route('portofolios.index')->with('success', 'Successfully delete data');
    }
}
