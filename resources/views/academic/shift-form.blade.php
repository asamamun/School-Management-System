<div class="row">
    <div class="form-group col-8">
        {{ html()->label('Name')->for('name') }}
        {{ html()->text('name')->class('form-control') }}
    </div>
    <div class="form-group col-4">
        {{ html()->label('Duration')->for('duration') }}
        {{ html()->input('number', 'duration')->class('form-control') }}
    </div>
</div>
<div class="row">
    <div class="form-group col">
        {{ html()->label('Start Time')->for('start_time') }}
        {{ html()->input('time', 'start_time')->class('form-control') }}
    </div>
    <div class="form-group col">
        {{ html()->label('End Time')->for('end_time') }}
        {{ html()->input('time', 'end_time')->class('form-control') }}
    </div>
</div>
<div class="row">

    <div class="form-group col">
        {{ html()->label('Status')->for('status') }}
        {{ html()->select('status', ['1' => 'Active', '0' => 'Inactive'])->class('form-control') }}
    </div>
</div>
