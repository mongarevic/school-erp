<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $supplier->name }}</p>
</div>

<!-- Contact Person Field -->
<div class="col-sm-12">
    {!! Form::label('contact_person', 'Contact Person:') !!}
    <p>{{ $supplier->contact_person }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $supplier->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $supplier->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $supplier->address }}</p>
</div>

