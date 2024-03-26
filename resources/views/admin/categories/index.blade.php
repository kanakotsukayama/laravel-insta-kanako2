@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')

<form action="{{route('admin.categories.store')}}" method="post" class="row gx-2 mb-4">
    @csrf
    <div class="col-4">
    <input type="text" name="name" value="{{old('name')}}" placeholder="Add a category...">
     {{-- <textarea name="category" id="category" placeholder="Add a category..." class="form-control"></textarea> --}}
     <button type="submit" class="btn btn-primary mt-4 px-4">Add</button>
     @error('name')
     <span class="d-block text-danger small">{{$message}}</span>
     @enderror
</div>
</form>  


<br>


<table class="table border table-hover bg-white text-muted align-middle">
    <thead class="table-warning text-muted text-uppercase">
        <th>#</th>
        <th>Name</th>
        <th>Count</th>
        <th>Last Updated</th>
        <th></th>
    </thead>

    <tbody>
        @forelse($all_categories as $category)
        <tr>

            <td>
                {{-- #category_id --}}
               {{$category->id}}
            </td>

            <td>
                 <div class="col-auto">
                     {{ $category->name }}
                   </div>
             
            </td>

            <td>
                {{-- count --}}
                {{-- @if($category->categoryPosts as $category_post)
                <div class="col-auto"> --}}
                    {{ $category->categoryPosts->count() }}
                  {{-- </div>
               @endif --}}
            </td>

            <td>
                {{-- last updated --}}
                {{$category->updated_at}}
            </td>

            <td>
                {{-- edit/delete --}}
                <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#edit-category{{$category->id}}">
                    <i class="fa-solid fa-pen"></i>
                </button>
                @include('admin.categories.actions')
              {{-- @if($category->trashed()) --}}
               {{-- <a href="{{route('admin.categories.destory', $category->id)}}"> --}}
                {{-- delete button --}}
                <button class="btn btn-sm btn-outline-danger"data-bs-toggle="modal" data-bs-target="#delete-category{{$category->id}}">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                {{-- @else --}}
                
                @include('admin.categories.delete')
            {{-- </a> --}}

            </td>
        </tr>
        @empty 
        <tr>
            <td colspan="5" >No categories found.</td>
        </tr>
      @endforelse
      <tr>
        <td>0</td>
        <td>Uncategorized</td>
        <td>{{$uncategorized_count}}</td>
        <td></td>
        <td></td>
      </tr>
   </tbody>
</table>
{{-- {{$all_categories->links()}} --}}
    </tbody>
</table>

@endsection