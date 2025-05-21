<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pages.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
            'telephone_number' => ['nullable', 'phone:GB', 'min:10', 'max:20'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'address_line_one' => ['nullable', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:10'],
            'country' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string'],
            'website' => ['nullable', 'url'],
            'stack_user' => ['nullable', 'string', 'max:255'],
        ]);

        $password = Str::random(8);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'full_name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($password),
        ]);

        $clientDetails = Client::create([
           'user_id' => $user->id,
            'telephone_number' => $validated['telephone_number'],
            'company_name' => $validated['company_name'],
            'address_line_one' => $validated['address_line_one'],
            'address_line_two' => $validated['address_line_two'],
            'city' => $validated['city'],
            'postcode' => $validated['postcode'],
            'country' => $validated['country'],
            'status' => $validated['status'],
            'website' => $validated['website'],
            'stack_user' => $validated['stack_user'],

        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
