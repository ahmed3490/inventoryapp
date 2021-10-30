<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //view all categories function
  public function AllCat(){
/*   $categories = DB::table('categories')
              ->join('users','categories.user_id','users.id')
              ->select('categories.*','users.name')
              ->latest()->paginate(5); */
      $categories = Category::latest()->paginate(5);
      $trashedCat = Category::onlyTrashed()->latest()->paginate(5);
   /*$categories = DB::table('categories')->latest()->paginate(5); */
        return view('admin.category.index',compact('categories','trashedCat'));
    }


    //add category function
    public function AddCat(Request $request ){
        $validatedData = $request->validate([
          'category_name' => 'required|unique:categories|max:255',
        ],

        [
            'category_name.required' => 'Please Input Category Name!',
            'category_name.max' => 'Category name must be less than 255 characters',
        ]);

   //insert category function
         Category::insert([
            'category_name'=> $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
          ]); 
        return Redirect()->back()->with('success','Category inserted sucessfully');
    }


   //edit category function
   public function Edit($id){
      $categories= Category::find($id);
      
      return view('admin.category.edit',compact('categories'));
   }

   //update category function
   public function Update(Request $request , $id){
       $update = Category::find($id)->update([
         'category_name' => $request->category_name,
         'user_id' => Auth::user()->id
       ]);

       return Redirect()->route('all.category')->with('success','Category updated successfully!');
   }


   //Softdelete function
   public function Softdelete($id){
     $delete = Category::find($id)->delete();
     return Redirect()->back()->with('success','Category deleted successfully');
   }

    //Restored deleted category function
    public function Restore($id){
      $delete = Category::withTrashed()->find($id)->restore();
      return Redirect()->back()->with('success','Category restored successfully');
    }



    //PDelete category function
    public function Pdelete($id){
      $delete = Category::onlyTrashed()->find($id)->forceDelete();
      return Redirect()->back()->with('success','Category Permenantly deleted successfully');
    }

}
