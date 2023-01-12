@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ruangan</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>tipe</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Transfer?</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($data as $d)
                        <tr>
                            <td>{{$d->UID}}</td>
                            <td>{{$d->Name}}</td>
                            <td>{{$d->Email}}</td>
                            <td>{{$d->tipe}}</td>
                            <td>{{$d->total}}</td>
                            <td>{{$d->status}}</td>
                            <td>Y</td>
                            <td>
                                <form action="{{route("admin.transaction.destroy",$d->id)}}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <a class="btn btn-primary btn-rounded btn-icon" href="{{route("admin.transaction.edit",$d->id)}}" disabled>
                                        <i class="ti-pencil"></i>
                                      </a>
                                      <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                        <i class="ti-trash"></i>
                                    </button>
                                     
                                </form>  
                            </td>
                        </tr>
                     @empty
                         
                     @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>    
@endsection