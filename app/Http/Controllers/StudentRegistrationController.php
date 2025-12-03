<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\Program;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function create()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('registration.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string',
            'parent_email' => 'nullable|email',
            'parent_occupation' => 'nullable|string',
            'program_id' => 'required|exists:programs,id',
            'program_notes' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'family_card' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'health_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('registrations/photos', 'uploads');
        }
        if ($request->hasFile('birth_certificate')) {
            $validated['birth_certificate'] = $request->file('birth_certificate')->store('registrations/documents', 'uploads');
        }
        if ($request->hasFile('family_card')) {
            $validated['family_card'] = $request->file('family_card')->store('registrations/documents', 'uploads');
        }
        if ($request->hasFile('health_certificate')) {
            $validated['health_certificate'] = $request->file('health_certificate')->store('registrations/documents', 'uploads');
        }

        $validated['submitted_at'] = now();
        $validated['status'] = 'pending';

        StudentRegistration::create($validated);

        return redirect()->back()->with('success', 'Kami akan menghubungi Anda segera.');
    }
}
