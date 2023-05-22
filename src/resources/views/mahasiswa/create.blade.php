 @extends('layout.template')
 @section('konten')
 <!-- START FORM -->
 <form action='{{ url('mahasiswa') }}' method='post'>
     @csrf
     @if ($errors->any())
     <div class="pt-3">
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $item)
                 <li>{{ $item }}</li>

                 @endforeach
             </ul>
         </div>
     </div>
     @endif
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <a href="{{ url('mahasiswa') }}" class="btn btn-secondary">BACK</a>
         <div class="mb-3 row">
             <label for="nim" class="col-sm-2 col-form-label">NIM</label>
             <div class="col-sm-10">
                 <input type="number" class="form-control" name='nim' value="{{ Session::get('NIM') }}" id="nim" required>
             </div>
         </div>
         <div class="mb-3 row">
             <label for="nama" class="col-sm-2 col-form-label">Nama</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='nama' value="{{ Session::get('Nama') }}" id="nama" required>
             </div>
         </div>
         <div class="mb-3 row">
             <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='jurusan' value="{{ Session::get('Jurusan') }}" id="jurusan" required>
             </div>
         </div>
         <div class="mb-3 row">
             <label for="jurusan" class="col-sm-2 col-form-label"></label>
             <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
         </div>
 </form>
 </div>
 <!-- AKHIR FORM -->
 @endsection
