<x-edit-button>
    <a href="javascript:void(0)" data-toggle="tooltip" onClick='editFunc({{ $id }})'' data-original-title="Edit"
        class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>

<x-danger-button>
    <a href="javascript:void(0);" id="delete-compnay" onClick='deleteFunc({{ $id }})'' data-toggle="tooltip"
        data-original-title="Delete" class="delete btn btn-danger">
        Delete
    </a>
</x-danger-button>

<x-nilai-button>
    <a type="button" href="{{ url('/matakuliah/' . $kode_MK) }}" data-toggle="tooltip"
        data-original-title="View Details" class="btn btn-info">
        Nilai Mata Kuliah
    </a>
</x-nilai-button>
