<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\user;
use App\Models\Question;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redirect;


/**
 * Class AnswerController
 * @package App\Http\Controllers
 */
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        $search = $request->query('search');
        $query = Answer::query();

        if ($search) {
            $query->where('data', 'like', '%' . $search . '%')
                ->orWhere('result', 'like', '%' . $search . '%')
                ->orWhere('percentage', 'like', '%' . $search . '%'); // Corrected the column name
            // Add more conditions as needed for your search
        }

        $answers = $query->get();
        $pdf = PDF::loadView('answer.pdf', compact('answers')); // Corrected the variable name
        return $pdf->stream();
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Answer::query();

        if ($search) {
            $query->where('data', 'like', '%' . $search . '%')
                ->orWhere('result', 'like', '%' . $search . '%')
                ->orWhere('percentage', 'like', '%' . $search . '%'); // Corrected the column name
            // Add more conditions as needed for your search
        }

        $answers = $query->paginate();

        return view('answer.index', compact('answers'))
            ->with('i', ($answers->currentPage() - 1) * $answers->perPage()); // Corrected pagination calculation
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $questionId = $request->input('question_id'); // Obtener el ID de la pregunta desde la solicitud

        $question = Question::find($questionId);
        $answer = new Answer();

        $questionOptions = Question::pluck('statement', 'id'); // Obtener las opciones de pregunta
        $userOptions = User::pluck('name', 'id'); // Obtener las opciones de usuario

        if ($questionId === null) {
            return view('answer.create1', compact('questionOptions', 'userOptions')); // Pasar $questionOptions y $userOptions a la vista form1
        }

        return view('answer.create', compact('question', 'answer', 'questionOptions', 'userOptions'));
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
            'data' => 'required|array',
            'data.*' => 'required',
            'percentage' => 'required|array',
            'percentage.*' => 'required|numeric|between:0,100', // Changed to "numeric"
            'result' => 'required|array',
            'result.*' => 'required|in:0,1',
            'question_id' => 'nullable',
            'imageUrl.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'imageUrl' => 'array',
        ]);

        $data = $request->all();

        $imageUrlData = []; // Initialize an array to store image URLs

        if ($request->hasFile('imageUrl')) {
            foreach ($request->file('imageUrl') as $index => $imageFile) {
                if ($imageFile) {
                    $filename = time() . '-' . $index . '.' . $imageFile->getClientOriginalExtension();
                    $imageFile->move(public_path('images/answersimg'), $filename);
                    $imageUrlData[$index] = $filename;
                }
            }
        }

        $answersData = [];
        $dataCount = count($data['data']);
        for ($i = 0; $i < $dataCount; $i++) {
            $answersData[] = [
                'data' => $data['data'][$i],
                'percentage' => $data['percentage'][$i],
                'result' => $data['result'][$i],
                'question_id' => $data['question_id'],
                'imageUrl' => isset($imageUrlData[$i]) ? $imageUrlData[$i] : null, // Use the stored image URL if available
            ];
        }

        Answer::insert($answersData);
        $questionId = $data['question_id'];

        return redirect()->route('answers.index', $questionId)
            ->with('success', 'Question and answers created successfully');
    }







    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = Answer::with(['question', 'user'])->findOrFail($id);

        return view('answer.show', compact('answer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $questionOptions = Question::pluck('statement', 'id');
        $userOptions = User::pluck('name', 'id');
        return view('answer.edit', compact('answer', 'questionOptions', 'userOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $validatedData = $request->validate([
            'data' => 'required',
            'percentage' => 'between:0,100',
            'result' => 'required',
            'question_id' => 'required',
            'user_id' => 'nullable',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('imageUrl')) {
            // Procesar y actualizar la imagen si se proporciona una nueva
            $imageFile = $request->file('imageUrl');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images/answersimg'), $filename);
            $validatedData['imageUrl'] = $filename;
        }

        $answer->update($validatedData);

        return redirect()->route('answers.index')
            ->with('success', 'Answer updated successfully');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $answer = Answer::find($id)->delete();

        return redirect()->route('answers.index')
            ->with('success', 'Answer deleted successfully');
    }
}
