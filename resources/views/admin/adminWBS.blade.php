@extends('layouts.admin')

@section('title', 'Admin WBS Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
    <div class="admin-wbs">
        <div class="main-container">
            <section class="admin-whistleblower">
                <h2 class="whistleblower-title">Whistleblower Report</h2>
                <div class="whistleblower-card">
                    <div class="table-responsive">
                        <table class="whistleblower-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Kasus</th>
                                    <th>Tipe Insiden</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->ticket_number }}</td>
                                        <td class="fw-semibold">{{ $report->judul_kasus }}</td>
                                        <td>{{ $report->tipe_insiden }}</td>
                                        <td>{{ $report->created_at->format('d M Y') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.wbs.show', $report->id) }}" class="btn-view">
                                                View Report
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
