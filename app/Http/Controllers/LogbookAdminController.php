<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;

class LogbookAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Ensure only admin can access
    }
    
    public function index()
    {
        //
        try {
            $logbook = Logbook::with('logbookUser:id,no_id,name')
                ->paginate(10);

            return view('logbook.index', compact('logbook'));

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengambil data logbook: ' . $e->getMessage()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $logbook = Logbook::where('id',$id)->firstOrFail();

            return view('logbook.show',compact('logbook'));
        } catch (\Exception $e) {
           return redirect()->back()->withErrors('Terjadi kesalahan saat mencari katalog'.$e->getMessage())->withInput();
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
        //
        try {
            $logbook = Logbook::where('id',$id)->firstOrFail();

            $validated = $request->validate([
                'description' => 'nullable|string',
            ]);

            $logbook->update($validated);

            return redirect()->route('logbook.index');
        }  catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('logbook.index')->withErrors('Katalog tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui katalog: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $logbook = Logbook::where('id', $id)->firstOrFail();
            $logbook->delete();

            return redirect()->route('logbook.index')->with('success', 'Katalog berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('logbook.index')->withErrors('Katalog tidak ditemukan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus katalog: ' . $e->getMessage());
        }

    }
}
