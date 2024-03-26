@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-restore-button onClick='cpl_restoreFunc({{ $id }})'>
        <a href="javascript:void(0);" id="delete-company" data-toggle="tooltip" data-original-title="Delete"
            class="delete btn btn-danger">
            Restore
        </a>
    </x-restore-button>
@endif

@if ($isAdmin)
    <!-- Show admin-specific content or buttons -->
    <x-danger-button onClick='cpl_deleteFunc({{ $id }})'>
        <a href="javascript:void(0);" id="delete-company" data-toggle="tooltip" data-original-title="Delete"
            class="delete btn btn-danger">
            Delete
        </a>
    </x-danger-button>
@endif
