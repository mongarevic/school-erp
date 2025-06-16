<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="income-categories-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($incomeCategories as $incomeCategory)
                <tr>
                    <td>{{ $incomeCategory->name }}</td>
                    <td>{{ $incomeCategory->description }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['income-categories.destroy', $incomeCategory->category_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('income-categories.show', [$incomeCategory->category_id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('income-categories.edit', [$incomeCategory->category_id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $incomeCategories])
        </div>
    </div>
</div>
