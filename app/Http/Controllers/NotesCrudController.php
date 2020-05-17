<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\NotesModel;

class NotesCrudController extends Controller
{
    /**
     * Creates a new note collection registry by given params.
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request):JsonResponse
    {
        // Gather request input and rules to validate.
        $data = $request->input('note');
        $rules = [
            'title' => 'required|string|max:32',
            'content' => 'required|string'
        ];

        // Validate request input.
        $data = $this->validateJson($data, $rules);

        // Insert, then, a new note.
        $noteId = NotesModel::insertGetId([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return response()->json([
            'data' => NotesModel::find($noteId)
        ]);
    }

    /**
     * Returns all registry from notes collection.
     * 
     * @param void
     * @return \Illuminate\Http\JsonResponse
     */
    public function readAll():JsonResponse
    {
        return response()->json([
            'data' => NotesModel::all()
        ]);
    }

    /**
     * Returns a registry by given id.
     * 
     * @param string
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(string $noteId):JsonResponse
    {
        return response()->json([
            'data' => NotesModel::find($noteId)
        ]);
    }

    /**
     * Updates all fields on a note registry by given values.
     * 
     * @param \Illuminate\Http\Request
     * @param string
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $noteId):JsonResponse
    {
        // Gather request input and rules to validate.
        $data = $request->input('note');
        $rules = [
            'title' => 'required|string|max:32',
            'content' => 'required|string'
        ];

        // Validate request input.
        $data = $this->validateJson($data, $rules);

        // Update, then, a note by given id.
        $noteId = NotesModel::where('id', $noteId)->update([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return response()->json([
            'data' => NotesModel::find($noteId)
        ]);
    }

    /**
     * Partially updates fields on a note registry by given values.
     * 
     * @param \Illuminate\Http\Request
     * @param string
     * @return \Illuminate\Http\JsonResponse
     */
    public function patch(Request $request, string $noteId):JsonResponse
    {
        // Gather request input and rules to validate.
        $data = $request->input('note');
        $rules = [
            'title' => 'string|max:32',
            'content' => 'string'
        ];

        // Validate request input.
        $data = $this->validateJson($data, $rules);

        // Create the update Dummy and iterate.
        $update = [];
        foreach ($data as $k => $v) {
            if ($v) {
                $update[$k] = $v;
            }
        }

        // Update, then, a note by given id.
        $noteId = NotesModel::where('id', $noteId)->update($update);

        return response()->json([
            'data' => NotesModel::find($noteId)
        ]);
    }

    /**
     * Deletes a registry by given id.
     * 
     * @param string
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(string $noteId):JsonResponse
    {
        $delete = boolval(NotesModel::destroy($noteId));

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
     * 
     * @param mixed
     * @param array
     * @return array
     */
    private function validateJson($data, array $rules):array
    {
        // Try to decode given input.
        $data = @json_decode($data, true);
        // If not decoded as an array, is not a JSON.
        if (!is_array($data)) {
            throw new \Exception("note is missing or isn't a valid JSON");
        }
        // Use given data and rules to make a custom validator.
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            return $data;
        }

        throw new \Exception($validator->errors()->all()[0]);
    }
}
