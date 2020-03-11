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
                                    <img src="image/{{ $player->avatar }}" width="50px" height="50px">
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

                                    <form method="POST" action="{{ route('delete', ['player' => $player->id]) }}">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-icon-split delete-button">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </form>
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

@push('scripts')
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable( {
                'columnDefs': [ {
                    'targets': [2,6],
                    'orderable': false,
                }]
            });
        });

        $(document).on('click', '.delete-button', function(e){
            e.preventDefault();
            var form = $(this).parent();

            alertify.confirm('Confirm', 'Are you sure you want to delete this player?', function () {
                form.submit();
            }, function () {});
        });
    </script>
@endpush
