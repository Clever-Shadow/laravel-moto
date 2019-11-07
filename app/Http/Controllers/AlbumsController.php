<?php
namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Validator;
use App\Album;
use DB;

class AlbumsController extends Controller
{
    public function getList()
	{
		$albums = Album::with('Photos')->get();
		return view('index')->with('albums',$albums);
	}

  public function getAlbum($id)
  {
		$album = Album::with('Photos')->find($id);
		$albums = Album::with('Photos')->get();
		return view('album', ['album'=>$album, 'albums'=>$albums]);
  }

  public function getForm()
  {
      return view('createalbum');
  }

  public function postCreate(Request $request)
  {
      $rules = ['name' => 'required', 'cover_image'=>'required|image'];

      $input = ['name' => null];

      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return redirect()->route('create_album_form')->withErrors($validator)->withInput();
      }

      $file = $request->file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_cover.'.$extension;
      $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'cover_image' => $filename,
      ));

      return redirect()->route('show_album',['id'=>$album->id]);
  }

	public function getDelete($id)
	{
		$album = Album::find($id);
		$album->delete();
		return redirect()->route('index');
	}
}
