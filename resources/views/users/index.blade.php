@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <form method="GET" action="{{ route('users') }}">
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                            <nav>
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ni ni-zoom-split-in"></i>
                                                        </span>
                                                    </div>
                                                    <input aria-describedby="addon-right addon-left"
                                                           name="search" type="text"
                                                           class="form-control"
                                                           value="{{ request('search', '') }}"
                                                    >
                                                </div>
                                            </nav>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                No users
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links('parts.paginate') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        © 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative
                            Tim</a> &amp;
                        <a href="https://www.updivision.com" class="font-weight-bold ml-1"
                           target="_blank">Updivision</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection
