<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;



class UserController extends Controller
{

    public function pdf(Request $request)
    {
        $search = $request->query('search');

        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('document', 'like', '%' . $search . '%');
            // Agrega más condiciones según tus necesidades de búsqueda
        }

        $users = $query->get();

        $pdf = Pdf::loadView('user.pdf', compact('users'));
        return $pdf->stream();
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('document', 'like', '%' . $search . '%');
            // Agrega más condiciones según tus necesidades de búsqueda
        }

        $users = $query->paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


public function email_verify($token)
{
    $user = User::where('remember_token', $token)->first();

    if ($user) {
        $rememberToken = \Str::random(60);
        $fecha = now(); // Asigna la fecha actual (puedes ajustarla según tu necesidad)
        $update = ["email_verified_at" => $fecha, "remember_token" => $rememberToken];

        if ($user->update($update)) {
            return "Gracias por verificar tu correo. La actualización fue exitosa.";
        } else {
            return "Error al verificar. No se pudo actualizar el usuario.";
        }
    } else {
        return "Error al verificar. No se encontró el usuario con el token proporcionado.";
    }
}


    public function getUsersData(Request $request)
    {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        if ($request->filter === 'month') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
        } elseif ($request->filter === 'year') {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
        }

        $userData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        return response()->json($userData);
    }

    public function addPoints(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'points' => 'required|integer|min:1',
        ]);

        $user->points += $validatedData['points'];
        $user->save();

        return response()->json([
            'message' => 'Puntos agregados exitosamente.',
            'points' => $user->points,
        ]);
    }

    public function deductPoints(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'points' => 'required|integer|min:1|max:' . $user->points,
        ]);

        $user->points -= $validatedData['points'];
        $user->save();

        return response()->json([
            'message' => 'Puntos deducidos exitosamente.',
            'points' => $user->points,
        ]);
    }
}
