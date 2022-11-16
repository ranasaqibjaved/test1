<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src='https: //cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    <title>Test 3</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3">Please Click Below any one</h1>
        <div class="d-flex justify-content-between mx-5 border p-3">
            <p> Select all records from Table 1 and a column to show count of their records in table 2</p>
            <a href="{{route('test1')}}" class="btn btn-success" style="text-decoration: none;">click for test 1 </a>
        </div>
        <div class="d-flex justify-content-between mx-5 border p-3">
            <p>Select all records from table 1 whose record does not exist in table 2</p>

            <a href="{{route('test2')}}" class="btn btn-success" style="text-decoration: none;">click for test 2 </a>
        </div>
        <div class="d-flex justify-content-between mx-5 border p-3">
            <p>Select all duplicate records in table 2 and show a counter of their iteration in that table </p>

            <a href="{{route('test3')}}" class="btn btn-success" style="text-decoration: none;">click for test 3</a>
        </div>
    </div>
</body>

</html>