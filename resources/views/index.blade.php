<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    {{-- Bootstarp Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('create') }}" class="btn btn-primary text-white">Add New User</a>
        {{-- Users Type 1 --}}
        <table class="table mb-5">
        <h5 class="text-center">Users Type 1</h5>
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">BIO</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @forelse ($users_1 as $data)
                    <tr>
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->username }} </td>
                        <td> {{ $data->email }} </td>
                        <td> {{ $data->bio }} </td>
                        <td>
                            <form action="{{ route('delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {{-- Users Type 1 End --}}

        {{-- Users Type 2 --}}
        <table class="table mb-5">
        <h5 class="text-center">Users Type 2</h5>
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">BIO</th>
                <th scope="col">Certifiation Title</th>
                <th scope="col">Certifiation File</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @forelse ($users_2 as $data)
                    <tr>
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->username }} </td>
                        <td> {{ $data->email }} </td>
                        <td> {{ $data->bio }} </td>
                        <td> {{ $data->details->certification_title }} </td>
                        <td> <a href="{{ asset($data->details->certification_file) }}" target="_blank">Show PDF</a> </td>
                        <td>
                            <form action="{{ route('delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {{-- Users Type 2 End --}}

        {{-- Users Type 3 --}}
        <table class="table mb-5">
        <h5 class="text-center">Users Type 3</h5>
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">BIO</th>
                <th scope="col">Certifiation Title</th>
                <th scope="col">Certifiation File</th>
                <th scope="col">Date Of Birth</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @forelse ($users_3 as $data)
                    <tr>
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->username }} </td>
                        <td> {{ $data->email }} </td>
                        <td> {{ $data->bio }} </td>
                        <td> {{ $data->details->certification_title }} </td>
                        <td> <a href="{{ asset($data->details->certification_file) }}" target="_blank">Show PDF</a> </td>
                        <td> {{ $data->details->date_of_birth }} </td>
                        <td>
                            <form action="{{ route('delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {{-- Users Type 3 End --}}


    </div>
    {{-- Bootstarp Js --}}
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
