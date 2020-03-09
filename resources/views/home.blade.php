@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <span class="m-0 font-weight-bold text-primary text-left">Players Details</span>
                    </div>

                    <div class="col-lg-2 col-md-2 text-right">
                        <a  href="{{ route('insert') }}" class="m-0 btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Insert</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Batting Average</th>
                                <th>Bowling Average</th>
                                <th>Playing 11</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->name }}</td>
                                <td>
                                    <img src="img/{{ $player->avatar }}" width="50px" height="50px">
                                </td>
                                <td>{{ $player->batting_average }}</td>
                                <td>{{ $player->bowling_average }}</td>
                                <td>
                                    @if ($player->playing == 0)
                                        {{ 'Yes' }}
                                    @else
                                        {{ 'No' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit', ['player' => $player->id]) }}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="{{ route('delete', ['player' => $player->id]) }}" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        $(document).ready(function() {
            $('#dataTable').DataTable( {
                'columnDefs': [ {
                    'targets': [1,5],
                    'orderable': false,
                }]
            });
        });
    </script>
@endsection
