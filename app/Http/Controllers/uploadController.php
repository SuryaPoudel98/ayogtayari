<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function uploadprofile(Request $request)
    {
        try {
            // $file = $request->file;
            $imageName = $request->imageName;
            \Image::make($request->file)->save(public_path('profilepicture/') . $imageName);
            Users::where('password', '=', session()->get('sessionUserId'))->update([
                'thumbnail' => $imageName,
            ]);
            return json_encode(array(
                'status' => true, 'imageFile' =>  $imageName
            ));
        } catch (Exception $ex) {
            return json_encode(array(
                'status' => true, 'exception' => $ex
            ));
        }
    }

    public function uploadImage(Request $request)
    {
        // return $request->all();

        try {
            $file = $request->file;
            $imageName = $request->imageName;
            \Image::make($request->file)->save(public_path('uploads/Postimg/') . $imageName);

            return json_encode(array(
                'status' => true, 'imageFile' =>  $imageName
            ));
        } catch (Exception $ex) {
            return json_encode(array(
                'status' => true, 'exception' => $ex
            ));
        }
    }


    public function uploadNote(Request $request)
    {


        try {

            $request->validate([
                'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
            ]);

            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('file'), $fileName);
            return json_encode(array(
                'status' => true, 'noteFile' =>  $fileName
            ));
        } catch (Exception $ex) {
            return json_encode(array(
                'status' => true, 'exception' => $ex
            ));
        }
    }

    public function uploadVideo(Request $request)
    {


        try {

            // $request->validate([
            //     'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
            // ]);

            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('file'), $fileName);
            return json_encode(array(
                'status' => true, 'videoFile' =>  $fileName
            ));
        } catch (Exception $ex) {
            return json_encode(array(
                'status' => true, 'exception' => $ex
            ));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
