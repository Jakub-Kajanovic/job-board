<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class EmployerController extends BaseController
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Employer::class, 'employer');
    }
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->employer()->create($request->validate([
            'company_name' =>'required|string|min:3|max:255|unique:employers,company_name',
        ]));

        return redirect()->route('jobs.index')->with('success', 'Employer created successfully.');
    }
}
