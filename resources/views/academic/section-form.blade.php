<div class="row">
    <div class="form-group col-8">
        {{ html()->label('Name')->for('name') }}
        {{ html()->text('name')->class('form-control') }}
    </div>
    <div class="form-group col">
        {{ html()->label('Status')->for('status') }}
        {{ html()->select('status', ['1' => 'Active', '0' => 'Inactive'])->class('form-control') }}
    </div>
</div>
