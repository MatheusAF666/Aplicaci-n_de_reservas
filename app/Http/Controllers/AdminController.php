<?php

namespace App\Http\Controllers;
use \App\Models\Recurso;
use \App\Models\Reserva;
use Illuminate\Http\Request;

class AdminController
{
     public function index()
     {

          $recursos = Recurso::all();
          return view('admin.recursos.index', ['recursos' => $recursos]);

     }
     public function delete($id)
     {

          $user = auth()->user();

          $recurso = Recurso::findOrFail($id);

          if ($user->role != "admin") {
               return redirect('/')->with('msgError', 'No tienes permiso para eliminar este recurso');
          }
          $recurso->delete();
          return redirect('/admin/dashboard')->with('msg', 'Recurso eliminado con éxito');
     }
     public function create()
     {
          return view('admin.recursos.create');
     }
     public function store(Request $request)
     {
          $recurso = new Recurso;
          $recurso->nombre = $request->input('title');
          $recurso->descripcion = $request->input('description');
          $recurso->capacidad = $request->input('capacity');
          $recurso->precio = $request->input('price');
          $recurso->ciudad = $request->input('localidad');
          $recurso->reglas = $request->input('reglas');

          if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $requestImage = $request->image; // Get the uploaded image
               $extension = $requestImage->extension(); // Get the file extension
               $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension; // Create a unique name for the image
               $requestImage->move(public_path('img/recursos'), $imageName); // Move the image to the public/img/events directory
               $recurso->imagen = $imageName; // Set the image name in the event model

          }
          $recurso->save(); // Save the event to the database   
          return redirect('/')->with('msg', 'Recurso criado com sucesso!'); // Redirect to the index with a success message

     }
     public function edit($id)
     {


          $recurso = Recurso::findOrFail($id);

          return view('admin.recursos.edit', ['recurso' => $recurso]);
     }
     public function update(Request $request, $id)
     {


          $data = $request->all();


          if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $requestImage = $request->image; // Get the uploaded image
               $extension = $requestImage->extension(); // Get the file extension
               $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension; // Create a unique name for the image
               $requestImage->move(public_path('img/recursos'), $imageName); // Move the image to the public/img/events directory
               // Set the image name in the event model
               $data['image'] = $imageName;
          }

          $recurso = Recurso::findOrFail($id)->update($data);

          return redirect('/admin/dashboard')->with('msg', 'Recurso atualizado con éxito');
     }
}
