<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="permissions-table">
            <thead>
            <tr>
                <th>Permission Name</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->permission_name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('permissions.show', [$permission->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('permissions.edit', [$permission->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $permissions])
        </div>
    </div>
</div>
