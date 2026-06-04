<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Models\Faq_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
           $search = $request->input('search');
     
           $categories = Category::query()
           ->when($search, function ($query, $search) {
               $query->where('name', 'like', "%{$search}%")
                   ;
           })
           ->paginate(10)
           ->withQueryString(); // biar query search tetap ada saat ganti halaman

       return view('blog_post.category.viewCategory', compact('categories', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('blog_post.category.createCategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('category-image', 'public');
        } else {
            $validated['image'] = 'default-image.jpg'; // kasih nama file default yang ada di storage/public
        }

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category berhasil dibuat!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id); 

        return view('blog_post.category.editCategory', compact('category')); 
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('category-image', 'public');
        }

        $category->update($validated);

        return redirect()->route('category.index', $category->id)->with('success', 'Category berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
    
        // Cek apakah gambar ada dan hapus dari storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
    
        $category->delete();
    
        return redirect()->back()->with('success', 'Category berhasil dihapus.');
    }

}
