<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $uploadedFile = $request->file('file');

        $img = Image::make($uploadedFile->path());
        $img->crop(10,10);
        $filename     = time() . $uploadedFile->getClientOriginalName();
        $path_cache = storage_path('framework/cache/'.$filename);
        $img->save($path_cache);
        /** @var File $cccm */
        $cccm = new File($path_cache);
        $f = $cccm->move(storage_path());

        Storage::disk('public')
               ->putFileAs('files/' . $filename, $f, $filename);
        $upload           = new Upload;
        $upload->filename = $filename;
        $upload->save();

        return response()->json($upload);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
