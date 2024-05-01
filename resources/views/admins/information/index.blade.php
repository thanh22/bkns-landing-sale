@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#myModal">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Edit</span>
            </button>
        </div>
        <div class="row">
            <div class="input-group mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <div class="form-control">{{ $information?->name }}</div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    @foreach ($address as $add)
                        @if ($add)
                            <div class="form-control mb-3" style="height: fit-content;">{{$add}}</div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="input-group mb-3">
                <label for="name" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <div class="form-control">{{$information?->phone}}</div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <div class="form-control">{{$information?->email}}</div>
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-sm-2 col-form-label">Social network</label>
                <div class="col-sm-10">
                    @foreach ($socialNetworks as $acc)
                        <div class="form-control mb-3">{{$acc}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit information</h4>
                <!-- <button type="button" class="btn-close btn-light" data-bs-dismiss="modal">x</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-banner" method="post" action="{{route('information-store', ['id' => $information->id ?? null])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="name" name="name" required value="{{$information?->name}}">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPhone" placeholder="phone" name="phone" required value="{{$information?->phone}}">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputPhone" placeholder="email" name="email" required  value="{{$information?->email}}">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Social network</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="facebook">Facebook</span>
                                <input type="text" class="form-control" placeholder="facebook" aria-label="Username" aria-describedby="facebook" name="social_networks[face]" value="{{ $socialNetworks ? $socialNetworks->face : ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="instagram">Instagram</span>
                                <input type="text" class="form-control" placeholder="instagram" aria-label="Username" aria-describedby="instagram" name="social_networks[instagram]" value="{{ $socialNetworks ? $socialNetworks->instagram : ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="twitter">Twitter</span>
                                <input type="text" class="form-control" placeholder="twitter" aria-label="Username" aria-describedby="twitter" name="social_networks[twitter]" value="{{ $socialNetworks ? $socialNetworks->twitter : ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="youtube">Youtube</span>
                                <input type="text" class="form-control" placeholder="youtube" aria-label="Username" aria-describedby="youtube" name="social_networks[youtube]" value="{{ $socialNetworks ? $socialNetworks->youtube : ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="pinterest">Pinterest</span>
                                <input type="text" class="form-control" placeholder="pinterest" aria-label="Username" aria-describedby="pinterest" name="social_networks[pinterest]" value="{{ $socialNetworks ? $socialNetworks->pinterest : ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="address1" aria-label="Username" aria-describedby="address1" name="address[1]" value="{{$address[1] ?? ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="address2" aria-label="Username" aria-describedby="address2" name="address[2]" value="{{$address[2] ?? ''}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="address3" aria-label="Username" aria-describedby="address3" name="address[3]" value="{{$address[3] ?? ''}}">
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
