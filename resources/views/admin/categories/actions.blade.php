<div class="modal fade" id="edit-category{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
            <h4 class="text-warning modal-title"><i class="fa-solid fa-pen"></i>Edit Category</h4>
        </div>
        <form action="{{route('admin.categories.update',$category->id)}}" method="post">
            @csrf
            @method('PATCH')
           <div class="modal-body">
                <input type="textarea" name="category_name" id="category_name" value="{{$category->name}}" class="outline-light">
            </div>
            {{-- @error
            @enderror --}}
        <div class="modal-footer border-0">
              
                <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-warning">Cancel</button>
                <button type="submit" class="btn btn-sm btn-warning">Update</button>
          
        </div>
    </form>

      </div>
    </div>

</div>