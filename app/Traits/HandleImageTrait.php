<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait HandleImageTrait
{
    protected string $path = 'public/upload/users/';

    /**
     * @param $request
     * @return mixed
     */
    public function verify($request)
    {
        return $request->has('image');
    }

    /**
     * @param $request
     * @return string|void
     */
    public function saveImage($request)
    {
        if ($this->verify($request)) {
            $manager = new ImageManager(new Driver());
            $file = $request->file('image');
            // dd($request);
            // dd($file);exit;
            $name = time() . preg_replace("/( |　)/", "", $file->getClientOriginalName() );
            $img = $manager->read($request->file('image'));
            $img = $img->resize(300, 300);
            $img->toJpeg(80)->save(base_path('public/upload/users/'.$name));
            $save_url = 'uploads/users/'.$name;

            // $file = $request->file('image');
            // $name = time() . $file->getClientOriginalName();
            // $extension = $file->getClientOriginalExtension();
            // $image = Image::make($file)->resize(300, 300);
            // Storage::put($this->path . $name, $image);

            return $name;
        }
    }

    /**
     * @paramfilesystems $request
     * @param $request
     * @param $currentImage
     * @return mixed|string|null
     */
    public function updateImage($request, $currentImage)
    {
        if($this->verify($request))
        {
            // dd($currentImage);exit;
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }

    /**
     * @param $imageName
     * @return void
     */
    public function deleteImage($imageName)
    {
        if($imageName && file_exists($this->path .$imageName))
        {
            unlink($this->path .$imageName);
        }
    }
}
