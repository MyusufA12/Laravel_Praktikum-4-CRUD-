<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
</head>
<body>
    <div class="row">
    <div class="container">
        <h2 class="text-center my-5">Upload File</h2>
        <div class="col-lg-8 mx-auto my-5">

            @if(count($errors)> 0)
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>       
            @endforeach    
            </div>
            @endif

            <form action="/upload/proses" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <b>File Gambar</b><br/>
                    <input type="file" name="file">
                </div>
                <div class="form-group">
                    <b>Keterangan</b>
                    <textarea name="keterangan" id="" cols="10" rows="2" class="form-control"></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div>
    </div>   
    </div>
    
</body>
</html>