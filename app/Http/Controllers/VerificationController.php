<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
    'identity_document' => 'required|file|mimes:jpeg,png,pdf',
            'utility_bill' => 'required|file|mimes:jpeg,png,pdf',
        ]);

        $identityDocumentPath = $request->file('identity_document')->store('verification/identity_documents', 'public');
        $utilityBillPath = $request->file('utility_bill')->store('verification/utility_bills', 'public');


        Verification::create([
            'user_id' => Auth::id(),
            'document_type' => $request->document_type,
            'document_path' => $path,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Document submitted for verification.');
    }
}
