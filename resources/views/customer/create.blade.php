<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Müşteri Ekleme Ekranı</title>
</head>
<body>
<div class="row m-lg-2">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Startbucks - Müşteri Ekle
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('customers')}}">
                    @csrf
                    <input type="hidden" name="firm" value="starbucks">
                    <div class="form-group">
                        <label for="name">Ad</label>
                        <input type="text" id="name" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad</label>
                        <input type="text" id="surname" name="surname" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="identity_no">TC</label>
                        <input type="number" id="identity_no" name="identity_no" class="form-control" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="birth_year">Doğum Yılı</label>
                        <input type="number" id="birth_year" name="birth_year" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">KAYDET</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Portal - Müşteri Ekle
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('customers')}}">
                    @csrf
                    <input type="hidden" name="firm" value="portal">
                    <div class="form-group">
                        <label for="name">Ad</label>
                        <input type="text" id="name" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad</label>
                        <input type="text" id="surname" name="surname" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="identity_no">TC</label>
                        <input type="number" id="identity_no" name="identity_no" class="form-control" required="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="birth_year">Doğum Yılı</label>
                        <input type="number" id="birth_year" name="birth_year" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">KAYDET</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
