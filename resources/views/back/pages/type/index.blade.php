@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tipe Ruangan</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                        <th>Tipe</th>
                        <th>Harga/mlm</th>
                        <th>Perk</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $d)
                      <tr>
                          <td>{{$d->ID}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->price}}</td>
                        <td>{{$d->perks}}</td>
                        <td>
                            <form action="{{route('admin.type.destroy', $d->ID)}}" method="POST">
                                @method("delete")
                                @csrf
                                <a class="btn btn-primary btn-rounded btn-icon" href="{{route("admin.type.edit",$d->ID)}}" disabled>
                                    <i class="ti-pencil"></i>
                                  </a>
                                  <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                    <i class="ti-trash"></i></button>   
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