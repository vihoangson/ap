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
    public function uploadFile($f,$filename=null)
    {
        $path = 'files/' . $filename;
        Storage::disk('public')
               ->putFileAs($path, $f, $filename);
        $upload           = new Upload;
        $upload->filename = $filename;

        $upload->save();
        return $upload;
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
        $filename = $request->input('filename');
        if(!(substr($uploadedFile->getMimeType(), 0, 5) == 'image')) {
            $filename = time().'_'.$filename;
            $f = $uploadedFile;
            $upload = $this->uploadFile($f,$filename);
            return $upload;
        }

        $uploadedFile->getClientOriginalExtension();
        $image = Image::make($uploadedFile->path())->orientate();
        $filename_hashed = time().'_'.md5($uploadedFile->getClientOriginalName()).'.'.$uploadedFile->getClientOriginalExtension();
        $image->save(storage_path('framework/cache/'.'origin_'.$filename_hashed));
        if($image->width()>1000 && $image->height()>1000){
            $image->fit(1000, 1000)->save(storage_path('framework/cache/'.'huge_'.$filename_hashed));
        }
        if($image->width()>600 && $image->height()>600) {
            $image->fit(600, 600)
                  ->save(storage_path('framework/cache/' . 'large_' . $filename_hashed));
        }
        if($image->width()>400 && $image->height()>400){
            $image->fit(400, 400)->save(storage_path('framework/cache/'.'medium_'.$filename_hashed));
        }

        $image->fit(300, 300)->save(storage_path('framework/cache/'.'thumbnail_'.$filename_hashed));

        $img = Image::make($uploadedFile->path());
        // $img->resize(100,100);
        if($image->width()>650 && $image->height()>650){
            $img->orientate()->fit(650,650);
        }

        $filename     = time() . $uploadedFile->getClientOriginalName();
        $path_cache = storage_path('framework/cache/'.$filename);
        $img->save($path_cache);
        /** @var File $cccm */
        $cccm = new File($path_cache);
        $f = $cccm->move(storage_path());

        $upload = $this->uploadFile($f,$filename);

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
        return Upload::find($id);
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
