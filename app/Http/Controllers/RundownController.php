<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rundown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RundownController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $rundowns = Rundown::with('event')
            ->latest('tanggal')
            ->latest('waktu_mulai')
            ->get();

        return view('eo.rundown.index', compact(
            'user',
            'rundowns'
        ));
    }


    public function create()
    {
        $user = Auth::user();

        $events = Event::latest()->get();

        return view('eo.rundown.create', compact(
            'user',
            'events'
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'event_id' => [
                'required',
                'exists:events,id'
            ],

            'nama_rundown' => [
                'required',
                'string',
                'max:255'
            ],

            'deskripsi' => [
                'nullable',
                'string'
            ],

            'tanggal' => [
                'required',
                'date'
            ],

            'waktu_mulai' => [
                'required',
                'date_format:H:i'
            ],

            'waktu_selesai' => [
                'required',
                'date_format:H:i',
                'after_or_equal:waktu_mulai'
            ],

            'lokasi' => [
                'required',
                'string',
                'max:255'
            ],

            'latitude' => [
                'nullable',
                'numeric',
                'between:-90,90'
            ],

            'longitude' => [
                'nullable',
                'numeric',
                'between:-180,180'
            ],

            'penanggung_jawab' => [
                'nullable',
                'string',
                'max:255'
            ],

            'status' => [
                'required',
                'in:draft,aktif,selesai'
            ],

        ]);


        Rundown::create($validated);


        return redirect()
            ->route('eo.rundown.index')
            ->with(
                'success',
                'Rundown berhasil ditambahkan.'
            );
    }


    public function show(Rundown $rundown)
    {
        $user = Auth::user();

        $rundown->load('event');

        return view(
            'eo.rundown.show',
            compact(
                'user',
                'rundown'
            )
        );
    }


    public function edit(Rundown $rundown)
    {
        $user = Auth::user();

        $events = Event::latest()->get();

        return view(
            'eo.rundown.edit',
            compact(
                'user',
                'events',
                'rundown'
            )
        );
    }


    public function update(
        Request $request,
        Rundown $rundown
    ) {

        $validated = $request->validate([

            'event_id' => [
                'required',
                'exists:events,id'
            ],

            'nama_rundown' => [
                'required',
                'string',
                'max:255'
            ],

            'deskripsi' => [
                'nullable',
                'string'
            ],

            'tanggal' => [
                'required',
                'date'
            ],

            'waktu_mulai' => [
                'required',
                'date_format:H:i'
            ],

            'waktu_selesai' => [
                'required',
                'date_format:H:i',
                'after_or_equal:waktu_mulai'
            ],

            'lokasi' => [
                'required',
                'string',
                'max:255'
            ],

            'latitude' => [
                'nullable',
                'numeric',
                'between:-90,90'
            ],

            'longitude' => [
                'nullable',
                'numeric',
                'between:-180,180'
            ],

            'penanggung_jawab' => [
                'nullable',
                'string',
                'max:255'
            ],

            'status' => [
                'required',
                'in:draft,aktif,selesai'
            ],

        ]);


        $rundown->update($validated);


        return redirect()
            ->route('eo.rundown.index')
            ->with(
                'success',
                'Rundown berhasil diperbarui.'
            );
    }


    public function destroy(Rundown $rundown)
    {
        $rundown->delete();

        return redirect()
            ->route('eo.rundown.index')
            ->with(
                'success',
                'Rundown berhasil dihapus.'
            );
    }
}