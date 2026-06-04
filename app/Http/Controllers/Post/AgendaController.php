<?php

namespace App\Http\Controllers\Post;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
           $search = $request->input('search');
     
           $agendas = Agenda::query()
           ->when($search, function ($query, $search) {
               $query->where('name', 'like', "%{$search}%")
                   ;
           })
           ->paginate(10)
           ->withQueryString(); // biar query search tetap ada saat ganti halaman

       return view('blog_post.agenda.viewAgenda', compact('agendas', 'search'));
    }

    public function create()
    {
        // Pass the user data to the view
        return view('blog_post.agenda.createAgenda');
    }

    public function store(Request $request)
    {
    //   dd($request->all());
        $validate = $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
            'event' => 'required|string',
            'location' => 'required|string', 
            'yt' => 'required|string',
            'register_link' => 'required|string',
            'contact' => 'required|string',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
          
        ]);

        // Buat slug otomatis
        $validate['slug'] = Str::slug($validate['title']);

       
        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('agenda-image', 'public');
        }

      Agenda::create($validate);

      return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat!');

    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);

        return view('blog_post.agenda.editAgenda', compact('agenda')); 
    }

    
    public function update(Request $request, $id)
    {
    $agenda = Agenda::findOrFail($id);

    $validated = $request->validate([
        'title' => 'nullable|string',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'description' => 'nullable',
        'event' => 'nullable|string',
        'location' => 'nullable|string', 
        'yt' => 'nullable|string',
        'register_link' => 'nullable|string',
        'contact' => 'nullable|string',
        'category' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Buat slug otomatis
        $validated['slug'] = Str::slug($validated['title']);
    if($request->file('image')){
        $validated['image'] = $request->file('image')->store('agenda-image', 'public');
    }
    
    $agenda->update($validated);

    return redirect()->route('agenda.index', $agenda->id)->with('success', 'Data Agenda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
    
        // Cek apakah gambar ada dan hapus dari storage
        if ($agenda->image && Storage::disk('public')->exists($agenda->image)) {
            Storage::disk('public')->delete($agenda->image);
        }
       
    
        $agenda->delete();
    
        return redirect()->back()->with('success', 'Data Agenda berhasil dihapus.');
    }
}
