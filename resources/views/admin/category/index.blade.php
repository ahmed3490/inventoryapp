<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All<b>Categories</b>
            
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
            <div class = "row">

                <div class = "col-md-8">
                    <div class="card">

    @include('flash-message')
    @yield('content')



                <div class="card-header">
                    All Categories
                </div>
        


            <table class="table">
  <thead>
    <tr>
     <th scope="col">SL No</th>
      <th scope="col">Category name</th>
      <th scope="col">User name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

   <!--  @php($i = 1) -->
    @foreach($categories as $category)
  
    <tr>
      <th scope="row">{{ $categories->firstItem()+$loop->index   }}</th>
      <td>{{ $category->category_name }}</td>
      <td>{{ $category->user->name }}</td>

     <td>      
        @if($category->created_at == NULL)
            <span class = "text-danger">No Data Set</span>
        @else
        {{Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
        @endif
        </td>


        <td>
            <a href="{{ url('category/edit/'.$category->id)   }}" class = "btn btn-info">Edit</a>
            <a href= "{{ url('softdelete/category/'.$category->id)  }}" class = "btn btn-danger">Delete</a>
        </td>
   
    </tr>
    @endforeach
      
  </tbody>
</table>
    {{$categories->links()}}

</div>
    </div>

    <div class = "col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div><br>
                <div class = "card-body">
                
    <form action = "{{route('store.category')}}" method = "POST">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name ="category_name" class="form-control">
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

<br>
      <!-- Trashed categories display -->
      <div class = "container">
            <div class = "row">

                <div class = "col-md-8">
                    <div class="card">

                <div class="card-header">
                    Trash list
                </div>
        


            <table class="table">
  <thead>
    <tr>
     <th scope="col">SL No</th>
      <th scope="col">Category name</th>
      <th scope="col">User name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

 
    @foreach($trashedCat as $category)
  
    <tr>
      <th scope="row">{{ $categories->firstItem()+$loop->index   }}</th>
      <td>{{ $category->category_name }}</td>
      <td>{{ $category->user->name }}</td>

     <td>      
        @if($category->created_at == NULL)
            <span class = "text-danger">No Data Set</span>
        @else
        {{Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
        @endif
        </td>


        <td>
            <a href="{{ url('category/restore/'.$category->id)   }}" class = "btn btn-info">Restore</a>
            <a href="{{ url('pdelete/category/'.$category->id)   }}" class = "btn btn-danger">P Delete</a>
        </td>
   
    </tr>
    @endforeach
      
  </tbody>
</table>
    {{$trashedCat->links()}}

</div>
    </div>

    <div class = "col-md-4">
           
    </div>
        </div>

        <!-- End of trash list -->
     
    </div>
</x-app-layout>
