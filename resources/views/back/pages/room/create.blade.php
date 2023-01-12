@extends('back.layouts.base')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Input Ruangan</h4>
              <form class="forms-sample" action="{{route('admin.room.store')}}" method="POST">
                @method("POST");
                @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Nomer</label>
                  <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Nomer Kamar" name="no_kamar">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Tipe</label>
                      <select class="form-control" id="exampleSelectGender" name="tipe">
                        @foreach ($data as $d)
                        <option value="{{$d->ID}}">{{$d->name}}</option>
                        @endforeach
                      </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>    
@endsection


