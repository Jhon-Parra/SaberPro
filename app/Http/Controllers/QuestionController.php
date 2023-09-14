<?php
namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Module;
use App\Models\Competency;
use App\Models\Author;

use App\Models\Question;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class QuestionController extends Controller
{
    public function pdf(Request $request)
{
    $search = $request->query('search');
    $query = Question::query();

    if ($search) {
        $query->where('statement', 'like', '%' . $search . '%')
            ->orWhere('statementtwo', 'like', '%' . $search . '%'); // Cambia 'statementtwo' al nombre de la columna real
    }

    $questions = $query->get();
    $pdf = PDF::loadView('question.pdf', compact('questions')); // Cambia 'question.pdf' al nombre de tu vista PDF
    return $pdf->stream();
}

public function index(Request $request)
{
    $search = $request->query('search');
    $query = Question::query();

    if ($search) {
        $query->where('statement', 'like', '%' . $search . '%')
            ->orWhere('statementtwo', 'like', '%' . $search . '%'); // Cambia 'statementtwo' al nombre de la columna real
    }

    $questions = $query->paginate();

    return view('question.index', compact('questions'))
        ->with('i', ($questions->currentPage() - 1) * $questions->perPage()); // Calcula correctamente la paginación
}


    public function create()
    {
        $question = new Question();
        $levelOptions = Level::pluck('name', 'id');
        $moduleOptions = Module::pluck('name', 'id')->prepend('None', '');
        $competencyOptions = Competency::pluck('name', 'id');
        $authorOptions = Author::pluck('name', 'id');




        return view('question.create', compact('question', 'levelOptions', 'moduleOptions', 'competencyOptions', 'authorOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'statement' => 'nullable',
            'statementtwo' => 'nullable',
            'level_id' => 'required',
            'competency_id' => 'required',
            'type' => 'required',
            'author_id' => 'nullable',
            'points' => 'required',
            'module_id' => 'nullable',
            'typefile' => 'nullable|in:image,video,file,audio',
            'file' => 'nullable|max:10000',

        ]);
        $question = new Question();
        $question->fill($validatedData);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            // Verificar si el tipo de archivo corresponde con el campo "typefile"
            if (($question->typefile == 'image' && in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) ||
                ($question->typefile == 'audio' && in_array($extension, ['mp3', 'wav']))) {

                $fileName = time() . '.' . $extension;

                // Mover el archivo a la ubicación deseada
                $file->move(public_path('images/question'), $fileName);

                // Asignar solo el nombre del archivo al campo 'url'
                $question->url = $fileName;

            } else {
                return redirect()->back()->withErrors(['file' => 'Invalid file type.']);
            }
        }


        $question->save();

        if ($question->type === 'Selección Múltiple') {
            return redirect()->route('answers.create', ['question_id' => $question->id])
                ->withErrors(['type' => 'Please create answers for multiple-choice question.']);
        }

        return redirect()->route('questions.index')->with('success', 'Question created successfully');
    }





    public function show($id)
    {
        $question = Question::with('answers')->find($id);

        if (!$question) {

        }

        return view('question.show', compact('question'));
    }



    public function showQuestion($questionId)
    {
        $question = Question::findOrFail($questionId);
        $relatedAnswers = $question->answers; // Utiliza el nombre del método de relación

        return view('question.showQuestion', [
            'question' => $question,
            'relatedAnswers' => $relatedAnswers,
        ]);
    }



    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $levelOptions = Level::pluck('name', 'id');
        $moduleOptions = Module::pluck('name', 'id')->prepend('None', '');
        $competencyOptions = Competency::pluck('name', 'id');
        $authorOptions = Author::pluck('name', 'id');

        return view('question.edit', compact('question', 'levelOptions', 'moduleOptions', 'competencyOptions', 'authorOptions'));
    }


    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'statement' => 'nullable',
            'statementtwo' => 'nullable',
            'level_id' => 'nullable',
            'module_id' => 'nullable',
            'competency_id' => 'nullable',
            'author_id' => 'nullable',
            'type' => 'nullable',
            'points' => 'nullable',
        ]);

        $question->fill($validatedData); // Llenar los datos actualizados en el modelo

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            // Verificar si el tipo de archivo corresponde con el campo "typefile"
            if (($question->typefile == 'image' && in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) ||
                ($question->typefile == 'audio' && in_array($extension, ['mp3', 'wav']))) {

                $fileName = time() . '.' . $extension;

                // Mover el archivo a la ubicación deseada
                $file->move(public_path('images/question'), $fileName);

                // Asignar solo el nombre del archivo al campo 'url'
                $question->url = $fileName;

            } else {
                return redirect()->back()->withErrors(['file' => 'Invalid file type.']);
            }
        }

        $question->save();

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
    }





    public function destroy($id)
    {
        Question::find($id)->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }
}

