<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('dist/tags/assets/bootstrap-tagsinput.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('dist/tags/assets/app.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container w-100 ">
        <div class="row">
            <div class="col-12">
                <div class="card basic-form">
                    <div class="card-header bg-light">
                        <h3 class="text-22 text-midnight text-bold mb-4">Edit Stock</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{!! route('stock.update',$stock->id) !!}" enctype="multipart/form-data">
                            @csrf
                            @method(('put'))

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label>ID</label>
                                        </div>
                                        <input required readonly type="text" class="form-control" name="id" value="{{ $stock->id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row  mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label> Variant</label>
                                        </div>
                                        <input id="variant" type="text" name="variant" class="form-control" value="{{ $stock->variant}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row  mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-label">
                                            <label> Stock</label>
                                        </div>
                                        <input id="number" type="number" name="stock" class="form-control" value="{{ $stock->stock}}" />
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5 text-right">
                                <div class="form-group col-12 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    <a href="{!! route('stock.index') !!}" class=" btn btn-sm btn-danger">Cancel </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>