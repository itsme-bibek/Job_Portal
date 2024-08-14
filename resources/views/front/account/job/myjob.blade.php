@extends('front.layout.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')

                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">My Jobs</h3>
                                </div>
                                <div style="margin-top: -10px;">
                                    <a href="{{ route('account.createJob') }}" class="btn btn-primary">Post a Job</a>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Job Created</th>
                                            <th scope="col">Applicants</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Web Developer</div>
                                                <div class="info1">Fulltime . Noida</div>
                                            </td>
                                            <td>05 Jun, 2023</td>
                                            <td>130 Applications</td>
                                            <td>
                                                <div class="job-status text-capitalize">active</div>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <a href="#" class="" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="job-detail.html"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="pending">
                                            <td>
                                                <div class="job-name fw-500".html Developer</div>
                                                    <div class="info1">Part-time . Delhi</div>
                                            </td>
                                            <td>13 Aug, 2023</td>
                                            <td>20 Applications</td>
                                            <td>
                                                <div class="job-status text-capitalize">pending</div>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <a href="#" class="" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="job-detail.html"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="expired">
                                            <td>
                                                <div class="job-name fw-500">Full Stack Developer</div>
                                                <div class="info1">Fulltime . Noida</div>
                                            </td>
                                            <td>27 Sep, 2023</td>
                                            <td>278 Applications</td>
                                            <td>
                                                <div class="job-status text-capitalize">expired</div>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <a href="#" class="" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="job-detail.html"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">Developer for IT company</div>
                                                <div class="info1">Fulltime . Goa</div>
                                            </td>
                                            <td>14 Feb, 2023</td>
                                            <td>70 Applications</td>
                                            <td>
                                                <div class="job-status text-capitalize">active</div>
                                            </td>
                                            <td>
                                                <div class="action-dots float-end">
                                                    <a href="#" class="" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="job-detail.html"> <i
                                                                    class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    {{-- <script type="text/javascript">
        $("#createJobForm").submit(function(e) {
            e.preventDefault();
            // console.log($("#createJobForm").serializeArray())
            // return false;

            $.ajax({
                url: '{{ route('account.saveJobs') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createJobForm").serializeArray(),
                success: function(response) { // From the json response whether we get true or false
                    if (response.status == true) {

                        $('#title').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $('#category').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $('#jobType').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $('#vacancy').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                        $('#location').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                        $('#description').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                        $('#company_name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        window.location.href = '{{ route('account.myJob') }}';


                    } else {
                        var errors = response.errors;

                        if (errors.title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title)
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.category) {
                            $("#category").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category)
                        } else {
                            $("#category").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.jobType) {
                            $("#jobType").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.jobType)
                        } else {
                            $("#jobType").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.vacancy) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy)
                        } else {
                            $("#vacancy").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.location) {
                            $("#location").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location)
                        } else {
                            $("#location").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.description) {
                            $("#description").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.description)
                        } else {
                            $("#description").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.company_name) {
                            $("#company_name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name)
                        } else {
                            $("#company_name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });

        });
    </script> --}}
@endsection
