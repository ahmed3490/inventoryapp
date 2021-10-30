<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>All Brands</b>
            
           
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
                    All Brands
                </div>
        
<table class="table">
  <thead>
    <tr>
     <th scope="col">SL No</th>
      <th scope="col">Brand name</th>
      <th scope="col">Brand Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>

  <tbody>
      <!--  @php($i = 1) -->
    @foreach($brands as $brand)
    <tr>

      <th scope="row">{{ $brands->firstItem()+$loop->index   }}</th>

      <td>{{ $brand->brand_name }}</td>
      <td><img src="{{asset($brand->brand_image)}}" style = "height:70px; width:70px;" alt=""></td>

     <td>      
        @if($brand->created_at == NULL)
            <span class = "text-danger">No Data Set</span>
        @else
        {{Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
        @endif
     </td>


        <td>
            <a href="{{ url('brand/edit/'.$brand->id)   }}" class = "btn btn-info">Edit</a>
            <a href= "{{ url('brand/delete/'.$brand->id)  }}" onclick= "return confirm('Are you sure?')" class = "btn btn-danger">Delete</a>
        </td>

    </tr>
    @endforeach

  </tbody>
</table>
     {{$brands->links()}}
   

</div>
    </div>

    <div class = "col-md-4">
            <div class="card">
                <div class="card-header">Add Brand</div><br>
                <div class = "card-body">
                
    <form action = "{{ route('store.brand') }}" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name ="brand_name" class="form-control">
        @error('brand_name')
            <span class ="text-danger">{{$message}}</span>
        @enderror
        </div>

<br>
        <div class="form-group">
            <label>Brand Image</label>
            <input type="file" name ="brand_image" class="form-control">
        @error('brand_image')
            <span class ="text-danger">{{$message}}</span>
        @enderror
        </div>





        
        <br>
        <button type="submit" class="btn btn-primary">Add Brand</button><br><br>
   </form>
        </div>
            </div> 
                </div>    

            </div>
        </div>


     
    </div>
</x-app-layout>
