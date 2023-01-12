@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    {{-- {{dd($data)}} --}}
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Transaksi {{$data->UID}}</h4>
              <form class="forms-sample" action="{{route("admin.transaction.update", $data->id)}}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tipe" name="Name" value="{{$data->Name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">email</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="email" name="Email" value="{{$data->Email}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Tipe</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="tipe" name="tipe" value="{{$data->tipe}}"></input>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">total</label>
                  <input type="number" class="form-control" id="exampleInputUsername1" placeholder="total" name="total" value="{{$data->total}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Bukti Transfer</label>
                  <br>
                  <img width="500" height="700" src="/storage/{{$data->transfer_pic}}" alt="">
                </div>
                <button type="submit" class="btn btn-primary me-2">update data</button>
                @if ($data->status != "Sukses")
                <a type="submit" href="{{route("admin.transaction.changeStatus",[$data->id,"Sukses"])}}" class="btn btn-success me-2">validasi</a>
                @else
                <a type="submit" href="{{route("admin.transaction.changeStatus",[$data->id,"Pending"])}}" class="btn btn-danger me-2">unvalidasi</a>
                @endif
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>    
@endsection


