<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    {{-- Bootstarp Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        input { margin-bottom: 15px }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_type">Select User Type</label>
                <select id="user_type" class="mb-3 form-control" name="user_type" required>
                    <option selected value="1">Type 1</option>
                    <option value="2">Type 2</option>
                    <option value="3">Type 3</option>
                </select>
                @error('user_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" name="bio" id="bio" rows="5" required></textarea>
                @error('user_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div id="certification" class="d-none">
                <div class="row mt-3">
                    <div class="col">
                        <label for="certification_title">Certification Title</label>
                        <input type="text" class="form-control" id="certification_title" name="certification_title" placeholder="Enter Certification Title">
                    </div>
                    <div class="col">
                        <label for="certification_file">Certification File</label>
                        <input type="file" class="form-control" id="certification_file" name="certification_file">
                    </div>
                </div>
            </div>

            <div id="date_map" class="d-none">
                <div class="form-group">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" />
                </div>
            </div>

            <div id="map"></div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    {{-- Bootstarp Js --}}
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#user_type').change(function () {
                if($(this).val() == '2') {
                    $('#certification').removeClass('d-none');
                    $('#date_map').addClass('d-none');
                } else if($(this).val() == '3') {
                    $('#certification').removeClass('d-none');
                    $('#date_map').removeClass('d-none');
                } else {
                    $('#certification').addClass('d-none');
                    $('#date_map').addClass('d-none');
                };
            });
        });
    </script>
</body>
</html>
