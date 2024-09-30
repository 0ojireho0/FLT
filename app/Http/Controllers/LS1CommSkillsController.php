<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LS1CommSkills;
use Illuminate\Support\Facades\Storage;

class LS1CommSkillsController extends Controller
{
    //
    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);

        $file = $request->file('pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('pdfs', $filename, 'public');

        // Save PDF details in the database
        $pdf = new LS1CommSkills();
        $pdf->filename = $filePath;
        $pdf->original_name = $file->getClientOriginalName();
        $pdf->save();

        return response()->json(['message' => 'PDF uploaded successfully', 'pdf_id' => $pdf->id], 201);
    }

    public function show($id)
    {
        $pdf = LS1CommSkills::find($id);

        if ($pdf) {
            $pdfContent = Storage::disk('public')->get($pdf->filename);
            return response($pdfContent, 200)
                    ->header('Content-Type', 'application/pdf');
        }

        return response()->json(['message' => 'PDF not found'], 404);
    }

    public function index(){
            $pdf = LS1CommSkills::all();
            return response()->json(['pdf'=>$pdf]);
    }

    public function destroy(string $id)
    {
        //
        $pdf = LS1CommSkills::findOrFail($id);


        // Delete the student
        $pdf->delete();
     
    
        return response()->json(['message' => 'PDF deleted successfully'], 200);
    }
}
