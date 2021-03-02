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
                                <h3 class="mb-0">API Tracking</h3>
                            </div>
                            <div class="col-4 text-right">
                                <form method="get">
                                    <select class="form-control" data-toggle="select" title="Simple select" data-live-search="true" name="filter">
                                        <option value="From new to old">From new to old</option>
                                    </select>
{{--                                    <button type="button" class="btn btn-primary btn-sm">Small button</button>--}}
                                    <p><input type="submit" class="btn btn-primary btn-sm" value="Submit"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">User name</th>
                                <th scope="col">user agent</th>
                                <th scope="col">IP</th>
                                <th scope="col">Country</th>
                                <th scope="col">Product</th>
                                <th scope="col">Counter</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $log)
                                <tr>
                                    <td>{{$log->user->name}}</td>
                                    <td>{{ $log->user_agent }}</td>
                                    <td>{{$log->ip}}</td>
                                    <td>{{$log->country}}</td>
                                    <td>{{$log->product}}</td>
                                    <td>{{$log->counter}}</td>
                                    <td>{{$log->created_at}}</td>
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
                                No trackings
                            @endforelse
                            </tbody>
                        </table>
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
        <script>
            import Input from "../../../vendor/laravel/breeze/stubs/inertia/resources/js/Components/Input";
            export default {
                components: {Input}
            }
        </script>
