<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Farmer::all();
        return view('farmer.index', compact('farmers'));
    }

    public function create()
    {
        return view('farmer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'farmer_photo' => 'nullable|image|max:2048',
            'fpo_registration_no' => 'required|string',
            'associated_fpo' => 'nullable|string',
            'farmer_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'pin_code' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'block' => 'required|string',
            'aadhar_no' => 'required|string|unique:farmers',
            'mobile_no' => 'required|string',
            'email' => 'nullable|email',
            'area_type' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Inactive'
        ]);

        try {
            if ($request->hasFile('farmer_photo')) {
                $path = $request->file('farmer_photo')->store('farmer-photos', 'public');
                $validated['farmer_photo'] = $path;
            }

            $farmer = Farmer::create($validated);

            // Send welcome email if email is provided
            if ($farmer->email) {
                try {
                    Mail::to($farmer->email)->send(new WelcomeMail($farmer->farmer_name));
                } catch (\Exception $e) {
                    // Log the email error but don't stop the registration process
                    Log::error('Failed to send welcome email: ' . $e->getMessage());
                }
            }

            return redirect()->route('farmer.index')
                ->with('success', 'Beneficiary registered successfully.');
        } catch (\Exception $e) {
            Log::error('Error registering beneficiary: ' . $e->getMessage());
            return back()->withInput()
                ->with('error', 'Error registering beneficiary. Please try again.');
        }
    }

    public function show(Farmer $farmer)
    {
        return view('farmer.show', compact('farmer'));
    }

    public function edit(Farmer $farmer)
    {
        return view('farmer.edit', compact('farmer'));
    }

    public function update(Request $request, Farmer $farmer)
    {
        $validated = $request->validate([
            'farmer_photo' => 'nullable|image|max:2048',
            'fpo_registration_no' => 'required|string',
            'associated_fpo' => 'nullable|string',
            'farmer_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'pin_code' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'block' => 'required|string',
            'aadhar_no' => 'required|string|unique:farmers,aadhar_no,' . $farmer->id,
            'mobile_no' => 'required|string',
            'email' => 'nullable|email',
            'area_type' => 'required|in:Yes,No',
            'status' => 'required|in:Active,Inactive'
        ]);

        try {
            if ($request->hasFile('farmer_photo')) {
                $path = $request->file('farmer_photo')->store('farmer-photos', 'public');
                $validated['farmer_photo'] = $path;
            }

            $farmer->update($validated);

            return redirect()->route('farmer.index')
                ->with('success', 'Beneficiary details updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating beneficiary: ' . $e->getMessage());
            return back()->withInput()
                ->with('error', 'Error updating beneficiary details. Please try again.');
        }
    }

    public function destroy(Farmer $farmer)
    {
        try {
            $farmer->delete();
            return redirect()->route('farmer.index')
                ->with('success', 'Farmer deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting farmer: ' . $e->getMessage());
            return redirect()->route('farmer.index')
                ->with('error', 'Error deleting farmer.');
        }
    }
} 