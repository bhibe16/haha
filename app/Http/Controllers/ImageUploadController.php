<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    // This function handles the request and calls the uploadImage function
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Call the uploadImage function and pass the image
        $imageName = $this->uploadImage($request->file('image'));

        return back()
            ->with('success', 'Image uploaded successfully')
            ->with('image', $imageName);
    }

    // Reusable function to handle image upload
    public function uploadImage($image)
{
    $imageName = time() . '_' . $image->getClientOriginalName();
    $imagePath = $image->storeAs('public/images', $imageName);

    // Return the full path relative to the storage
    return 'images/' . $imageName; // This will be used for display later
}

}
