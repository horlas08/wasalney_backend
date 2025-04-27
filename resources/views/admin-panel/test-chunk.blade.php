<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chunk File Upload in Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

<div class="container mt-5">

    <div class="row">

        <div class="col-md-12">

            <div class="card w-50 m-auto">

                <div class="card-header bg-info text-white">

                    <h4>Chunk File Upload in Laravel</h4>

                </div>

                <div class="card-body">

                    <div class="form-group" id="file-input">

                        <input type="file" id="pickfiles" class="form-control">

                        <div id="filelist"></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{ asset('/js/chunk.min.js') }}"></script>
<script src="{{ asset('/js/chunk.js') }}"></script>

<script type="text/javascript">
    let token="{{ csrf_token() }}";

    $(document).ready(function () {
        uploadChunk('{{ route("chunk-upload") }}');

    });

</script>

</body>

</html>
