<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All<b>Categories</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4">
               

</div>
    </div>

    <div class = "col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div><br>
                <div class = "card-body">
                
    <form action = "{{ url('category/update/' .$categories->id)  }}" method = "POST">
        @csrf
        <div class="form-group">
            <label>Update Category Name</label>
            <input type="text" name ="category_name" class="form-control" value= "{{ $categories->category_name }}">
        @error('category_name')
            <span class ="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Add Category</button><br><br>
   </form>
        </div>
            </div> 
                </div>    









            </div>
        </div>
     
    </div>
</x-app-layout>
