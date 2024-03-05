<x-edit-button>
    <a href="javascript:void(0)" data-toggle="tooltip" onClick='editFunc({{ $id }})'' data-original-title="Edit"
        class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>

@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-danger-button>
        <a href="javascript:void(0);" id="delete-company" onClick='deleteFunc({{ $id }})' data-toggle="tooltip"
            data-original-title="Delete" class="delete btn btn-danger">
            Remove
        </a>
    </x-danger-button>
@endif

@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-danger-button>
        <a href="javascript:void(0);" id="delete-company" onClick='deleteFunc({{ $id }})'
            data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
            Restore
        </a>
        </x-edit-button>
@endif

<x-nilai-button>
    <a type="button"
        href="{{ route('mata_kuliah', ['tahun_akademik_matkul' => $tahun_akademik, 'semester_matkul' => $semester, 'matkul_id' => $kode_MK]) }}"
        data-toggle="tooltip" data-original-title="View Details" class="btn btn-info">
        Nilai
    </a>
</x-nilai-button>