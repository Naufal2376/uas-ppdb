<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Download the Bukti Pendaftaran (PDF) for a registered student.
     */
    public function downloadProof(Request $request)
    {
        $user = auth()->user();
        $registration = $user->registration;

        if (! $registration || ! in_array($registration->status, ['verified', 'approved'])) {
            abort(403, 'Sistem mendeteksi dokumen belum tersedia atau belum terverifikasi.');
        }

        // Gather relations securely mapped back to the authenticated user
        $data = [
            'user'          => $user,
            'registration'  => $registration,
            'studentDetail' => $user->studentDetail,
            'parentDetail'  => $user->parentDetail,
            'schoolOrigin'  => $user->schoolOrigin,
        ];

        $pdf = Pdf::loadView('pdf.registration-proof', $data);

        // Customize paper size to standard A4 length
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('Bukti-Pendaftaran-' . $registration->registration_number . '.pdf');
    }
}