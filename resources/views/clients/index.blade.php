@extends('layouts.app')

@section('title', 'Patient Lists')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                      <div class="list-group">
                        <a class="list-group-item list-group-item-action bg-success pt-3 text-light" aria-current="true">
                            MENU
                        </a>
                        <a href="{{ route('update-db') }}" class="list-group-item list-group-item-action " aria-current="true">
                            Update Client Database
                        </a>
                        <a href="{{ route('upcoming-appointments') }}" class="list-group-item list-group-item-action">Upcoming Appoinments</a>
                        <a href="{{ route('list-patient') }}" class="list-group-item list-group-item-action">View Patients</a>
                        <a href="{{ route('custom-sms') }}" class="list-group-item list-group-item-action">Send Custom SMS</a>
                        <a href="#" class="list-group-item list-group-item-action">Logout</a>
                      </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card" style="min-height: 500px">
                <div class="card-header bg-success text-light pt-3 pb-2">{{ __('Patient Lists') }}</div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <caption>Patient Lists Table</caption>
                                <tr>
                                    <th>HIV Clinic No.</th>
                                    <th>Family Name</th>
                                    <th>Given Name</th>
                                    <th>Gender</th>
                                    <th>Viral Load Date</th>
                                    <th>Return Visit Date</th>
                                    <th>Telephone Number</th>
                                    <th>Caregiver Tel. No.</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @if ($patients->count() > 0)
                                        @foreach ($patients as $item)
                                        <tr class="" >
                                            <td>{{ $item->hiv_clinic_no }}</td>
                                            <td>{{ $item->family_name }}</td>
                                            <td>{{ $item->given_name }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->hiv_viral_load_date }}</td>
                                            <td>{{ $item->return_visit_date }}</td>
                                            <td>{{ $item->telephone_number }}</td>
                                            <td>{{ $item->care_giver_telephone_number }}</td>
                                            <td><button class="btn btn-sm btn-success">Edit</button></td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr class="" >
                                        <td colspan="9">No Patient yet</td>
                                    </tr>
                                    @endif
                                </tbody>
                                
                        </table>
                        {{ $patients->links() }}
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
