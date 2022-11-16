<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src='https: //cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    <title>Upload stock file</title>
</head>

<body>
    <div class="border m-5 p-3 bg-dark text-white">
        <h1 style="text-align   :center ;">Upload Stock File</h1>
        <div class="container">
            <a class="btn btn-success  mt-2" href="{{route('stock.index')}}" style="float: right;">Back</a>
        </div>
        <div class="border mb-5 mt-1 mx-5 p-3 ">

            <form action="{{route('ImportCsv')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                <!-- show errors here -->
                @if($errors->any())
                <div class="fw-bold" style="color: rgb(255, 255, 255); text-align: center; background-color: rgb(252, 78, 65); ">
                    <h4>{{$errors->first()}}</h4>
                </div>
                @endif
                <br>
                <!--// show errors here -->
                @csrf
                <label for="file">Please Select CSV file to upload to Database </label>
                <input type="file" name="file" id="file" style="width:100% ;" class="my-4">
                <input type="submit" value="Submit" class="btn btn-success">
            </form>
        </div>
    </div>
</body>

</html>