<form action="{{ route('feecollect.searchstudent') }}" method="POST">
    @csrf
    <div class="pt-4 shadow-sm bg-body-tertiary rounded d-flex justify-content-around">
        <div class="col-md-4">
            <h3>
                Search for
            </h3>
        </div>
        <div class="col-md-8">
            <div class="input-group mb-3">
                <input type="text" name="admissionno" id="admissionroll" class="form-control" placeholder="Admission No" required>
                <button class="input-group-text" id="searchbyadmission" type="submit"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('feecollect.studentlist') }}" method="POST">
    @csrf
    <div class="row p-2 shadow-sm  bg-body-tertiary rounded">
        <div class="col-md-2">
            <h3>Filtering
            </h3>
        </div>
        <div class="col-md-4 col-lg-2 col-6">
            <div class="input-group mb-3">
                <label for="class_id" class="input-group-text">Class<span class="text-danger">*</span></label>
                <select name="class_id" id="class_id" class="form-select form-select-sm" required>
                    <option value="-1">Select...</option>
                    @foreach ($standards as $standard)
                        <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-6">
            <div class="input-group mb-3">
                <label for="section_id" class="input-group-text">Section<span class="text-danger">*</span></label>
                <select name="section_id" id="section_id" class="form-select form-select-sm" required>
                    <option value="-1">Select...</option>
                </select>
            </div>
        </div>
        <div class="col-md-8 col-lg-4 col-8">
            <div class="input-group mb-3">
                <label for="student_id" class="input-group-text">Student<span class="text-danger">*</span></label>
                <select name="student_id" id="student_id" class="form-select form-select-sm">
                    <option value="-1">Select...</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-4 text-end">

            <button type="submit" class="btn btn-info ps-2"><i class="fa fa-search"></i> Search</button>
        </div>

    </div>
</form>
