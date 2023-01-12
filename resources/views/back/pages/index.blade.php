@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-credit-card primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>{{$data3}}</h3>
                  <span>Total Transaksi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-grid primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>{{$data1}}</h3>
                  <span>Jumlah Kamar</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-home primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>{{$data2}}</h3>
                  <span>Jumlah Type</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Transaksi</h4>
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
@endsection