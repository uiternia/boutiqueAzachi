<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:owners');

        $this->middleware(function($request, $next){
            $id = $request->route()->parameter('image'); 
            if(!is_null($id)){ 
            $imageOwnerId = Image::findOrFail($id)->owner->id;
            $imageId = (int)$imageOwnerId;
            if($imageId !== Auth::id()){ 
            abort(404); 
            }
            }
            return $next($request);
            });
    }

    public function index()
    {
        $images = Image::where('owner_id',Auth::id())
        ->orderBy('updated_at','desc')
        ->paginate(20);

        return view('owner.images.index',
        compact('images'));
    }


    public function create()
    {
        return view('owner.images.create');
    }

    public function store(UploadImageRequest $request)
    {
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid())
        {
            $fileNameToStore = ImageService::upload($imageFile,'products');
        }
        image::create([
            'owner_id' => Auth::id(),
            'filename' => $fileNameToStore,
        ]);
        
        return redirect()->route('owner.images.index')
        ->with(['message' => '商品用画像を登録しました。',
                'status' => 'success']);
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('owner.images.edit',compact('image'));
    
    }

    public function update(UploadImageRequest $request, $id)
    {
        $image = Image::findOrFail($id);
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid())
        {
            $fileNameToStore = ImageService::upload($imageFile,'products');
        }
        $image->filename = $fileNameToStore;
        $image->save();
        return redirect()->route('owner.images.index')
        ->with(['message' => '画像を変更しました。',
                'status' => 'success']);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/products/'. $image->filename;
        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }
        Image::findOrFail($id)->delete();
        
        return redirect()->route('owner.images.index');
    }
}
