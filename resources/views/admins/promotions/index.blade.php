@extends('admins.app')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">promotion list</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('promotion-create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add new</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Position</th>
                    <th scope="col">Active</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotions as $key => $promotion)
                        <tr>
                            <th scope="row" width="5%">{{$key + 1}}</th>
                            <td width="25%">
                                <div style="width: 100%">
                                    <img src="{{ url('storage/promotions/'.$promotion->image) }}" alt="" title="" style="width:100%"/>
                                </div>
                            </td>
                            <td>{{$promotion->position}}</td>
                            <td width="15%">
                                @if ($promotion->active == 1)
                                    <span>On</span>
                                @else
                                    <span>Off</span>
                                @endif
                            </td>
                            <td width="15%">
                                <a
                                    href="{{ route('promotion-detail',['id' => $promotion->id]) }}" 
                                    class="btn btn-primary btn-circle btn-sm btn-edit" 
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
                                        <a href="{{route('promotion-delete', ['id' => $promotion->id])}}" class="btn btn-primary">Yes</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $promotions->links('admins.paginate.view') }}
        </div>
    </div>
</div>
@endsection
