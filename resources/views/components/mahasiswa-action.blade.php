<x-edit-button>
    <a type="button" href="javascript:void(0)" data-toggle="tooltip" onClick='editFunc({{ $id }})''
        data-original-title="Edit" class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>

<x-danger-button>
    <a type="button" href="javascript:void(0);" id="delete-compnay" onClick='deleteFunc({{ $id }})''
        data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
        Delete
    </a>
</x-danger-button>
