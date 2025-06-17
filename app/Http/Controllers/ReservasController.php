<?php

namespace App\Http\Controllers;
use \App\Models\Recurso;
use \App\Models\Reserva;
use App\Notifications\reservationCanceled;
use App\Notifications\reservationMade;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
 class ReservasController
{
    public function index()
    {
        $recursos = Recurso::all();
        return view('welcome', ['recursos' => $recursos]);
    }

     public function recursos()
    {

        $search =  request('search'); 
        if ($search) {
            $recursos = Recurso::where([
                ['nombre', 'like', '%'.$search.'%']  
            ])->get(); // Search for events by title
        } else {
            $recursos = Recurso::all(); // Retrieve all events if no search term is provided
        }
         return view('events.recursos', ['recursos' => $recursos, 'search' => $search]); // Pass the events to the view

    }

    public function dashboard()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/')->with('error', 'You must be logged in to access the dashboard.');
        }
        $reservas = Reserva::where( 'user_id', $user->id)->get();
        $recursos = Recurso::whereIn('id', $reservas->pluck('recurso_id'))->get();

        return view('events.dashboard', ['recursos' => $recursos]);
    }
       public function reservar($id)
            {
                $user = auth()->user();
                $recurso_reservado = Recurso::findOrFail($id);

                $jaReservou = $user->reservas()->where('recurso_id', $id)->exists();

                if ($jaReservou) {
                    return back()->with('msgError', 'Ya tienes reserva en este recurso');
                }

                $recurso = Recurso::findOrFail($id)->update(['estado'=>'reservado']);

                $user->reservas()->create(['recurso_id' => $id,]);
                   
                $user->notify(new reservationMade($user, $recurso_reservado ));
               
                return back()->with('msg', 'Reserva realizada con éxito');
            }

    public function cancelar($id)
    {
        $user = auth()->user();
        $recurso_reservado = Recurso::findOrFail($id);
        // encontra a reserva específica e deleta
        $deletou = $user->reservas()->where('recurso_id', $id)->delete();                    

        if ($deletou) {
             $recurso = Recurso::findOrFail($id)->update(['estado'=>'No reservado']);
            $user->notify(new reservationCanceled($user, $recurso_reservado ));
               
            return back()->with('msg', 'Cancelamiento de reserva realizado con éxito');
        }


        return back()->with('msgError', 'No se encontró reserva para cancelar');
    }

   public function notification()
        {

        }



}
