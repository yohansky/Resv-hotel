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
                        <th>Nomer</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $d)
                      <tr>
                        <td>{{$d->no_kamar}}</td>
                        <td>{{$d->Roomtype->name}}</td>
                        <td>
                            @if ($d->status == "Booked")
                                <label class="badge badge-primary">Booked</label>
                            @else
                                <label class="badge badge-danger"> - </label>
                            @endif
                        </td>
                        <td>
                            <form action="{{route("admin.room.destroy", $d->id)}}" method="POST">
                                @method("delete")
                                @csrf
                                <a class="btn btn-primary btn-rounded btn-icon" href="{{route("admin.room.edit",$d->id)}}" disabled>
                                    <i class="ti-pencil"></i>
                                  </a>
                                  <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                    <i class="ti-trash"></i>                                  </button>
                                  @if ($d->status == "Booked")
                                  <a href="{{route("admin.room.changeStatus",[$d->id," "])}}" class="btn btn-warning btn-rounded btn-icon">
                                    <i class="ti-close"></i>
                                  </a>
                                  @else
                                  <a href="{{route("admin.room.changeStatus",[$d->id,"Booked"])}}" class="btn btn-success btn-rounded btn-icon">
                                    <i class="ti-check"></i>
                                  </a>
                                  @endif    
                            </form>  
                        </td>
                      </tr>
                      @empty
                          <td colspan="4">
                              <h1>Data Tidak Ditemukan</h1>
                          </td>
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