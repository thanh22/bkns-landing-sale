@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#myModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add new</span>
            </button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Discount</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row" width="5%">{{$key + 1}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td >{{$product->description}}</td>
                            <td>{{ number_format($product->cost) }} VND</td>
                            <td>{{$product->discount}} %</td>
                            <td width="15%">
                                <a
                                    href="{{ route('product-detail',['id' => $product->id]) }}" class="btn btn-primary btn-circle btn-sm btn-edit" 
                                    data-name="{{$product->name}}"
                                    data-url="{{ route('product-detail',['id' => $product->id]) }}" 
                                    data-href="{{ route('product-update',['id' => $product->id]) }}"
                                    data-id="{{$product->id}}"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a  data-bs-toggle="modal" data-bs-target="#deleteModal" href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <!-- Modal delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete it?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <a href="{{route('product-delete', ['id' => $product->id])}}" class="btn btn-primary">Yes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links('admins.paginate.view') }}
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new product</h4>
                <!-- <button type="button" class="btn-close btn-light" data-bs-dismiss="modal">x</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-product" method="post" action="{{route('product-create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="name" required>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="" class="form-select" required>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Cost</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="cost" name="cost">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Discount (%)</label>
                        <div class="col-sm-10">
                            <input type="number" max="100" class="form-control" id="discount" name="discount">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Options</label>
                        <div class="col-sm-9">
                            <div class="area-option">
                                <div class="custom-border mb-3">
                                    <div class="mb-3 row">
                                        <label for="nameOption" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nameOption" name="option[1][name_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="valueOption" class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="valueOption" name="option[1][value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="oldValueOption" class="col-sm-2 col-form-label">Old value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="oldValueOption" name="option[1][old_value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="useOption" class="col-sm-2 col-form-label">Use</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="option[1][use_option]">
                                                <label class="form-check-label" >
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="option[1][use_option]"  checked>
                                                <label class="form-check-label" >
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                        <div class="col-sm-1">
                            <a class="btn btn-info btn__add-option" style="margin-left: 12px;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </a>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-close-form" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let indexRadio = 1;
        $('.btn__add-option').click(function() {
            indexRadio++;
            $('.area-option').append(`<div class="custom-border mb-3">
                                    <div class="mb-3 row">
                                        <label for="nameOption" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nameOption" name="option[${indexRadio}][name_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="valueOption" class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="valueOption" name="option[${indexRadio}][value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="oldValueOption" class="col-sm-2 col-form-label">Old value</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="oldValueOption" name="option[${indexRadio}][old_value_option]">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="useOption" class="col-sm-2 col-form-label">Use</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="option[${indexRadio}][use_option]">
                                                <label class="form-check-label" >
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="option[${indexRadio}][use_option]"  checked>
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

    </script>
@endsection