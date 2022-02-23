@extends('admin.layouts.app1')

@section('content')
<div class="card shadow">
    <div class="container">
        <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif
            <div class="table-responsive-sm ">
                <table class="table data-table table-sm table-bordered table-striped table-hover nowrap">
                    <h4 class="card-title">{{ __('Schedule\'s Lists') }}</h4>
                    <thead>
                        <tr>
                            <th class="header text-center filter-select filter-exact" scope="col">{{ ('User\'s ID') }}</th>
                            <th class="header text-center" scope="col"> </th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Student\'s Name') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Student\'s Email') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Teacher\'s Name') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Teacher\'s Email') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('View') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Uploaded at') }}</th>
                        </tr>
                    </thead>
                    @foreach ($scheds as $sched)
                    <tbody>
                        <tr>
                            <th class="text-center" scope="row">{{ $sched->user->id }}</th>
                            <td class="text-center" scope="row"><img class="rounded-circle" src="{{asset('/storage/images/avatar.png')}}" alt="image" style="width: 50px;height: 50px; padding: 5px; margin: 0px; "></td>
                            <td class="text-center" scope="row">{{ $sched->user->name }}</td>
                            <td class="text-center" scope="row">{{ $sched->user->email }}</td>
                            <td class="text-center" scope="row">{{ $sched->teacher->name }}</td>
                            <td class="text-center" scope="row">{{ $sched->teacher->email }}</td>
                            <td  class="text-center">
                                {{-- Modal VIew Schedule Form --}}
                                <button type="button" class=" btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1{{ $sched->id }}"><i class="bi bi-eye"></i></button>
                                <div class="modal fade" id="exampleModalCenter1{{ $sched->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle1">Schedule Form</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <fieldset disabled="disabled">
                                                    <div class="row text-center">
                                                        <div class="col-md-12">
                                                            <img src="{{asset('/storage/images/avatars.png')}}" alt="avatar" class="rounded-circle img-thumbnail" style="width: 100px;">
                                                            <p class="h4">{{ __('Schedule Form') }}</p>
                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $sched->user->name }}" >
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                                    <input id="email" type="email" placeholder="yourname@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $sched->user->email }}">
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="username" class="col-form-label">{{ __('Username') }}</label>
                                                                    <input id="username" type="text" placeholder="juandelacruz69" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $sched->user->username }}">
                                                                    @error('username')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text"><i class="fa fa-location-arrow"></i></div>
                                                                <input id="address" type="text" placeholder="R.T. Lim Boulevard, Baliwasan, Zamboanga City" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $sched->user->address }}">
                                                                @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                                                <input id="phone" type="text" placeholder="09557815639" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $sched->user->phone }}">
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                                                                <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $sched->user->gender }}" autocomplete="gender" autofocus>
                                                                @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-md-3">
                                                                <label for="department" class="col-form-label ">{{ __('Department') }}</label>
                                                                    <input name="department" id="department" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $sched->department }}">
                                                                    @error('department')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="birth_date" class="col-form-label">{{ __('Birthday') }}</label>
                                                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $sched->user->birth_date }}">
                                                                @error('birth_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="semester" class="col-form-label">{{ __('Semester') }}</label>
                                                                <input name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ $sched->semester }}">
                                                                    @error('semester')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="civil_status" class="col-form-label">{{ __('Civil Status') }}</label>
                                                                <input name="civil_status" id="civil_status" class="form-control @error('civil_status') is-invalid @enderror" name="civil_status" value="{{ $sched->civil_status }}">
                                                                    @error('civil_status')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="curriculum_year" class="col-form-label">{{ __('Year Level') }}</label>
                                                                <input name="curriculum_year" id="curriculum_year" class="form-control @error('curriculum_year') is-invalid @enderror" name="curriculum_year" value="{{ $sched->curriculum_year }}">
                                                                    @error('curriculum_year')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="age" class="col-form-label">{{ __('Age') }}</label>
                                                                    <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $sched->age }}">
                                                                    @error('age')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="student_type" class="col-form-label">{{ __('Student Type') }}</label>
                                                                <input name="student_type" id="student_type" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ $sched->student_type }}">
                                                                    @error('student_type')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="student_status" class="col-form-label">{{ __('Status of Registration') }}</label>
                                                                <input name="student_status" id="student_type" class="form-control @error('student_status') is-invalid @enderror" name="student_status" value="{{ $sched->student_status }}">
                                                                    @error('student_status')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="table-responsive-sm ">
                                                                    <table class="table data-table table-sm table-bordered table-striped table-hover nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="header text-center filter-select filter-exact" scope="col">{{ ('Subject') }}</th>
                                                                                <th class="header text-center" scope="col">{{ ('Unit\'s') }} </th>
                                                                                <th class="header filter-select filter-exact" scope="col">{{ __('Day') }}</th>
                                                                                <th class="header filter-select filter-exact text-center" scope="col">{{ __('Time') }}</th>
                                                                                <th class="header filter-select filter-exact text-center" scope="col">{{ __('Room') }}</th>
                                                                                <th class="header filter-select filter-exact text-center" scope="col">{{ __('Instructor/Professor') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center" scope="row">{{ $sched->subjects }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->units }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->days }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->time }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->room }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->teacher->name }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>

                                            </div>
                                            <div class="modal-footer">
                                                </fieldset>
                                            </form>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td  class="text-center" scope="row">{{ $sched->created_at->format('m/d/y h:i:s') }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $scheds->links() }}
            </div>
        </div>
    </div>
</div>
@endsection