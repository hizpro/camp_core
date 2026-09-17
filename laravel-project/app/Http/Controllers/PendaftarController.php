<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Tampilkan landing page PMB
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Proses submit form pendaftaran
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'required|in:L,P',
            'address' => 'nullable|string',
            'school' => 'nullable|string|max:255',
            'graduation_year' => 'nullable|string|max:4',
            'program' => 'required|string|max:255',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:20',
        ]);

        $pendaftar = Pendaftar::create([
            'no_pendaftaran' => Pendaftar::generateNoPendaftaran(),
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'birth_place' => $validated['birth_place'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'gender' => $validated['gender'],
            'address' => $validated['address'] ?? null,
            'school' => $validated['school'] ?? null,
            'graduation_year' => $validated['graduation_year'] ?? null,
            'program' => $validated['program'],
            'parent_name' => $validated['parent_name'] ?? null,
            'parent_phone' => $validated['parent_phone'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', true)
            ->with('pendaftar', $pendaftar);
    }
}
