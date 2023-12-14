<html>
<head>
    <title>Create Data Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    @if ($errors->any())
    <div style="color: crimson;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-4">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            CREATE DATA MAHASISWA
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('save')}}">
        @csrf
            <div class="form-group">
            NIM
            <input type="text" id="nim" name="nim" class="form-control" required="">
            </div>
            NAMA
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" required="">
            </div>
            UMUR
            <div class="form-group">
                <input type="text" id="umur" name="umur" class="form-control" required="">
            </div>
            EMAIL
            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" required="">
            </div>
            <div class="form-group">
            KELAS
            <div class="form-group">
                <input type="text" id="kelas" name="kelas" class="form-control" required="">
            </div>
            <div class="form-group">
            JURUSAN
            <div class="form-group">
                <input type="text" id="jurusan" name="jurusan" class="form-control" required="">
            </div>
            <div class="form-group">
            ALAMAT
            <textarea name="alamat" class="form-control" required=""></textarea>
            </div>

            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            <div class="form-group">
                <input type="hidden" id="created_at" value="" name="created_at" class="form-control" required="">
            </div>
        </div>
    </div>
    </div>
</body>
</html>