<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotesController extends Controller
{
    public function index(Request $request, $customerId)
    {
        return Note::where('customer_id', $customerId)->get();
    }


    public function create(Request $request, $customerId)
    {
        $note = new Note;
        $note->note = $request->get('note');
        $note->save();

        return $note;
    }


    public function update(Request $request, $customerId, $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['status' => 'not found'], Response::HTTP_NOT_FOUND);
        }

        if ($note->customer_id != $customerId) {
            return response()->json(['status' => 'Invalid date'], Response::HTTP_BAD_REQUEST);
        }

        $note->note = $request->get('note');

        $note->save();

        return $note;
    }


    public function delete(Request $request, $customerId, $id)
    {
        $note =  Note::find($id);

        if (!$note) {
            return response()->json(['status' => 'not found'], Response::HTTP_NOT_FOUND);
        }
        $note->delete();

        return response()->json(['status' => 'deleted'], Response::HTTP_OK);
    }


    public function show($id)
    {
        return  Note::find($id) ??  response()->json(['status' => 'not found'], Response::HTTP_NOT_FOUND);
    }
}
