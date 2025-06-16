<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="fee-categories-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feeCategories as $feeCategory)
                <tr>
                    <td>{{ $feeCategory->name }}</td>
                    <td>{{ $feeCategory->description }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['fee-categories.destroy', $feeCategory->category_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('fee-categories.show', [$feeCategory->category_id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('fee-categories.edit', [$feeCategory->category_id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $feeCategories])
        </div>
    </div>
</div>
