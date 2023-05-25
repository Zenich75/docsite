<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfirmationRequest;
use App\Http\Requests\UpdateConfirmationRequest;
use App\Models\Confirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        //$res = Confirmation::where('user_id', $user->id);
        $res = Confirmation::where('user_id', $user->id)->get();

        return view('confirmation',[
            'confirmations' => $res,
        ]);
    }

    public function download(Request $request, $id)
    {
        $user = Auth::user();
        $fileData = Confirmation::where('user_id', $user->id)
            ->where('file_id', $id)
            ->first();

        return Storage::download($fileData->file->filename, $fileData->file->original_name);
    }


    public function confirm(Request $request, $id)
    {
        $user = Auth::user();
        Confirmation::where('user_id', $user->id)
            ->where('id', $id)
            ->update(['confirmed_at' => Carbon::now()]);

        return redirect()->back();
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
    public function store(StoreConfirmationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Confirmation $confirmation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmation $confirmation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfirmationRequest $request, Confirmation $confirmation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Confirmation $confirmation)
    {
        //
    }
}
