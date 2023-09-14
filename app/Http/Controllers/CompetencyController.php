<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Question;
use App\Models\Competency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
/**
 * Class CompetencyController
 * @package App\Http\Controllers
 */
class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencies = Competency::with('faculty')->paginate();

        return view('competency.index', compact('competencies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competency = new Competency();
        $faculties = Faculty::all();

        return view('competency.create', compact('competency','faculties'));
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
             'description' => 'required',
         ]);
         $competency = Competency::create([
             'name' => $request->input('name'),
             'description' => $request->input('description'),
         ]);

         return redirect()->route('competencies.edit', $competency)
         ->with('success', 'Competency created successfully. Do you want to associate a faculty?');
     }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competency = Competency::find($id);

        return view('competency.show', compact('competency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competency = Competency::find($id);

        $faculties = Faculty::all();

        return view('competency.edit', compact('competency', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Competency $competency
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, Competency $competency)
     {
         $request->validate([
             'name' => 'required',
             'description' => 'required',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

         ]);

         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '.' . $image->extension();
             $image->move(public_path('imgCompetency'), $imageName);
             $competency->imageUrl = $imageName;
         }

         if ($request->hasFile('background_image')) {
             $backgroundImage = $request->file('background_image');
             $backgroundImageName = time() . '_background.' . $backgroundImage->extension();
             $backgroundImage->move(public_path('imgCompetency'), $backgroundImageName);
             $competency->backgroundImageUrl = $backgroundImageName;
         }

         $competency->name = $request->input('name');
         $competency->description = $request->input('description');
         $competency->faculty_id = $request->input('faculty_id');
         $competency->save();

         return redirect()->route('competencies.index')
             ->with('success', 'Competency updated successfully.');
     }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $competency = Competency::find($id)->delete();

        return redirect()->route('competencies.index')
            ->with('success', 'Competency deleted successfully');
    }


        // Agregar pregunta a una competencia
    public function addQuestion(Request $request, Competency $competency)
    {
        $request->validate([
            'content' => 'required', // Asegúrate de tener las reglas de validación correctas para tus preguntas
        ]);

        $question = new Question([
            'content' => $request->input('content'),
        ]);

        $competency->questions()->save($question);

        return redirect()->route('competencies.edit1', $competency)
            ->with('success', 'Pregunta agregada a la competencia correctamente.');
    }

    // Eliminar pregunta de una competencia
    public function removeQuestion(Competency $competency, Question $question)
    {
        $question->delete();

        return redirect()->route('competencies.edit1', $competency)
            ->with('success', 'Pregunta eliminada de la competencia correctamente.');
    }

}
