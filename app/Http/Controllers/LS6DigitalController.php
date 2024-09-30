<?php

namespace App\Http\Controllers;

use App\Models\LS6Digital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LS6DigitalController extends Controller
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
        $pdf = new LS6Digital();
        $pdf->filename = $filePath;
        $pdf->original_name = $file->getClientOriginalName();
        $pdf->save();

        return response()->json(['message' => 'PDF uploaded successfully', 'pdf_id' => $pdf->id], 201);
    }

    public function show($id)
    {
        $pdf = LS6Digital::find($id);

        if ($pdf) {
            $pdfContent = Storage::disk('public')->get($pdf->filename);
            return response($pdfContent, 200)
                    ->header('Content-Type', 'application/pdf');
        }

        return response()->json(['message' => 'PDF not found'], 404);
    }

    public function index(){
            $pdf = LS6Digital::all();
            return response()->json(['pdf'=>$pdf]);
    }

    public function destroy(string $id)
    {
        //
        $pdf = LS6Digital::findOrFail($id);


        // Delete the student
        $pdf->delete();
     
    
        return response()->json(['message' => 'PDF deleted successfully'], 200);
    }
}
