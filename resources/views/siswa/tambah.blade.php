<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</head>

<body>
    <br>
    <br>
    <br>
    <div class="container">
        <h1>Tambah</h1>
        <form action="/siswa/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="nama" placeholder="nama" aria-label="nama"
                aria-describedby="addon-wrapping">
            <br>
            <input type="text" class="form-control" name="alamat" placeholder="alamat" aria-label="alamat"
                aria-describedby="addon-wrapping">
            <br>
            <input type="text" class="form-control" name="no_telpon" placeholder="no_telpon" aria-label="no_telpon"
                aria-describedby="addon-wrapping">
            <br>
            <input type="text" class="form-control" name="jurusan_id" placeholder="jurusan_id" aria-label="jurusan_id"
                aria-describedby="addon-wrapping">
                <select name="jurusan_id" id="jurusan">
                    @foreach($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                    @endforeach
                </select>
            <br>
            <button type="submit" class="btn btn-primary">+</button>
        </form>
    </div>

</body>

</html>
