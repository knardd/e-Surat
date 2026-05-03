<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class OperatorController extends Controller
{
    /**
     * Display list of pending surat waiting for operator approval
     */
    public function index()
    {
        $surats = Surat::where('status', 'diproses')
            ->with(['user', 'jenis'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Operator/Dashboard', [
            'surats' => $surats,
        ]);
    }

    /**
     * User Management (CRUD)
     */
    public function userIndex(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return Inertia::render('Operator/UserManagement', [
            'users' => $users,
            'filters' => $request->only(['search']),
        ]);
    }

    /**
     * Store a newly created user
     */
    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users',
            'nik' => 'required|string|size:16|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Update user details
     */
    public function userUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $user->id,
            'nik' => 'required|string|size:16|unique:users,nik,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * Remove user
     */
    public function userDestroy(User $user)
    {
        // Optional: Check if user has active surat before deleting
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    /**
     * Show detail of specific surat
     */
    public function show($id)
    {
        $surat = Surat::with(['user', 'jenis', 'details', 'logs.user'])->findOrFail($id);

        if ($surat->status !== 'diproses') {
            return redirect()->route('operator.dashboard')
                ->with('error', 'Surat ini sudah diproses sebelumnya');
        }

        return Inertia::render('Operator/ShowSurat', [
            'surat' => $surat,
            'detailMap' => $surat->detail_map,
        ]);
    }

    /**
     * Approve/Reject methods kept for context...
     */
}
