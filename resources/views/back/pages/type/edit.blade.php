@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Ruangan</h4>
              <form class="forms-sample" action="{{route("admin.type.update", $data[0]->ID)}}" method="POST">
                @method("PUT");
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tipe" name="name" value="{{$data[0]->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Harga/mlm</label>
                  <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Harga" name="price" value="{{$data[0]->price}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Deskripsi Pendek</label>
                  <Textarea type="text" class="form-control" id="exampleInputUsername1" placeholder="Short Desc" name="short_desc">{{$data[0]->short_desc}}</Textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Detail</label>
                  <Textarea class="form-control" id="exampleInputUsername1" placeholder="Detail" name="details" style="margin-top: 0px; margin-bottom: 0px; height: 435px;">{{$data[0]->details}}</Textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Perk</label>
                  <input     type="text" class="form-control" id="exampleInputUsername1" placeholder="Perk" name="perks" value="{{$data[0]->perks}}">
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>    
@endsection


