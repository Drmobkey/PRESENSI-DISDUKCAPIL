<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        try {
            $userId = Auth::user()->no_id;
            $logbook = Logbook::where('user_id', $userId)
                ->with('logbookUser:id,no_id,name')
                ->paginate(10);
                return response()->json($logbook);
            // return view('logbook.index', compact('logbook'));

        } catch (\Exception $e) {
            return 0;
            // return back()->withErrors(['error' => 'Terjadi kesalahan saat mengambil data logbook: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $userId = Auth::user()->no_id;
            $validated = $request->validate([
                'description' => 'required|string'
            ]);

            Logbook::create([
                'description' => $validated['description'],
                'user_id' => $userId
            ]);
            // return redirect()->route('logbook.index')->with('success', 'logbook berhasil ditambahkan');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menambah logbook' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $userId = Auth::user()->no_id;
            $logbook = Logbook::where('id', $id)->where('user_id', $userId)->firstOrFail();

            return view('logbook.show', compact('logbook'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat mencari logbook' . $e->getMessage())->withInput();
        }

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
        try {
            $userId = Auth::user()->no_id;
            $logbook = logbook::where('id', $id)->where('user_id', $userId)->firstOrFail();

            $validated = $request->validate([
                'description' => 'nullable|string',
            ]);

            $logbook->update($validated);

            return redirect()->route('logbook.index')->with('success', 'logbook berhasil diperbarui');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('logbook.index')->withErrors('logbook tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui logbook: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $userId = Auth::user()->no_id;
            $logbook = Logbook::where('id', $id)->where('user_id', $userId)->firstOrFail();
            $logbook->delete();

            return redirect()->route('logbook.index')->with('success', 'logbook berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('logbook.index')->withErrors('logbook tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus logbook: ' . $e->getMessage());
        }
    }
}
