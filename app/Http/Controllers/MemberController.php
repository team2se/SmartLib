<?php

namespace App\Http\Controllers;

use App\Models\Member; // 1. Impor model Member
use Illuminate\Http\Request; // 2. Impor Request

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->paginate(10);
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email', // email harus unik di tabel 'members'
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        // Member::create($validatedData); // Jika $fillable di model sudah diatur

        $member = new Member();
        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->phone_number = $validatedData['phone_number'];
        $member->address = $validatedData['address'];
        $member->save();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member) // Route Model Binding
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member) // Route Model Binding
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member) // Route Model Binding
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Untuk email, pastikan unik kecuali untuk anggota ini sendiri
            'email' => 'required|string|email|max:255|unique:members,email,' . $member->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        // $member->update($validatedData); // Jika $fillable di model sudah diatur

        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->phone_number = $validatedData['phone_number'];
        $member->address = $validatedData['address'];
        $member->save();

        return redirect()->route('members.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member) // Route Model Binding
    {
        try {
            // Sebelum menghapus, Anda mungkin ingin memeriksa apakah anggota ini memiliki peminjaman aktif.
            // if ($member->borrowings()->where('status', 'borrowed')->exists()) {
            //     return redirect()->route('members.index')->with('error', 'Tidak dapat menghapus anggota. Anggota ini masih memiliki buku yang dipinjam.');
            // }
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani jika ada error foreign key constraint
            return redirect()->route('members.index')->with('error', 'Gagal menghapus anggota. Mungkin anggota ini masih terkait dengan data peminjaman.');
        }
    }
}