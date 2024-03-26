@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')


      <form action="{{route('admin.posts')}}" method="get" style="width:10rem" class="">
        <input type="text" name="search" value="" placeholder="Search..." class="form-control form-control-sm">
      </form>


<br>

{{-- @if($search)
  <h5 class="text-muted mb-3 fw-light">Search results for "<span class="fw-bold">{{$search}}</span>"</h5>
@endif --}}

<br>

<table class="table border table-hover bg-white text-muted align-middle">
    <thead class="table-primary text-muted small text-uppercase">
        <th></th>
        <th></th>
        <th>CATEGORY</th>
        <th>OWNER</th>
        <th>CREATED AT</th>
        <th>STATUS</th>
        <th></th>

    </thead>

    <tbody>
        @forelse($all_posts as $post)
            <tr>
                <td>
                    {{-- post_id --}}
                     {{$post->id}}
                </td>
                <td>
                    {{-- post image --}}
                    <a href="{{ route('post.show', $post->id)}}">
                        <img src="{{$post->image}}" alt="" class="col-auto image-lg">
                    </a>
                </td>
        
                <td>
                        {{-- list of categories --}}
                   @forelse($post->categoryPosts as $category_post)
                      <div class="badge bg-secondary bg-opacity-50">
                           {{ $category_post->category->name }}
                      </div>
                    @empty 
                         <div class="badge bg-dark">Uncategorized</div>
                    @endforelse
                </td>

                <td>
                {{-- Owner and created at --}}
             <a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-dark fw-bold">
                 {{$post->user->name}}
             </a>
                </td>
                <td>{{ $post->created_at }}</td>


                <td>
                    {{-- STATUS --}}
                    @if($post->trashed())
                      <i class="fa-solid fa-circle "></i> Hide
                    @else
                    <i class="fa-solid fa-circle text-success"></i> Visible
                    @endif

                </td>
                <td>
                    @if($post->id != Auth::user()->id)  
                    <div class="dropdown">
                      <button class="btn btn-sm" data-bs-toggle="dropdown">
                          <i class="fa-solid fa-ellipsis"></i>
                      </button>
  
  
                      <div class="dropdown-menu">
                          @if($post->trashed())
                              <button class="dropdown-item text-dark" data-bs-toggle="modal" data-bs-target="#activate-post{{$post->id}}">
                                  <i class="fa-solid fa-user-check fa-eye text-primary"></i> Unhide Post {{$post->id}}
                              </button>
                          @else
                              <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-post{{$post->id}}">
                                 <i class="fa-solid fa-eye-slash text-danger"></i>Hide Post {{$post->id}}
                              </button>
                          @endif
                      </div>
                      @include('admin.posts.status')
                    </div>
                    @endif
                </td>
                    
            </tr>
        @empty 
            <tr>
                <td colspan="6" style="text-center text-muted">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{{$all_posts->links()}}
@endsection