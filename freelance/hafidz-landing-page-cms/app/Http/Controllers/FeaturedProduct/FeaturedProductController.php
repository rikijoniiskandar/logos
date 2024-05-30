<?php

namespace App\Http\Controllers\FeaturedProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeaturedProduct\EditFeaturedProductRequest;
use App\Http\Requests\FeaturedProduct\StoreFeaturedProductRequest;
use App\Http\Requests\FeaturedProduct\UpdateFeaturedProductRequest;
use App\Models\FeaturedProduct;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    public function index()
    {
        $featured_products = FeaturedProduct::all();

        return view('featured-product.index', compact('featured_products'));
    }


    public function create()
    {
        return view('featured-product.create');
    }

    public function store(StoreFeaturedProductRequest $request)
    {
        $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $content = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ];

        $contentJson = json_encode([$content]);

        $featured_product = new FeaturedProduct([
            'header' => $request->header,
            'subheader' => $request->subheader,
            'content' => $contentJson, // Assign the content array
        ]);

        $featured_product->save();

        return redirect()->route('featured-products.index')->with('success', 'Added!');
    }

    public function editContent($id)
    {
        $featured_product = FeaturedProduct::findOrFail($id);
        $content = json_decode($featured_product->content);

        return view('featured-product.add-content', compact('featured_product', 'content'));
    }

    public function edit($id)
    {
        $featured_product = FeaturedProduct::findOrFail($id);

        return view('featured-product.edit', compact('featured_product'));
    }

    public function updateContent(EditFeaturedProductRequest $request, $id)
    {
        $featured_product = FeaturedProduct::findOrFail($id);

        $featured_product->update([
            'header' => $request->header,
            'subheader' => $request->subheader,
        ]);  

        return redirect()->route('featured-products.index')->with('success', 'Content Updated!');
    }



    public function addContent(UpdateFeaturedProductRequest $request, $id)
    {

        $featured_product = FeaturedProduct::findOrFail($id);
        $content = json_decode($featured_product->content, true);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $new_content = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ];

        $content[] = $new_content;
        $featured_product->content = json_encode($content);

        $featured_product->update([
            'content' => json_encode($content)
        ]);  

        return redirect()->route('featured-products.index')->with('success', 'Content Updated!');
    }

    public function updateStatus(Request $request, $id)
    {
        $featured_product = FeaturedProduct::findOrFail($id);
        // Memflip nilai is_active
        $featured_product->is_active = !$featured_product->is_active;

        $featured_product->save();

        return redirect()->route('featured-products.index')->with('message', 'Status change complete');
    }


    /* Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        //lakukan delete pada data customer sesuai parameter id
        FeaturedProduct::where('id', $id)->delete();

        return redirect()->route('featured-products.index')->with('success', 'Successfully delete data');
    }
}
