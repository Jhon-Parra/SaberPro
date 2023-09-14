<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Competency;
use App\Models\Question;
use App\Models\Level;
use App\Models\progress;
use App\Models\Answer;
use App\Models\Author;
use App\Models\Multimedia;
use App\Models\user_question_statu;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    
    
    
public function get_ranking()
{
    $user = Auth::user();
    
}



public function reset_progress(){
    $user = Auth::user();
    $progress = new Progress();
    $user_question_statu = new user_question_statu();
    $answer = new Answer();
    
    $delete_points= ['points'=>null];
    $user::where('id',$user->id)->update($delete_points);
    $answer::where('user_id',$user->id)->delete();
    
    $progress::where('user_id',$user->id)->delete();
    $user_question_statu::where('user_id',$user->id)->delete();
    
     return response()->json(['message'=>'El progreso se reinició, dejando al usuario desde el inicio'], 200);
}
    
public function get_progress()
{
    $user = Auth::user();
    $totalLevels = Level::count();
    $progresses = Progress::where('user_id', $user->id)->get();

    // Arreglo para almacenar las competencias y sus porcentajes de progreso
    $competenciesProgress = [];

    foreach ($progresses as $progress) {
        $competencyId = $progress->competencie_id;

        // Verificar si la competencia ya existe en el arreglo
        if (!isset($competenciesProgress[$competencyId])) {
            // Si no existe, crear la entrada con el porcentaje inicial en 0
            $competenciesProgress[$competencyId] = [
                'id' => $competencyId,
                'name' => '',
                'description' => '',
                'backgroundImageUrl' => '',
                'imageUrl' => '',
                'faculty_id' => null,
                'created_at' => null,
                'updated_at' => null,
                'percentage' => 0,
            ];
        }

        // Incrementar el progreso de la competencia
        $competenciesProgress[$competencyId]['percentage']++;
    }

    // Obtener y agregar los datos de cada competencia
    foreach ($competenciesProgress as $key => $competencyProgress) {
        $competency = Competency::find($key);
        if ($competency) {
            $competenciesProgress[$key]['name'] = $competency->name;
            $competenciesProgress[$key]['description'] = $competency->description;
            $competenciesProgress[$key]['backgroundImageUrl'] = $competency->backgroundImageUrl;
            $competenciesProgress[$key]['imageUrl'] = $competency->imageUrl;
            $competenciesProgress[$key]['faculty_id'] = $competency->faculty_id;
            $competenciesProgress[$key]['created_at'] = $competency->created_at;
            $competenciesProgress[$key]['updated_at'] = $competency->updated_at;
        }
    }

    // Calcular y agregar los porcentajes finales
    foreach ($competenciesProgress as $key => $competencyProgress) {
        $percentage = ($competencyProgress['percentage'] / $totalLevels) * 100;
        $competenciesProgress[$key]['percentage'] = $percentage;
    }

    // Convertir el arreglo en una lista
    $competenciesProgressList = array_values($competenciesProgress);

    // $competenciesProgressList ahora contiene las competencias con sus porcentajes de progreso
    return $competenciesProgressList;
}


    /*
    This function will save the action when the user answer a question

    if the question result is true then save the question as answered to statitics user.

    if the question result is false then save the question as answered false to statitics user.

    now, we should understand, if the question was answered already but it was false, then save the question as update in true. 

    now, we have to save the points, as update to the user points, because, the plus points is necesary to up level in the application life.
    */
public function complete_question(Request $request)
{
    if (Auth::check()) { 
        $uplevel = false;
        $user = Auth::user();
        $status = new user_question_statu();

        $existAnswered = user_question_statu::where('user_id', $user->id)
            ->where('question_id', $request->question_id)
            ->first();

        $points = Question::where('id', $request->question_id)
            ->value('points'); 

        $competencie = Question::where('id', $request->question_id)
            ->value('competency_id'); 
        if (!$existAnswered) {
            $status->user_id = $user->id;
            $status->question_id = $request->question_id;
            $status->is_answered = $request->is_answered;
            $status->save();
            if($request->is_answered)
            {
               $this->plusPoints($points, $request->answer_id); 
            }
            
            $uplevel = $this->upProgress($competencie);
        } else {
            if (!$existAnswered->is_answered) {
                $existAnswered->is_answered = $request->is_answered;
                $existAnswered->save();
                if($request->is_answered)
                {
                    $this->plusPoints($points, $request->answer_id); 
                }
                $uplevel = $this->upProgress($competencie);
            }
        }
        if($uplevel == true){
           return response()->json(['upprogress'=>true], 200);
        }else{
            return response()->json(['upprogress'=>false], 200);
        }
        
    } else {
       
        return response()->json(['error' => 'Usuario no autenticado'], 401);
    }
}

public function send_email_verify()
{
    $user = Auth::user();
    $emailController = new EmailController();

    
    if ($emailController->welcome_email($user)) {
        return response()->json(['message' => 'El correo de verificación se envió correctamente, Ahora debes abrir tu bandeja de entrada y verificarlo; Si no encuentras el correo, es probable que esté en no deseados.']);
    } else {
        return response()->json(['message' => 'Hubo un error al enviar el correo de verificación.'], 500);
    }
}
//In this function we will calculate the points that user can win...
public function plusPoints($point, $answer_id)
{
    $user = Auth::user();
    $answer = Answer::where('id', $answer_id)->first();
    
    
    $percentage = $answer->percentage ?? 0;
    
    $earnedPoints = $point * ($percentage / 100);
    $totalPoints = $earnedPoints;
    
    $points = $user->points;
    $plusPoints = $points + $totalPoints;
    if($percentage<=0){
       $plusPoints = $points + $point; 
    }
    
    $user->points = $plusPoints;
    $user->save();
    $this->upLevel($plusPoints);
    return $plusPoints; 
}

public function write_answer(Request $request)
{
    $user = Auth::user();
    $answer = new Answer();
    $answer_exist = Answer::where('question_id', $request->question_id)
    ->where('user_id', $user->id)
    ->first();
    if($answer_exist)
    {
        return response()->json(['message'=>'Está pregunta ya fue respondida por el usuario'], 401);
    }else
    {
        $answer->data = $request->data;
        $answer->question_id = $request->question_id;
        $answer->user_id = $user->id;
        $answer->result = 0;
        $answer->save();
        return response()->json(['message'=>'La respuesta se guardó exitosamente.'], 200);
    }
    
    
}

public function validate_answer_exist_writer(Request $request)
{
    $user = Auth::user();
    $answer_exist = Answer::where('question_id', $request->question_id)
    ->where('user_id', $user->id)
    ->first();
    if(!$answer_exist)
    {
        return response()->json(['message'=>'hubo un problema al obtener los datos'], 401);
    }else{
        return response()->json(['message'=>$answer_exist->data], 200);
    }
}

public function upProgress($competency_id)
{
    $user = Auth::user();
    
    $level = progress::where('user_id', $user->id)
        ->where('competencie_id', $competency_id)
        ->first();
    
    $actualLevel = $level ? $level->level_id : Level::first()->id;
    
    $questions = Question::where('level_id', $actualLevel)
        ->where('competency_id', $competency_id)
        ->get();

    $allQuestionsAnswered = true;

    foreach ($questions as $question) {
        $question_id = $question->id;
        $exist = user_question_statu::where('user_id', $user->id)
            ->where('question_id', $question_id)
            ->where('is_answered', true)
            ->first();

        if (!$exist) {
            $allQuestionsAnswered = false;
            break;
        }
    }

    if ($allQuestionsAnswered) {
        $uplevel = false;
        $nextLevel = Level::where('id', '>', $actualLevel)
            ->orderBy('minpoints', 'asc')
            ->first();
        if($nextLevel)
        {
            $existProgress = progress::where('competencie_id',$competency_id)
            ->where('user_id', $user->id)
            ->first();
            if(!$existProgress)
            {
                $progress = new progress();
                $progress->user_id = $user->id;
                $progress->competencie_id = $competency_id;
                $progress->level_id = $nextLevel->id;
                $progress->save();
                $uplevel = true;
            }else{
                $nextLevel = Level::where('id', '>', $existProgress->level_id)
                ->orderBy('minpoints', 'asc')
                ->first();
                $existProgress->level_id = $nextLevel->id;
                $existProgress->save();
                
            }
            
        }else{
            return response()->json("No hay nivel");
        }
        
        return $uplevel;
    }
}


public function upLevel($points)
{
    $user = Auth::user();
    $currentLevelId = $user->level;

    $nextLevel = Level::where('id', '>', $currentLevelId)
        ->where('minpoints', '>', $points)
        ->orderBy('minpoints', 'asc')
        ->first();

    if ($nextLevel) {
        $user->level = $nextLevel->id;
        $user->save();
    }
}



    public function competencies()
    {
        $user = Auth::user();
        $competencies = Competency::where('faculty_id',null)
        ->orWhere('faculty_id', $user->faculty)
        ->get();
        return response()->json($competencies);
    }

    


    public function get_level_user_competencie($id)
    {
        $user=Auth::user();
        $level = progress::where('user_id', $user->id)
            ->where('competencie_id', $id)
            ->first();
        $final_level = 1;
        if($level)
        {
            $final_level = Level::where('id',$level->level_id)->first()->number;
        }


        return response()->json($final_level);

        

    }

    public function points()
    {
        $user = Auth::user();
        $points = $user->points;
        return response()->json($points);
    }

    public function get_competencie_level($id)
    {
        $user=Auth::user();
        $level = progress::where('user_id', $user->id)
            ->where('competencie_id', $id)
            ->first();
        $final_level = 1;
        if($level)
        {
            $final_level = Level::where('id',$level->level_id)->first()->number;
        }
        return response()->json($final_level);

        

    }



public function competencies_statitics()
{
    $user = Auth::user();
    $competencies = Competency::where('faculty_id', null)
        ->orWhere('faculty_id', $user->faculty)
        ->get();

    foreach ($competencies as $competency) {
        $answeredTrue = Question::whereHas('user_question_statu', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('is_answered', true);
        })->where('competency_id', $competency->id)
        ->count();

        $answeredFalse = Question::whereHas('user_question_statu', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('is_answered', false);
        })->where('competency_id', $competency->id)
        ->count();

        $competency->answered_true = $answeredTrue;
        $competency->answered_false = $answeredFalse;
    }

    return response()->json($competencies);
}


    public function questions($id)
    {
        $user = Auth::user();

        $level = progress::where('user_id', $user->id)
            ->where('competencie_id', $id)
            ->first();

        if ($level) 
        {
            $questions = Question::where('competency_id', $id)
                ->where('level_id', $level->level_id)
            ->get();
        } else
        {
            $questions = Question::where('competency_id', $id)
                ->where('level_id', Level::first()->id)
                ->get();
        }

        $questionIds = $questions->pluck('id');

        $userQuestionStatus = user_question_statu::where('user_id', $user->id)
            ->where('is_answered',true)
            ->whereIn('question_id', $questionIds)
            ->get()
            ->pluck('question_id')
            ->toArray(); 

        $questionsWithStatus = $questions->map(function ($question) use ($userQuestionStatus) {
            $question->is_answered = in_array($question->id, $userQuestionStatus);
            return $question;
        });

        return response()->json($questionsWithStatus);

    }


    public function question_resolve($id)
{
    $user = auth::user();
    $question = Question::where('id', $id)->get();
    foreach ($question as $questionItem) {
        if ($questionItem->author_id != null) {
            $author = Author::where('id', $questionItem->author_id)->first();
            if ($author) {
                $questionItem->author_name = $author->name;
                $questionItem->author_email = $author->email;
                $questionItem->author_institution = $author->institution;
            }
        }
    }

    return response()->json($question);
}





    public function multimedia_question($id)
    {
        //$user = Auth::user();
        $multimediaData = Multimedia::join('multimediaquestions', 'multimedia.id', '=', 'multimediaquestions.multimedia_id')
            ->join('questions', 'multimediaquestions.question_id', '=', 'questions.id')
            ->select('multimedia.*')
            ->where('questions.id', $id)
            ->get();
        return response()->json($multimediaData);
        
    }


    public function answers($id)
    {
        $user = Auth::user();
         $answers = Answer::with('multimedia')
                    ->where('question_id', $id)
                    ->get();
        
        return response()->json($answers);
    }


    public function faculties()
    {
        $faculties = Faculty::all();
        return $faculties;
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        
        $user->fill($request->all());
        $user->save();

        return response()->json([ 'message'=>'Datos actualizados correctamente'], 200);
    }



    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Sesión terminada'], 200);

    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) 
        {
            $user = Auth::user();
        
            // Inicio de sesión exitoso, devuelve la respuesta deseada (por ejemplo, un token de autenticación)
            return response()->json(['token' => $user->createToken('API Token')->plainTextToken, 'message'=>'Se encontró una sesión.'], 200);
        } else {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) 
            {
            // Inicio de sesión exitoso, devuelve la respuesta deseada
                return response()->json(['token' => $user->createToken('API Token')->plainTextToken, 'message'=>'Se inició sesión nueva.'], 200);
            } else {
            // Error en el inicio de sesión, devuelve la respuesta deseada (por ejemplo, un mensaje de error)
                return response()->json(['message' => 'Credenciales inválidas'], 401);
            }
        }

        
    }

   
    public function perfil(){
        $user = Auth::user();
        $faculty = Faculty::where('id',$user->faculty)->first();
        $user->faculty_name = $faculty->name;
        return $user;
    }


    public function validate_session(){
        return response()->json([ 'message'=>'Sesión verificadá'], 200);
            
    }

    public function register(Request $request)
    {


        
        /* Validamos el correo del usuario, con el fin de validar que sea usantoto.edu.co */
        $separate = "@";
        $array = explode($separate, $request->email);
        $company = $array[1];
        if($company == "usantoto.edu.co")
        {
            $user = User::where('email', $request->email)->first();
            if($user){
                return response()->json(['message' => 'Este correo electrónico ya está asociado a otro usuario. Si este correo electrónico te pertenece, te recomendamos intentar recuperar tu contraseña.'], 401);
            }
            else{
                //Validamos que las contraseñas coincidan
                if($request->password == $request->repassword)
                {
                // Usando el modelo de usuario creamos el usuario con los datos recibidos por metodo post
                $user = new user();

                $user->fill($request->all());
                
                
                $rememberToken = \Str::random(60); 
                $user->remember_token = $rememberToken;
    
                $user->save();
                
                /* Despues de guardar el nuevo usuario le asignamos el rol del estudiante...*/
                $user->assignRole('student');
                /*Iniciamos sesión*/
                Auth::login($user);
                
                $emailController = new EmailController();
                $emailController->welcome_email($user);
                
                /*dirigimos al usuario a la pagina principal de estudiante*/
                return response()->json(['token' => $user->createToken('API Token')->plainTextToken, 'message'=>'Se inició sesión nueva.'], 200);
            
                }else{
                    return response()->json(['message' => 'Por favor, verifica las contraseñas. No coinciden.'], 401);
                }
            }
        }else{
            return response()->json(['message' => 'Debes usar tu correo institucional.'], 401);
        }
    }
    
    
    public function send_recover_password_email(Request $request)
    {
        
        
        
        $email = $request->email;
        $user = User::where('email',$request->email)->first();
        if($user)
        {
            $code=mt_rand(800, 800000);
            $data = ['code_recover'=>$code];
            User::where('id',$user->id)->update($data);
             $emailController = new EmailController();
        
            if ($emailController->password_recover($request->email,$code)) {
                return response()->json(['message' => 'El correo de verificación se envio exitosamente.']);
            } else {
                return response()->json(['message' => 'Hubo un error al enviar el correo de recuperación.'], 500);
            }
            
            
        }else
        {
            return response()->json(['message' => 'El correo que has enviado no está registrado, por favor, verificalo e intentalo de nuevo.'], 401);
        }
        
       
    }



    public function validate_code_recover(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $user = User::where('email',$email)->where('code_recover',$code)->first();
        if($user)
        {
            $data = ['code_recover'=>null];
            User::where('id',$user->id)->update($data);
            return response()->json(['token' => $user->createToken('API Token')->plainTextToken, 'message' => 'El código se verificó y es correcto'], 200);
        }else
        {
            return response()->json(['message' => 'El código que intentas verificar es incorrecto, por favor, verifícalo e intenta de nuevo.'], 401);
        }
    }
    
    
    public function update_password_recover(Request $request)
    {
        
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);

        return response()->json(['message' => 'Tu contraseña se cambió con éxito, puedes iniciar sesión con tu nueva contraseña'], 200);
        
    }


}

