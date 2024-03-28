@extends('layout.app')
@section('title')
{{__('Home')}}
@endsection
@section('main')
<main id="main" class="main">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class=" d-flex justify-content-between">
                    <h4 class="card-title p-0">All Users List</h4>
                    <div class="button">
                        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class='bx bx-plus'></i>New User</a>
                        {{-- <a href="{{ route('user.bulkupload') }}" class="btn btn-primary"></i>Bulk Upload</a> --}}
                        {{-- @if (request('status') || request('role_by') || request('search'))
                        <a href="{{route('user.index')}}" class="btn btn-danger">Reset</a>
                        @endif --}}
                    </div>
                </div>
            </div>

            <form id="formSubmit" action="{{route('users.index')}}" method="GET" onchange="this.submit();">
                <div class="card-body border-bottom row p-3">
                    <div class="col-lg-4 col-md-6 col-12">

                        <label>Search</label>
                        <input type="text" name="search" class="form-control" id="searchbar" placeholder="Enter mail or username">
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 ">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="" {{ request('status')== '' ? 'selected' : ''}}>
                                All
                            </option>
                            <option value="active" {{ request('status')== 'active' ? 'selected' : ''}}>
                                Active
                            </option>
                            <option value="inactive" {{ request('status')== 'inactive' ? 'selected' : ''}}>
                                Inactive
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 ">
                        <label>Role By</label>
                        <select name="role_by" class="form-control">
                            <option value="" {{ request('role_by')== '' ? 'selected' : ''}}>
                                All
                            </option>
                            <option value="user" {{ request('role_by')== 'user' ? 'selected' : ''}}>
                                User
                            </option>
                            <option value="approver" {{ request('role_by')== 'approver' ? 'selected' : ''}}>
                                Approver
                            </option>
                            <option value="admin" {{ request('role_by')== 'admin' ? 'selected' : ''}}>
                                Admin
                            </option>
                        </select>
                    </div>
                </div>
            </form>

            <div class="card-body table-responsive p-0">
                <table class=" table datatable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Emp Id</th>
                            <th>User</th>
                            <th>Role/Position</th>
                            <th>Account Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->emp_id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->account_status}}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="post" action="{{ route('users.destroy',$user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">record not found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>







</main>-- End #main -->
@endsection
