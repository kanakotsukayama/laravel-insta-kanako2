{{-- @if(!$category->trashed()) --}}

<div class="modal fade" id="delete-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
            <h4 class="text-danger modal-title"><i class="fa-solid fa-eye-slash"></i>Delete</h4>
        </div>
        <div class="modal-body">
            Are you sure you want to delete
            <span class="fw-bold">{{ $category->name}}</span> category?
            <br>
            <p>This action will affect all the posts under this category. Posts without a category will fall under Uncategorised</p>
        </div>
        <div class="modal-footer border-0">
            <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>

      </div>
    </div>

</div>
