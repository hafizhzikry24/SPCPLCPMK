@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-restore-button>
        <a href="javascript:void(0);" id="delete-company" onClick='restoreFunc({{ $id }})' data-toggle="tooltip"
            data-original-title="Delete" class="delete btn btn-danger">
            Restore
        </a>
    </x-restore-button>
@endif

<x-edit-button>
    <a href="javascript:void(0)" data-toggle="tooltip" onClick='editFunc({{ $id }})' data-original-title="Edit"
        class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>

<x-nilai-button
    onclick="window.location.href='{{ route('mata_kuliah', ['tahun_akademik_matkul' => $tahun_akademik, 'semester_matkul' => $semester, 'matkul_id' => $kode_MK]) }}'">
    <a type="button" data-toggle="tooltip" data-original-title="View Details" class="btn btn-info">
        Nilai
    </a>
</x-nilai-button>

@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-danger-button>
        <a href="javascript:void(0);" id="delete-company" onClick='deleteFunc({{ $id }})'
            data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
            Delete
        </a>
    </x-danger-button>
@endif
