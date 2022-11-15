@extends('layouts.employer-apply')

@section('title', 'Apply - Employer Dashboard')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pelamar Pekerjaan</h2>
            <p class="dashboard-subtitle">Daftar Pelamar Pekerjaan</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover scroll-horizontal-vertical w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pelamar</th>
                                            <th scope="col">Lowongan</th>
                                            <th scope="col">Perusahaan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($applies as $apply)
                                        <tr>
                                            <th scope="row">{{ $apply->id }}</th>
                                            <td>{{ $apply->user->name }}</td>
                                            <td>{{ $apply->job->name }}</td>
                                            <td>{{ $apply->job->company->name }}</td>
                                            <td>{{ $apply->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal-{{ $apply->id }}"
                                                    data-bs-whatever="@getbootstrap">Edit</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6">
                                                <p>Tidak ada yang melamar pekerjaan</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                            <div class="d-flex justify-content-end">{{ $applies->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
