@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Banner list</h6>
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
                    <th scope="col">Image</th>
                    <th scope="col">Active</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $key => $banner)
                        <tr>
                            <th scope="row" width="5%">{{$key + 1}}</th>
                            <td>{{$banner->name}}</td>
                            <td width="40%">
                                <div style="width: 100%">
                                    <img src="{{ url('storage/banners/'.$banner->image) }}" alt="" title="" style="width:100%"/>
                                </div>
                            </td>
                            <td width="15%">
                                @if ($banner->active == 1)
                                    <span>On</span>
                                @else
                                    <span>Off</span>
                                @endif
                            </td>
                            <td width="15%">
                                <a
                                    data-bs-toggle="modal" 
                                    data-bs-target="#myModal" 
                                    href="#" class="btn btn-primary btn-circle btn-sm btn-edit" 
                                    data-name="{{$banner->name}}"
                                    data-url="{{ route('banner-detail',['id' => $banner->id]) }}" 
                                    data-href="{{ route('banner-update',['id' => $banner->id]) }}"
                                    data-id="{{$banner->id}}"
                                    data-active="{{$banner->active}}"
                                    data-src="{{ url('storage/banners/'.$banner->image) }}" 
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
                                        <a href="{{route('banner-delete', ['id' => $banner->id])}}" class="btn btn-primary">Yes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $banners->links('admins.paginate.view') }}
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new banner</h4>
                <!-- <button type="button" class="btn-close btn-light" data-bs-dismiss="modal">x</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-banner" method="post" action="{{route('banner-create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="name" name="name" required>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="inputFile" name="image" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <img id="img_preview" alt="" title="" style="width:100%" src=""/>
                        </div>
                    </div>
                    <div class="input-group mb-3 d-flex align-items-center">
                        <label class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10 d-flex" style="padding-left: 15px;">
                            <div class="form-check" style="margin-left: 0px;margin-right: 20px">
                                <input class="form-check-input" type="radio" name="active" id="disable" value="0" checked>
                                <label class="form-check-label" for="disable">
                                    Off
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="enable" value="1">
                                <label class="form-check-label" for="enable">
                                    On
                                </label>
                            </div>
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
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            let url = $(this).data("url");
            let urlUpdate = $(this).data("href");
            let active = $(this).data("active");
            let srcImg = $(this).data("src");
            if (active == 0) {
                $('#disable').attr('checked', true);
            } else {
                $('#enable').attr('checked', true);
            }
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                data: {
                }
            }).done(function(ketqua) {
                $('#inputFile').removeAttr('required');
                $('.modal-title').html('Update banner');
                $('.form-banner').attr('action', urlUpdate);
                $('#inputName').val(ketqua.data.name);
                $('#img_preview').attr('src', srcImg);
                if (ketqua.data.active == 0) {
                    $('#disable').attr('checked', true);
                } else {
                    $('#enable').attr('checked', true);
                }
            });
            
        });

    </script>
@endsection