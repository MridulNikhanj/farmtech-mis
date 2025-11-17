<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Scheme;

class SchemeController extends Controller
{
    private function getAllStates()
    {
        return [
            'All India',
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttar Pradesh',
            'Uttarakhand',
            'West Bengal'
        ];
    }

    public function index(Request $request)
    {
        $states = $this->getAllStates();
        $query = Scheme::query();

        // Filter by state if specified
        if ($request->has('state') && $request->state && $request->state !== 'All States') {
            $query->where(function($q) use ($request) {
                $q->where('state', $request->state)
                  ->orWhere('state', 'All India');
            });
        }

        // Filter by category if specified
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Search by name, category, or state
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$search%")
                  ->orWhere('state', 'like', "%$search%")
                  ->orWhere('eligibility', 'like', "%$search%")
                  ->orWhere('benefits', 'like', "%$search%")
                  ->orWhere('documents', 'like', "%$search%")
                  ->orWhere('deadline', 'like', "%$search%")
                  ->orWhere('apply_link', 'like', "%$search%")
                ;
            });
        }

        $schemes = $query->orderBy('id', 'desc')->paginate(10)->appends($request->query());

        return view('schemes.index', [
            'schemes' => $schemes,
            'states' => $states
        ]);
    }
} 