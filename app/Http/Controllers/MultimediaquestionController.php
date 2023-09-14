<?php
namespace App\Http\Controllers;

use App\Models\Multimediaquestion;
use App\Models\Question;
use App\Models\Multimedia;
use Illuminate\Http\Request;

class MultimediaquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multimediaquestions = Multimediaquestion::paginate();

        return view('multimediaquestion.index', compact('multimediaquestions'))
            ->with('i', (request()->input('page', 1) - 1) * $multimediaquestions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $multimediaquestion = new Multimediaquestion();
        $questions = Question::pluck('statement', 'id');
        $multimedia = Multimedia::pluck('name', 'id');

        return view('multimediaquestion.create', compact('multimediaquestion', 'questions', 'multimedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'multimedia_id' => 'required',
        ]);

        $multimediaquestion = Multimediaquestion::create($validatedData);

        return redirect()->route('multimediaquestions.index')
            ->with('success', 'Multimediaquestion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multimediaquestion = Multimediaquestion::find($id);

        return view('multimediaquestion.show', compact('multimediaquestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $multimediaquestion = Multimediaquestion::find($id);
        $questions = Question::pluck('statement', 'id');
        $multimedia = Multimedia::pluck('name', 'id');

        return view('multimediaquestion.edit', compact('multimediaquestion', 'questions', 'multimedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Multimediaquestion $multimediaquestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimediaquestion $multimediaquestion)
    {
        $validatedData = $request->validate([
            'question_id' => 'required',
            'multimedia_id' => 'required',
        ]);

        $multimediaquestion->update($validatedData);

        return redirect()->route('multimediaquestions.index')
            ->with('success', 'Multimediaquestion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multimediaquestion = Multimediaquestion::find($id);
        $multimediaquestion->delete();

        return redirect()->route('multimediaquestions.index')
            ->with('success', 'Multimediaquestion deleted successfully');
    }
}
