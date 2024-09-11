<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    // Método para obtener todos los cultivos (READ - Index)
    public function index()
    {
        return response()->json(Crop::all(), 200);
    }

    // Método para crear un nuevo cultivo (CREATE - Store)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'planting_date' => 'required|date',
            'area_size' => 'required|numeric',
            'estimated_yield' => 'required|integer',
        ]);

        $crop = Crop::create($validatedData);

        return response()->json($crop, 201);
    }

    // Método para mostrar un cultivo específico (READ - Show)
    public function show($id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['message' => 'Cultivo no encontrado'], 404);
        }

        return response()->json($crop, 200);
    }

    // Método para actualizar un cultivo existente (UPDATE - Update)
    public function update(Request $request, $id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['message' => 'Cultivo no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'planting_date' => 'sometimes|required|date',
            'area_size' => 'sometimes|required|numeric',
            'estimated_yield' => 'sometimes|required|integer',
        ]);

        $crop->update($validatedData);

        return response()->json($crop, 200);
    }

    // Método para eliminar un cultivo (DELETE - Destroy)
    public function destroy($id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['message' => 'Cultivo no encontrado'], 404);
        }

        $crop->delete();

        return response()->json(['message' => 'Cultivo eliminado con éxito'], 204);
    }
}
