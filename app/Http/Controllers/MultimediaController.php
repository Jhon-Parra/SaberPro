<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galeria()
    {
        $multimedia = Multimedia::paginate();

        return view('layout.galeria', compact('multimedia'))
            ->with('i', (request()->input('page', 1) - 1) * $multimedia->perPage());
    }

    public function index()
    {
        $multimedia = Multimedia::paginate();

        return view('multimedia.index', compact('multimedia'))
            ->with('i', (request()->input('page', 1) - 1) * $multimedia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:image,video,file,audio',
            'file' => 'required|max:10000',
        ]);

        $multimedia = new Multimedia();
        $multimedia->name = $request->input('name');
        $multimedia->type = $request->input('type');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            // Verificar si el tipo de archivo corresponde con el campo "type"
            if (($multimedia->type == 'image' && in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) ||
                ($multimedia->type == 'video' && in_array($extension, ['mp4', 'mov', 'avi'])) ||
                
                //ojo, ios no soporta tipo de audio .mpeg... (Aun no se sabe si soporta .wav)...
                ($multimedia->type == 'audio' && in_array($extension, ['mp3', 'wav'])) ||
                
                
                ($multimedia->type == 'file' && in_array($extension, ['txt']))) {
                $fileName = time() . '.' . $extension;
                $file->move(public_path('uploads'), $fileName);
                $multimedia->url = asset('public/uploads/' . $fileName);
            } else {
                return redirect()->back()->withErrors(['file' => 'Invalid file type.']);
            }
        }

        $multimedia->save();

        return redirect()->route('multimedia.index')
            ->with('success', 'Multimedia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multimedia = Multimedia::find($id);

        return view('multimedia.show', compact('multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $multimedia = Multimedia::findOrFail($id);

        return view('multimedia.edit', compact('multimedia'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Multimedia $multimedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimedia $multimedia)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:image,video,file,audio',
            'file' => 'nullable|max:2048',
        ]);

        $multimedia->name = $request->input('name');
        $multimedia->type = $request->input('type');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            // Verificar si el tipo de archivo corresponde con el campo "type"
            if (($multimedia->type == 'image' && in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) ||
                ($multimedia->type == 'video' && in_array($extension, ['mp4', 'mov', 'avi','ogg'])) ||
                
                //ojo, ios no soporta tipo de audio .mpeg... (Aun no se sabe si soporta .wav)...
                ($multimedia->type == 'audio' && in_array($extension, ['mp3', 'wav'])) ||
                ($multimedia->type == 'file')) {
                $fileName = time() . '.' . $extension;
                $file->move(public_path('uploads'), $fileName);
                $multimedia->url = asset('uploads/' . $fileName);
            } else {
                return redirect()->back()->withErrors(['file' => 'Invalid file type.']);
            }
        }

        $multimedia->save();

        return redirect()->route('multimedia.index')
            ->with('success', 'Multimedia updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multimedia = Multimedia::find($id);

        if ($multimedia) {
            // Eliminar el archivo asociado si existe
            if (!empty($multimedia->url)) {
                $filePath = public_path(str_replace(asset(''), '', $multimedia->url));
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Eliminar el registro de multimedia
            $multimedia->delete();

            return redirect()->route('multimedia.index')
                ->with('success', 'Multimedia deleted successfully');
        }

        return redirect()->route('multimedia.index')
            ->with('error', 'Multimedia not found');
    }
}
