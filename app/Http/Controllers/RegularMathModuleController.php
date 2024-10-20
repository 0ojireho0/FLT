<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegularMathModule;
use Illuminate\Support\Facades\Storage;

class RegularMathModuleController extends Controller
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
        $pdf = new RegularMathModule();
        $pdf->filename = $filePath;
        $pdf->original_name = $file->getClientOriginalName();
        $pdf->save();

        return response()->json(['message' => 'PDF uploaded successfully', 'pdf_id' => $pdf->id], 201);
    }

    public function show($id)
    {
        $pdf = RegularMathModule::find($id);

        if ($pdf) {
            $pdfContent = Storage::disk('public')->get($pdf->filename);
            return response($pdfContent, 200)
                    ->header('Content-Type', 'application/pdf');
        }

        return response()->json(['message' => 'PDF not found'], 404);
    }

    public function index(){
        $pdf = RegularMathModule::all();
        return response()->json(['pdf'=>$pdf]);
    }

    public function destroy(string $id)
    {
        //
        $pdf = RegularMathModule::findOrFail($id);


        // Delete the student
        $pdf->delete();
    

        return response()->json(['message' => 'PDF deleted successfully'], 200);
    }
}
