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
                            <th class="header text-center filter-select filter-exact" scope="col">{{ ('Student\'s ID') }}</th>
                            <th class="header text-center" scope="col"> </th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Student\'s Name') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Student\'s Email') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Uploader\'s Name') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('View Student\'s Schedule') }}</th>
                            <th class="header filter-select filter-exact text-center" scope="col">{{ __('Uploaded at') }}</th>
                        </tr>
                    </thead>
                    @foreach ( $users as $user)
                        <tr>
                            <th class="text-center" scope="row">{{ $user->id }}</th>
                            <td class="text-center" scope="row">
                                @if($user->image)
                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatars.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                            </td>
                            <td  class="text-center" scope="col">{{ $user->firstname." ".$user->lastname }}</td>
                            <td  class="text-center" scope="col">{{ $user->email }}</td>
                            <td class="text-center" scope="col">{{ Auth::user()->name }}</td>
                            <td class="text-center" scope="col">
                                {{-- Modal Students Schedule Form --}}
                                <button type="button" class=" btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1{{ $user->id }}"><i class="bi bi-eye"></i></button>
                                    <div class="modal fade " id="exampleModalCenter1{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                            <div class="modal-content">
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
                                                                <div class="col-md-2">
                                                                    <label for="name" class="col-form-label">{{ __('Family Name') }}</label>
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->lastname }}" >
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="name" class="col-form-label">{{ __('Given Name') }}</label>
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->firstname }}" >
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="name" class="col-form-label">{{ __('Middle Name') }}</label>
                                                                    <input class="form-control" value="{{ $user->middlename }}" >
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="name" class="col-form-label">{{ __('Student ID') }}</label>
                                                                    <input class="form-control" value="{{ $user->studentId }}" >
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="name" class="col-form-label">{{ __('Civil Status') }}</label>
                                                                    <input class="form-control" value="{{ $user->civil_status }}" >
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                                                        <input id="email" type="email" placeholder="yourname@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text"><i class="fa fa-location-arrow"></i></div>
                                                                        <input id="address" type="text" placeholder="R.T. Lim Boulevard, Baliwasan, Zamboanga City" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}">
                                                                        @error('address')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                                                    <input id="phone" type="text" placeholder="09557815639" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
                                                                    @error('phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="semester" class="col-form-label">{{ __('Semester') }}</label>
                                                                    <input name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ $user->semester }}">
                                                                    @error('semester')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="department" class="col-form-label ">{{ __('Department') }}</label>
                                                                    <input name="department" id="department" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $user->department }}">
                                                                    @error('department')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="birth_date" class="col-form-label">{{ __('Birthday') }}</label>
                                                                    <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $user->birth_date }}">
                                                                    @error('birth_date')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="age" class="col-form-label">{{ __('Age') }}</label>
                                                                    <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $user->age }}">
                                                                    @error('age')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="name" class="col-form-label">{{ __('Major') }}</label>
                                                                    <input class="form-control" value="{{ $user->major }}" >
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                                                                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}" autocomplete="gender" autofocus>
                                                                    @error('gender')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="civil_status" class="col-form-label">{{ __('Civil Status') }}</label>
                                                                    <input name="civil_status" id="civil_status" class="form-control @error('civil_status') is-invalid @enderror" name="civil_status" value="{{ $user->civil_status }}">
                                                                    @error('civil_status')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="curriculum_year" class="col-form-label">{{ __('Year Level') }}</label>
                                                                    <input name="curriculum_year" id="curriculum_year" class="form-control @error('curriculum_year') is-invalid @enderror" name="curriculum_year" value="{{ $user->curriculum_year }}">
                                                                    @error('curriculum_year')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="student_type" class="col-form-label">{{ __('Student Type') }}</label>
                                                                    <input name="student_type" id="student_type" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ $user->student_type }}">
                                                                    @error('student_type')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="student_status" class="col-form-label">{{ __('Status of Registration') }}</label>
                                                                    <input name="student_status" id="student_type" class="form-control @error('student_status') is-invalid @enderror" name="student_status" value="{{ $user->student_status }}">
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
                                                                                    <th class="header filter-select filter-exact text-center" scope="col">{{ __('Final Rating') }}</th>
                                                                                    <th class="header filter-select filter-exact text-center" scope="col">{{ __('Remarks') }}</th>
                                                                                    <th class="header filter-select filter-exact text-center" scope="col">{{ __('Posted by') }}</th>
                                                                                    <th class="header filter-select filter-exact text-center" scope="col">{{ __('Instructor/Professor') }}</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ( $user->studentSched as $sched)
                                                                            <tr>
                                                                                <td class="text-center" scope="row">{{ $sched->subjects }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->units }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->days }}</td>
                                                                                @if($sched->timeStart)
                                                                                    <td class="text-center" scope="row">{{ \Carbon\Carbon::parse($sched->timeStart)->format('g:i A')." - ".\Carbon\Carbon::parse($sched->timeEnd)->format('g:i A')  }}</td>
                                                                                @else
                                                                                    <td class="text-center" scope="row"></td>
                                                                                @endif
                                                                                <td class="text-center" scope="row">{{ $sched->room }}</td>
                                                                                <td class="text-center" scope="row">{{ __(' ') }}</td>
                                                                                <td class="text-center" scope="row">{{ __(' ') }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->admin->name }}</td>
                                                                                <td class="text-center" scope="row">{{ $sched->proffessor }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                    <div class="modal-footer">
                                                        <a href="{{ url('admin/schedule/profile/'.$user->id) }}" class="btn btn-info">{{ __('View in other page') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- <a class="btn btn-outline-success" href="{{ url('/download/student/'.$user->id) }}"><i class="fa fa-download"></i></a> --}}
                            </td>
                            <td class="text-center" scope="col">{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
