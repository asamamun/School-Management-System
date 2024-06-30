@extends('layouts.main', ['title' => 'Admission'])

@section('content')
<h1>Admission Form</h1>
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">  <i class="fas fa-chevron-left mr-1"></i>
    <span class="d-none d-sm-inline">Back</span>
</a>
<div class="card ot-card">
    <div class="card-body">
        <form
            action="{{ route('admission.store') }}"
            enctype="multipart/form-data"
            method="post"
            id="admissionForm"
        >
            @csrf
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="row">
                        {{-- <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Admission NO
                                <span class="fillable">*</span></label
                            >
                            <input
                                class="form-control ot-input"
                                type="number"
                                name="admission_no"
                                list="datalistOptions"
                                id="exampleDataList"
                                placeholder="Enter Admission NO"
                                value=""
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Roll NO <span class="fillable">*</span></label
                            >
                            <input
                                class="form-control ot-input"
                                name="roll_no"
                                list="datalistOptions"
                                id="exampleDataList"
                                type="number"
                                placeholder="Enter roll no"
                                value=""
                            />
                        </div> --}}
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >First name
                                <span class="fillable">*</span></label
                            >
                            <input
                                class="form-control ot-input"
                                name="first_name"
                                list="datalistOptions"
                                id="exampleDataList"
                                placeholder="Enter first name"
                                value=""
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Last name
                                <span class="fillable">*</span></label
                            >
                            <input
                                class="form-control ot-input"
                                name="last_name"
                                list="datalistOptions"
                                id="exampleDataList"
                                placeholder="Enter last name"
                                value=""
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Mobile <span class="fillable"></span
                            ></label>
                            <input
                                class="form-control ot-input"
                                name="mobile"
                                list="datalistOptions"
                                id="exampleDataList"
                                type="number"
                                placeholder="Enter mobile"
                                value=""
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Email <span class="fillable"></span
                            ></label>
                            <input
                                class="form-control ot-input"
                                name="email"
                                list="datalistOptions"
                                id="exampleDataList"
                                type="email"
                                placeholder="Enter email"
                                value=""
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Class <span class="fillable">*</span></label
                            >
                            <select
                                id="getSections"
                                class="nice-select niceSelect bordered_style wide form-control"
                                name="class"
                                aria-describedby="validationServer04Feedback"                                
                            >
                                <option value="">Select class(ClassName-ShiftName-SectionName-Version)</option>
                                @foreach ($standards as $standard)
                                    <option value="{{ $standard->id }}">
                                        {{ $standard->name }}-
                                        {{ $standard->shift->name }}-
                                        {{ $standard->section->name }}-
                                        {{ $standard->version }}
                                    </option>
                                    
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Section <span class="fillable">*</span></label
                            >
                            <select
                                id="getSections"
                                class="nice-select sections niceSelect bordered_style wide"
                                name="section"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select section</option>
                            </select>
                            <div
                                class="nice-select sections niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select section</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select section
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Shift <span class="fillable"></span
                            ></label>
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="shift"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select shift</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select shift</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select shift
                                    </li>
                                    <li data-value="1" class="option">1st</li>
                                    <li data-value="2" class="option">2nd</li>
                                    <li data-value="3" class="option">3rd</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Date of Birth
                                <span class="fillable">*</span></label
                            >
                            <input
                                type="date"
                                class="form-control ot-input"
                                name="date_of_birth"
                                list="datalistOptions"
                                id="exampleDataList"
                                placeholder="Date of Birth"
                                value=""
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Religion <span class="fillable"></span
                            ></label>
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="religion"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select religion</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Christian</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select religion</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select religion
                                    </li>
                                    <li data-value="1" class="option">Islam</li>
                                    <li data-value="2" class="option">Hindu</li>
                                    <li data-value="3" class="option">
                                        Christian
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Gender <span class="fillable"></span
                            ></label>
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="gender"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select gender</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select gender
                                    </li>
                                    <li data-value="1" class="option">Male</li>
                                    <li data-value="2" class="option">
                                        Female
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Category <span class="fillable"></span
                            ></label>
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="category"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select category</option>
                                <option value="1">Regular</option>
                                <option value="2">Eregular</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select category</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select category
                                    </li>
                                    <li data-value="1" class="option">
                                        Regular
                                    </li>
                                    <li data-value="2" class="option">
                                        Eregular
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Blood <span class="fillable"></span
                            ></label>
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="blood"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select blood</option>
                                <option value="1">A+</option>
                                <option value="2">A-</option>
                                <option value="3">B+</option>
                                <option value="4">B-</option>
                                <option value="5">O+</option>
                                <option value="6">O-</option>
                                <option value="7">AB+</option>
                                <option value="8">AB-</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select blood</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select blood
                                    </li>
                                    <li data-value="1" class="option">A+</li>
                                    <li data-value="2" class="option">A-</li>
                                    <li data-value="3" class="option">B+</li>
                                    <li data-value="4" class="option">B-</li>
                                    <li data-value="5" class="option">O+</li>
                                    <li data-value="6" class="option">O-</li>
                                    <li data-value="7" class="option">AB+</li>
                                    <li data-value="8" class="option">AB-</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="exampleDataList" class="form-label"
                                >Admission date
                                <span class="fillable">*</span></label
                            >
                            <input
                                type="date"
                                class="form-control ot-input"
                                name="admission_date"
                                list="datalistOptions"
                                id="exampleDataList"
                                placeholder="Admission date"
                                value=""
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="exampleDataList" class="form-label"
                                >Image (100 x 100 px)<span
                                    class="fillable"
                                ></span
                            ></label>
                            <div class="ot_fileUploader left-side mb-3">
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Image"
                                    readonly=""
                                    id="placeholder"
                                />
                                <button
                                    class="primary-btn-small-input"
                                    type="button"
                                >
                                    <label
                                        class="btn btn-lg ot-btn-primary"
                                        for="fileBrouse"
                                        >Browse</label
                                    >
                                    <input
                                        type="file"
                                        class="d-none form-control"
                                        name="image"
                                        id="fileBrouse"
                                        accept="image/*"
                                        style="display: none"
                                    />
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 parent mb-3">
                            <label for="validationServer04" class="form-label"
                                >Select parent
                                <span class="fillable">*</span></label
                            >
                            <select
                                class="parent nice-select niceSelect bordered_style wide"
                                name="parent"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="">Select parent</option>
                            </select>
                            <div
                                class="nice-select parent niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Select parent</span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="" class="option selected">
                                        Select parent
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="#"
                                >Attend School Previously
                            </label>
                            <div
                                class="input-check-radio academic-section mt-3"
                            >
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="previous_school"
                                        value="1"
                                        id="previous_school"
                                    />
                                    <label
                                        class="form-check-label ps-2 pe-5"
                                        for="previous_school"
                                        >Yes</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-3 d-none mb-3"
                            id="previous_school_info"
                        >
                            <label class="form-label" for="#"
                                >Previous School Information
                            </label>
                            <textarea
                                class="form-control"
                                rows="2"
                                name="previous_school_info"
                            ></textarea>
                        </div>
                        <div
                            class="col-xl-3 d-none mb-3"
                            id="previous_school_doc"
                        >
                            <label for="exampleDataList" class="form-label"
                                >Previous School Documents<span
                                    class="fillable"
                                ></span>
                            </label>
                            <div class="ot_fileUploader left-side mb-3">
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Image"
                                    readonly=""
                                    id="placeholder1"
                                />
                                <button
                                    class="primary-btn-small-input"
                                    type="button"
                                >
                                    <label
                                        class="btn btn-lg ot-btn-primary"
                                        for="fileBrouse1"
                                        >Browse</label
                                    >
                                    <input
                                        type="file"
                                        class="d-none form-control"
                                        name="previous_school_image"
                                        id="fileBrouse1"
                                        accept="image/*"
                                        style="display: none"
                                    />
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Place Of Birth </label>
                            <input
                                name="place_of_birth"
                                placeholder="Place Of Birth"
                                class="email form-control ot-input mb_30"
                                type="text"
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label"
                                >Student Nationality
                            </label>
                            <input
                                name="nationality"
                                placeholder="Student Nationality"
                                class="email form-control ot-input mb_30"
                                type="text"
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">CPR Number </label>
                            <input
                                name="cpr_no"
                                placeholder="CPR Number"
                                class="email form-control ot-input mb_30"
                                type="text"
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label"
                                >Student Sponken Language At Home
                            </label>
                            <input
                                name="spoken_lang_at_home"
                                placeholder="Student Sponken Language At Home"
                                class="email form-control ot-input mb_30"
                                type="text"
                            />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Residance Address </label>
                            <input
                                name="residance_address"
                                placeholder="Residance Address"
                                class="email form-control ot-input mb_30"
                                type="text"
                            />
                        </div>
                        <div class="col-md-3">
                            <label for="validationServer04" class="form-label"
                                >Status <span class="fillable">*</span></label
                            >
                            <select
                                class="nice-select niceSelect bordered_style wide"
                                name="status"
                                id="validationServer04"
                                aria-describedby="validationServer04Feedback"
                                style="display: none"
                            >
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div
                                class="nice-select niceSelect bordered_style wide"
                                tabindex="0"
                            >
                                <span class="current">Active </span>
                                <div class="nice-select-search-box">
                                    <input
                                        type="text"
                                        class="nice-select-search"
                                        placeholder="Search..."
                                    />
                                </div>
                                <ul class="list">
                                    <li data-value="1" class="option selected">
                                        Active
                                    </li>
                                    <li data-value="0" class="option">
                                        Inactive
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-24">
                        <div class="col-md-12">
                            <div
                                class="d-flex align-items-center gap-4 flex-wrap"
                            >
                                <h3 class="m-0 flex-fill fs-4">
                                    Upload Documents
                                </h3>
                                <button
                                    type="button"
                                    class="btn btn-lg ot-btn-primary radius_30px small_add_btn addNewDocument"
                                    onclick="addNewDocument()"
                                >
                                    <span
                                        ><i class="fa-solid fa-plus"></i>
                                    </span>
                                    Add
                                </button>
                                <input
                                    type="hidden"
                                    name="counter"
                                    id="counter"
                                    value="0"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table
                                    class="table school_borderLess_table table_border_hide2"
                                    id="student-document"
                                    style="margin-bottom: 0px"
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Name
                                                <span
                                                    class="text-danger"
                                                ></span>
                                            </th>
                                            <th scope="col">
                                                Document
                                                <span
                                                    class="text-danger"
                                                ></span>
                                            </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-24">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary">
                                    <span
                                        ><i class="fa-solid fa-save"></i> </span
                                    >Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    
@endsection