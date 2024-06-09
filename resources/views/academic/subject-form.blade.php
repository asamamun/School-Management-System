<div class="form-group">
    {{ html()->label('Name')->for('name') }} 
    {{ html()->text('name')->class('form-control') }} 
</div>   
<div class="form-group">
    {{ html()->label('Category')->for('category_id') }} 
    {{ html()->select('category_id', $categories)->class('form-select') }}
</div> 
<div class="form-group">
    {{ html()->label('Slug')->for('slug') }} 
    {{ html()->text('slug')->class('form-control') }} 
</div>   
<div class="form-group">
    {{ html()->label('Image')->for('image') }} 
    {{ html()->text('image')->class('form-control') }} 
</div>   
<div class="form-group">
    {{ html()->label('Status')->for('status') }} 
    {{ html()->select('status', ['1' => 'Active', '0' => 'Inactive'])->class('form-select') }} 
</div>


<h1>Edit Subcategory</h1>
{{ html()->modelForm($subcategory, 'PUT', route('subcategories.update', $subcategory))->open() }}
    @include('subcategories.form')

    <div class="form-group">
        {{ html()->submit('Submit')->class('btn btn-primary') }}
    </div>

{{ html()->closeModelForm() }}



<h1>Create new Subcategory</h1>
 {{ html()->form()->route('subcategories.store')->open() }}

 @include('subcategories.form')
    

    {{ html()->submit('Submit')->class('btn btn-primary') }}

{{ html()->form()->close() }}