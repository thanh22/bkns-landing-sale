@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Promotion add new</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
        </div>
        <div class="row">
            <form class="form-product" method="post" action="{{ route('promotion-update', ['id' => $promotion->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="uploadFile" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="uploadFile" name="image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div style="width: 150px;">
                            <img id="img_preview" alt="" title="" style="width:100%" src="{{ url('storage/promotions/'.$promotion->image) }}"/>
                        </div>
                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Image position</label>
                    <div class="col-sm-10">
                        <?php $range = ['left', 'center', 'right'] ?>
                        <select class="form-select" name="image_position">
                            @foreach ($range as $k => $n)
                            <option value="{{$k}}" {{ $k == $promotion->image_position ? 'selected' : '' }} >{{$n}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="editor1" cols="30" rows="10">{{$promotion->content}}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Active</label>
                    <div class="col-sm-10">
                        <div class="d-flex" style="padding-left: 15px;">
                            <div class="form-check" style="margin-left: 0px;margin-right: 20px">
                                <input class="form-check-input" type="radio" name="active" id="disable" value="0" {{$promotion->active == 0 ? 'checked' : ''}}>
                                <label class="form-check-label" for="disable">
                                    Off
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="active" id="enable" value="1" {{$promotion->active == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="enable">
                                    On
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <?php $rangePos = ['First', 'Second', 'Third', 'Fourth'] ?>
                        <select class="form-select" name="position">
                            @foreach ($rangePos as $keyPos => $valPos )
                                <option value="{{ $keyPos + 1 }}" {{ $promotion->position == ($keyPos + 1) ? 'selected' : '' }} >{{$valPos}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('promotion-list') }}" class="btn btn-outline-dark">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('#uploadFile').change(function(e) {
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        })
    </script>
@endsection