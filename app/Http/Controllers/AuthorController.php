<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        $table = Author::all();

        return response()->json([
            'success'   => 201,
            'data'      => $table,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Author::create([
            "name"                  => $request->name,
            "date_of_birth"         => $request->date_of_birth,
            "place_of_birth"        => $request->place_of_birth,
            "gender"                => $request->gender,
            "email"                 => $request->email,
            "no_hp"                 => $request->no_hp
        ]);

        return response()->json([
            'success'   => 201,
            'message'   => 'data berhasil disimpan',
            'data'      => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Author::where('id', $id)->first();
        if ($table) {
            return response()->json([
                'success'   => 200,
                'data'      => $table
            ], 200);
        } else {
            return response()->json([
                'failed'    => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan',
                'data'      => $table
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Author::find($id);
        if ($table) {
            $table->update([
                "name"           => $request->name ? $request->name : $table->name,
                "date_of_birth"     => $request->date_of_birth ? $request->date_of_birth : $table->date_of_birth,
                "place_of_birth"          => $request->place_of_birth ? $request->place_of_birth : $table->place_of_birth,
                "gender"       => $request->gender ? $request->gender : $table->gender,
                "email"   => $request->email ? $request->email : $table->email,
                "no_hp"        => $request->no_hp ? $request->no_hp : $table->no_hp
            ]);
            return response()->json([
                'success'   => 203,
                'message'   => 'update berhasil',
                'data'      => $table
            ], 203);
        } else {
            return response()->json([
                'failed'   => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Author::find($id);
        if ($table) {
            $table->delete();
            return response()->json([
                'success'   => 200,
                'message'   => 'data berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'failed'   => 404,
                'message'   => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
