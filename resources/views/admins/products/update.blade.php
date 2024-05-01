@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product update</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
        </div>
        <div class="row">
        <form class="form-product" method="post" action="{{route('product-update', ['id' => $product->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="name" value="{{$product->name}}" required>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ ($product->category_id == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label">Cost</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cost" name="cost" value="{{$product->cost}}" required>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label">Discount (%)</label>
                    <div class="col-sm-10">
                        <input type="number" max="100" class="form-control" id="discount" name="discount" value="{{$product->discount}}">
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label">Options</label>
                    <div class="col-sm-9">
                        <div class="area-option">
                            @foreach ($product->options as $option)
                                <div class="custom-border mb-3">
                                    <div class="mb-3 row">
                                        <label for="nameOption" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nameOption" name="option[{{$option->id}}][name_option]" value="{{$option->name_option}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="valueOption" class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="valueOption" name="option[{{$option->id}}][value_option]" value="{{$option->value_option}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="oldValueOption" class="col-sm-2 col-form-label">Old value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="oldValueOption" name="option[{{$option->id}}][old_value_option]" value="{{$option->old_value_option}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="useOption" class="col-sm-2 col-form-label">Use</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="option[{{$option->id}}][use_option]" {{ ($option->use_option == 0) ? 'checked' : '' }}>
                                                <label class="form-check-label" >
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="option[{{$option->id}}][use_option]"  {{ ($option->use_option == 1) ? 'checked' : '' }}>
                                                <label class="form-check-label" >
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        
                    </div>
                    <div class="col-sm-1">
                        <a class="btn btn-info btn__add-option" data-quantity="{{count($product->options)}}" style="margin-left: 12px;">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        </a>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a href="{{ route('product-list') }}" class="btn btn-outline-dark">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let quantity = $('.custom-border').length;
        $('.btn__add-option').click(function() {
            quantity++;
            $('.area-option').append(`<div class="custom-border mb-3">
                                    <div class="mb-3 row">
                                        <label for="nameOption" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nameOption" name="option[${quantity+1}][name_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="valueOption" class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="valueOption" name="option[${quantity+1}][value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="oldValueOption" class="col-sm-2 col-form-label">Old value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="oldValueOption" name="option[${quantity+1}][old_value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="useOption" class="col-sm-2 col-form-label">Use</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="option[${quantity+1}][use_option]">
                                                <label class="form-check-label" >
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="option[${quantity+1}][use_option]"  checked>
                                                <label class="form-check-label" >
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
        });
        $('#inputFile').change(function(e) {
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        })
        
        $('.btn-close-form').click(function(e) {
            $('#inputName').val('');
            $('#img_preview').attr('src', '');
            $('#inputFile').val('');
        })
        $('.add-options').click(function() {

        })
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            let url = $(this).data("url");
            let urlUpdate = $(this).data("href");
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                data: {
                }
            }).done(function(ketqua) {
                console.log('kq', ketqua);
                $('#inputFile').removeAttr('required');
                $('.modal-title').html('Update category');
                $('.form-category').attr('action', urlUpdate);
                $('#inputName').val(ketqua.data.name);
            });
            
        });

    </script>
@endsection