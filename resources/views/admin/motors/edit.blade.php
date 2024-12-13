@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
                <a href="{{ route('admin.cars.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.cars.update', $motor) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row border-bottom pb-4">
                        <label for="nama_motor" class="col-sm-2 col-form-label">Nama motor</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_motor" value="{{ old('nama_motor', $motor->nama_motor) }}" id="nama_motor">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="type_iid" class="col-sm-2 col-form-label">Tipe motor</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type_id" id="type_id">
                                @foreach($types as $type)
                                    <option {{ old('type', $motor->type->id) == $type->id ? 'selected' : null }} value="{{ $type->id }}">{{ $type->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="price" class="col-sm-2 col-form-label">Harga Sewa</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="price" value="{{ old('price', $motor->price) }}" id="price">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="image" class="col-sm-2 col-form-label">Gambar motor</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="6">{{ old('description', $motor->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                @foreach($statuses as $no => $status)
                                <option {{ old('status', $motor->status) == $no ? 'selected' : null }} value="{{ $no }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
