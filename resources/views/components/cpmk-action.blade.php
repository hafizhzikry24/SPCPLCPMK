<x-nilai-button
    onclick="window.location.href='{{ route('evaluasi', ['tahun_akademik_matkul' => $tahun_akademik, 'semester_matkul' => $semester, 'matkul_id' => $kode_MK]) }}'">
    <a type="button" data-toggle="tooltip" data-original-title="View Details" class="btn btn-info">
        Evaluasi
    </a>
</x-nilai-button>
