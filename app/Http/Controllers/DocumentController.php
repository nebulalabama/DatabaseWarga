<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the DOCUMENT.
     */
    public function index()
    {
        // Get all documents
        $documents = Document::all();

        // Render view
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new DOCUMENT.
     */
    public function create()
    {
        // Render view
        return view('documents.create');
    }

    /**
     * Store a newly created DOCUMENT in storage.
     */
    public function store(Request $request)
    {
        // Validate document data including file upload
        $request->validate([
            'resident_id' => 'required|min:16',
            'ktp' => 'nullable|file|max:10240', // max 10MB, optional
            'kk' => 'nullable|file|max:10240', // max 10MB, optional
            'akta_lahir' => 'nullable|file|max:10240', // max 10MB, optional
            'paspor' => 'nullable|file|max:10240', // max 10MB, optional
        ]);

        // Determine which file fields are uploaded
        $uploadedFields = [];
        foreach (['ktp', 'kk', 'akta_lahir', 'paspor'] as $field) {
            if ($request->hasFile($field)) {
                $uploadedFields[] = $field;
            }
        }

        // Handle file uploads
        foreach ($uploadedFields as $field) {
            $file = $request->file($field);
            $residentId = $request->resident_id;
            $fileName = $residentId . '_' . strtoupper($field); // Example: 12345_KTP
            $filePath = $file->storeAs('public/uploads/documents', $fileName);
        }

        // Store document
        Document::create([
            'resident_id' => $request->resident_id,
            'ktp' => in_array('ktp', $uploadedFields) ? 'uploads/documents/' . $residentId . '_KTP' : null,
            'kk' => in_array('kk', $uploadedFields) ? 'uploads/documents/' . $residentId . '_KK' : null,
            'akta_lahir' => in_array('akta_lahir', $uploadedFields) ? 'uploads/documents/' . $residentId . '_AKTA_LAHIR' : null,
            'paspor' => in_array('paspor', $uploadedFields) ? 'uploads/documents/' . $residentId . '_PASPOR' : null,
        ]);

        // Redirect after successful store
        return redirect('/documents')->with('success', 'Document added successfully.');
    }

    /**
     * Display the specified DOCUMENT.
     */
    public function show($id)
    {
        // Find Document by ID
        $document = Document::findOrFail($id);

        // Render view 
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified DOCUMENT.
     */
    public function edit($id)
    {
        // Find Document by ID
        $document = Document::findOrFail($id);

        // Render view
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified DOCUMENT in storage.
     */
    public function update(Request $request, $id)
{
    // Find Document by ID
    $document = Document::findOrFail($id);

    // Validate document data including file upload
    $request->validate([
        'resident_id' => 'required|min:16',
        'ktp' => 'nullable|file|max:10240', // max 10MB, optional
        'kk' => 'nullable|file|max:10240', // max 10MB, optional
        'akta_lahir' => 'nullable|file|max:10240', // max 10MB, optional
        'paspor' => 'nullable|file|max:10240', // max 10MB, optional
    ]);

    // Determine which file fields are uploaded
    $uploadedFields = [];
    foreach (['ktp', 'kk', 'akta_lahir', 'paspor'] as $field) {
        if ($request->hasFile($field)) {
            // Delete old file if exists
            if ($document->$field) {
                Storage::delete('public/' . $document->$field);
            }

            // Upload new file
            $file = $request->file($field);
            $residentId = $request->resident_id;
            $fileName = $residentId . '_' . strtoupper($field); // Example: 12345_KTP
            $filePath = $file->storeAs('public/uploads/documents', $fileName);

            // Update document field
            $document->$field = 'uploads/documents/' . $residentId . '_' . strtoupper($field);
        }
    }

    // Update resident_id if changed
    $document->resident_id = $request->resident_id;

    // Save the updated document
    $document->save();

    // Redirect after successful update
    return redirect('/documents')->with('success', 'Document updated successfully.');
}


    /**
     * Remove the specified DOCUMENT from storage.
     */
    public function destroy($id)
    {
        // Find Document by ID
        $document = Document::findOrFail($id);

        // Delete files from storage
        foreach (['ktp', 'kk', 'akta_lahir', 'paspor'] as $field) {
            if ($document->$field) {
                Storage::delete('public/' . $document->$field);
            }
        }

        // Delete document from database
        $document->delete();

        // Redirect after successful deletion
        return redirect('/documents')->with('success', 'Document deleted successfully.');
    }
}
