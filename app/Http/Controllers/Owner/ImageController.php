<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;

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
        $imageFiles = $request->file('files');
        dd($imageFiles);
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
                $fileNameToStore = ImageService::upload($imageFile, 'products');
                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' => $fileNameToStore
                ]);
            }
        }

        return redirect()
                    ->route('owner.images.index')
                    ->with(['message' => '画像登録を実施しました。','status' => 'success']);
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('owner.images.edit',compact('image'));
    
    }

    public function update(UploadImageRequest $request, $id)
    {
        $image = Image::findorFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()
        ->route('owner.images.index')
        ->with(['message' => '画像タイトルを更新しました。','status' => 'info']);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/products/'. $image->filename;

        $imageInItems = Item::where('image1',$image->id)
        ->orWhere('image2',$image->id)
        ->orWhere('image3',$image->id)
        ->orWhere('image4',$image->id)
        ->get();

        if($imageInItems){
            $imageInItems->each(function($item)use($image){
                if($item->image1 === $image->id){
                    $item->image1 = null;
                    $item->save();
                }
                if($item->image2 === $image->id){
                    $item->image2 = null;
                    $item->save();
                }
                if($item->image3 === $image->id){
                    $item->image3 = null;
                    $item->save();
                }
                if($item->image4 === $image->id){
                    $item->image4 = null;
                    $item->save();
                }
            });
        }

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }
        Image::findOrFail($id)->delete();
        
        return redirect()->route('owner.images.index');
    }
}
