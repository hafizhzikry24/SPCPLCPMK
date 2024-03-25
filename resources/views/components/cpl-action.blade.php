<x-edit-button onClick='editFunc({{ $id }})'>
    <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
        Edit
    </a>
</x-edit-button>


<x-danger-button onClick='deleteFunc({{ $id }})' class="">
    <a href="javascript:void(0);" id="delete-company" data-toggle="tooltip" data-original-title="Delete"
        class="delete btn btn-danger">
        Remove
    </a>
</x-danger-button>
