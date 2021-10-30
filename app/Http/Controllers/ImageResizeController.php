<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests;
use Illuminate\Support\Carbon;
use Image;
  
class ImageResizeController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage()
    {
        return view('upload');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->extension();
     
        $destinationPath = ('images/thumbnail');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = ('images/uploaded');
        $image->move($destinationPath, $input['imagename']);
   










        
        Brand::insert([
            'brand_name' => $request->title,
            'brand_image' => $destinationPath,
            'created_at' => Carbon::now()
         ]);



        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$input['imagename']);
    }
   
}