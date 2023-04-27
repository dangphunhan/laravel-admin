@extends('layout')
@section('content')
    <div class="page">
        <!-- Sidebar -->
        @include('sidebar')
        <!-- Page body -->
        <div class="container">
            <div align="right">
                <a href="{{ route('post.create') }}" class="btn btn-success"><i class="bi bi-plus-square"></i>&nbsp;Add</a><br>
            </div>
            <div>
               {{ $dataTable->table() }}               
            </div>
            <div class="modal fade" tabindex="-1" id="delete_post" tabindex="-1" aria-labelledby="ModelLable"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" id="sample_form" class="form-horizontal">
                            <div class="modal-header">
                                <h5 id="modalLable" class="modal-title">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4 align="center" style="margin: 0;">Are you sure want to remove this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="ok_button" name="ok_button" class="btn btn-primary">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2023
                                <a href="." class="link-secondary">Tabler</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" rel="noopener">
                                    v1.0.0-beta17
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
