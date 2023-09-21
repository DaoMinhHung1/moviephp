<?php

namespace App\Http\Controllers;

use App\Models\Flims;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
   public function index()
   {

      $flims = Flims::all();
      return response()->json($flims);
   }
   public function genres()
   {
      $genres = Genres::all();
      return response()->json($genres);
   }
   public function store(Request $request)
   {
      $request->validate([
         'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Thêm wildcard *
      ]);
      $flim = new Flims();

      $flim->title = $request->input('title');
      $flim->description = $request->input('description');
      $flim->year = $request->input('year');
      $flim->director = $request->input('director');
      $flim->cast = $request->input('cast');
      $flim->country = $request->input('country');
      $flim->duration = $request->input('duration');
      $flim->rating = $request->input('rating');

      if ($request->hasFile('image')) {
         $imageFile = $request->file('image'); // Lấy ảnh đầu tiên trong danh sách
         if ($imageFile->isValid()) {
            $ext = $imageFile->extension();
            $imgext = time() .  uniqid() . '.' . $ext;
            $imagePath = $imageFile->storeAs('public/images/', $imgext);
            $uploadedImage = $imgext; // Lưu tên ảnh

         }
      }
      $flim->image = $uploadedImage;

      $flim->status = $request->input('status');
      $flim->language = $request->input('language');
      $flim->trailer = $request->input('trailer');
      $flim->video = $request->input('video');
      $flim->genres_id = $request->input('genres_id');

      $flim->save();

      return response()->json(['message' => 'Film created successfully']);
   }

   public function filmdetail($id)
   {
      $flim = Flims::find($id);
      return response()->json($flim);
   }

   public function flimupdate(Request $request, $id)
   {
      $request->validate([
         'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Thêm wildcard *
      ]);

      // Tìm phim cần chỉnh sửa
      $film = Flims::findOrFail($id);

      // Cập nhật thông tin phim từ request
      $film->title = $request->input('title');
      $film->description = $request->input('description');
      $film->year = $request->input('year');
      $film->director = $request->input('director');
      $film->cast = $request->input('cast');
      $film->country = $request->input('country');
      $film->duration = $request->input('duration');
      $film->rating = $request->input('rating');

      // Xử lý và lưu ảnh nếu có
      if ($request->hasFile('image')) {
         $imageFile = $request->file('image');
         if ($imageFile->isValid()) {
            $ext = $imageFile->extension();
            $imgext = time() .  uniqid() . '.' . $ext;
            $imagePath = $imageFile->storeAs('public/images/', $imgext);
            $uploadedImage = $imgext; // Lưu tên ảnh mới

            // Xóa ảnh cũ (nếu có) và cập nhật tên ảnh mới
            if ($film->image) {
               Storage::delete('public/images/' . $film->image);
            }
            $film->image = $uploadedImage;
         }
      }

      $film->status = $request->input('status');
      $film->language = $request->input('language');
      $film->trailer = $request->input('trailer');
      $film->video = $request->input('video');
      $film->genres_id = $request->input('genres_id');

      $film->save();

      return response()->json(['message' => 'Film updated successfully']);
   }
   public function flimdelete($id)
   {
      $film = Flims::find($id);
      if (!$film) {
         return response()->json(['message' => 'Film not found'], 404);
      }
      $film->delete();
      return response()->json(['message' => 'Film deleted successfully']);
   }
}
