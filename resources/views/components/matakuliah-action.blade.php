<x-edit-button onClick='editFunc({{ $id }})'>
    <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>

@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-danger-button onClick='deleteFunc({{ $id }})' class="">
        <a href="javascript:void(0);" id="delete-company" data-toggle="tooltip" data-original-title="Delete"
            class="delete btn btn-danger">
            Remove
        </a>
    </x-danger-button>
@endif

<x-nilai-button
    onclick="window.location.href='{{ route('mata_kuliah', ['tahun_akademik_matkul' => $tahun_akademik, 'semester_matkul' => $semester, 'matkul_id' => $kode_MK]) }}'">
    <a type="button" data-toggle="tooltip" data-original-title="View Details" class="btn btn-info">
        Nilai
    </a>
</x-nilai-button>
