@extends('layouts.admin')

@section('title', 'Admin WBS Manager')
@section('meta_description', 'Official website of PT Krakatau Baja Konstruksi')

@section('content')
<div class="admin-wbs">
    <div class="main-container">
        <section class="admin-whistleblower">
            <h2 class="whistleblower-title">Whistleblower</h2>
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
                            @for ($i = 0; $i < 5; $i++)
                            <tr>
                                <td>ID-LP1902859320</td>
                                <td class="fw-semibold">
                                    Penyalahgunaan Dana Operasional Departemen
                                </td>
                                <td>Pelanggaran Etika & Keuangan</td>
                                <td>10 Jan 2026</td>
                                <td class="text-end">
                                    <a href="#" class="btn-view">View Report</a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection