<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\NotesModel;

class NotesController extends Controller
{
    /**
     * List all notes.
     * GET /notes
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => NotesModel::all()
        ]);
    }

    /**
     * Show a single note by ID.
     * GET /notes/{id}
     */
    public function show(string $id): JsonResponse
    {
        return response()->json([
            'data' => NotesModel::find($id)
        ]);
    }

    /**
     * Create a new note.
     * POST /notes
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->input('note');
        $rules = [
            'title' => 'required|string|max:32',
            'content' => 'required|string'
        ];
        $data = $this->validateJson($data, $rules);
        $noteId = NotesModel::insertGetId([
            'title' => $data['title'],
            'content' => $data['content']
        ]);
        return response()->json([
            'data' => NotesModel::find($noteId)
        ]);
    }

    /**
     * Update a note (full or partial).
     * PUT/PATCH /notes/{id}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $data = $request->input('note');
        // Detect if it's a PATCH (partial) or PUT (full)
        $isPatch = $request->method() === 'PATCH';
        $rules = $isPatch
            ? [ 'title' => 'string|max:32', 'content' => 'string' ]
            : [ 'title' => 'required|string|max:32', 'content' => 'required|string' ];
        $data = $this->validateJson($data, $rules);
        $update = [];
        foreach ($data as $k => $v) {
            if ($v !== null) {
                $update[$k] = $v;
            }
        }
        NotesModel::where('id', $id)->update($update);
        return response()->json([
            'data' => NotesModel::find($id)
        ]);
    }

    /**
     * Delete a note by ID.
     * DELETE /notes/{id}
     */
    public function destroy(string $id): JsonResponse
    {
        $delete = boolval(NotesModel::destroy($id));
        if ($delete) {
            return response()->json([
                'data' => $delete
            ]);
        }
        throw new \Exception("Record not found for given value");
    }

    /**
     * Validates given $data is a valid JSON.
     * Validates custom, given rules, to be meet by given JSON.
     */
    private function validateJson($data, array $rules): array
    {
        $data = @json_decode($data, true);
        if (!is_array($data)) {
            throw new \Exception("note is missing or isn't a valid JSON");
        }
        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            return $data;
        }
        throw new \Exception($validator->errors()->all()[0]);
    }
}