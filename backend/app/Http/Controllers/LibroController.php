<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    // GET /api/books
    public function index()
    {
        return response()->json(Libro::select('id', 'titulo', 'autor', 'genero', 'disponibilidad')->get());
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        return response()->json($libro);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'genero' => 'required|string',
            'disponibilidad' => 'boolean'
        ]);

        $libro = Libro::create($validated);

        return response()->json($libro, 201);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->update($request->all());

        return response()->json($libro);
    }

    // DELETE /api/books/{id}
    public function destroy($id)
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->delete();

        return response()->json(['message' => 'Libro eliminado correctamente']);
    }
}
