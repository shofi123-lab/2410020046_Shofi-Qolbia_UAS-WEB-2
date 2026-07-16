@extends('layouts.app')

@section('title', 'Daftar Instruktur - Yoga From Home')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-user-tie text-primary me-2"></i>Data Instruktur</h3>
            <p class="text-muted mb-0">Kelola informasi instruktur yoga professional.</p>
        </div>
        <a href="{{ route('instructors.create') }}" class="btn btn-gradient-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Instruktur
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="card card-custom border-0 p-3 mb-4">
        <form action="{{ route('instructors.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control form-control-custom rounded-start-0" placeholder="Cari berdasarkan nama, nomor HP, jenis kelamin..." value="{{ $search }}">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-gradient w-100 py-2">Cari</button>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="card card-custom border-0 p-4">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pengalaman</th>
                        <th>Nomor HP</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($instructors as $key => $inst)
                        <tr>
                            <td>{{ $instructors->firstItem() + $key }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px; color: var(--primary-pastel);">
                                        {{ strtoupper(substr($inst->nama, 0, 1)) }}
                                    </div>
                                    <span class="fw-bold">{{ $inst->nama }}</span>
                                </div>
                            </td>
                            <td>
                                @if($inst->jenis_kelamin == 'Laki-laki')
                                    <span class="badge bg-primary-light text-primary px-3 py-2 rounded-3"><i class="fa-solid fa-mars me-1"></i> Laki-laki</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-3"><i class="fa-solid fa-venus me-1"></i> Perempuan</span>
                                @endif
                            </td>
                            <td><strong>{{ $inst->pengalaman }} Tahun</strong></td>
                            <td>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inst->nomor_hp) }}" target="_blank" class="text-decoration-none text-dark hover-lift">
                                    <i class="fa-brands fa-whatsapp text-success me-1"></i> {{ $inst->nomor_hp }}
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('instructors.edit', $inst->id) }}" class="btn btn-sm btn-light border text-primary rounded-3 px-3 py-2" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-light border text-danger rounded-3 px-3 py-2" title="Hapus Data" onclick="deleteInstructor('{{ $inst->id }}', '{{ $inst->nama }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <form action="{{ route('instructors.destroy', $inst->id) }}" method="POST" id="delete-form-{{ $inst->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-user-slash d-block mb-3" style="font-size: 3rem; color: #cbd5e1;"></i>
                                Tidak ada data instruktur ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <small class="text-muted">Menampilkan {{ $instructors->firstItem() ?? 0 }} sampai {{ $instructors->lastItem() ?? 0 }} dari {{ $instructors->total() }} data</small>
            </div>
            <div>
                {{ $instructors->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function deleteInstructor(id, name) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Data instruktur "${name}" akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#cbd5e1',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            background: '#ffffff',
            color: '#1e1b4b',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
