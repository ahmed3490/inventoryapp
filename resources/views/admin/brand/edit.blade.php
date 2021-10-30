<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>All Brands</b>
        </h2>
    </x-slot>

    @include('flash-message')
    @yield('content')
    <div class="py-12">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4">
               

</div>
    </div>

    <div class = "col-md-8">
            <div class="card">
                <div class="card-header">Edit Brand</div><br>
                <div class = "card-body">
                
    <form action = "{{ url('brand/update/' .$brands->id)  }}" method = "POST" enctype="multipart/form-data"> 
        @csrf

    <input type="hidden" name="old_image" value = "{{$brands->brand_image}}">
        <div class="form-group">
            <label>Update Brand Name</label><br><br>
            <input type="text" name ="brand_name" class="form-control" value= "{{ $brands->brand_name }}">
        @error('brand_name')
            <span class ="text-danger">{{$message}}</span>
        @enderror
        </div>

<br>
        <div class="form-group">
            <label>Update Brand Image</label><br><br>
            <input type="file" name ="brand_image" class="form-control" value= "{{ $brands->brand_image }}">
        @error('brand_image')
            <span class ="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <img src="{{asset($brands->brand_image)}}" style = "width: 400px; height: 400px;" alt="">
        </div>

        
        <br>
        <button type="submit" class="btn btn-primary">Update</button><br><br>
   </form>
        </div>
            </div> 
                </div>    









            </div>
        </div>
     
    </div>
</x-app-layout>
