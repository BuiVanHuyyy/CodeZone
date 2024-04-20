@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách giảng viên  </h4>
                                <a href="" class="btn btn-primary">+ Tạo mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 1200px">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Avatar</th>
                                            <th>Giới tính</th>
                                            <th>Khóa học</th>
                                            <th>Số điện thoai</th>
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($instructors as $instructor)
                                            <tr>
                                                <td>#{{ $instructor->user->id }}</td>
                                                <td><a href="{{ route('admin.instructor.show', ['instructor' => $instructor]) }}">{{ $instructor->name }}</a></td>
                                                <td><img class="rounded-circle" width="35" src="{{ $instructor->avatar }}" alt=""></td>
                                                <td>{{ $instructor->gender === 0 ? 'Nữ' : 'Nam' }}</td>
                                                <td>{{ $instructor->courses->count() }}</td>
                                                <td>{{ $instructor->phone_number }}</td>
                                                <td><a href="javascript:void(0);"><strong>{{ $instructor->user->email }}</strong></a></td>
                                                <td>
                                                    <form>
                                                        <select class="form-select" aria-label="Status select">
                                                            <option {{ $instructor->user->status === 'pending' ? 'selected' : '' }} value="pending">Chờ phê duyệt</option>
                                                            <option {{ $instructor->user->status === 'active' ? 'selected' : '' }} value="active">Hoạt động</option>
                                                            <option {{ $instructor->user->status === 'suspended' ? 'selected' : '' }} value="suspended">Khóa</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic2.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Alexander</h3>
                                            <p class="text-muted">M.COM., P.H.D.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Male</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic3.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Elizabeth</h3>
                                            <p class="text-muted">B.COM., M.COM.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic4.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Amelia</h3>
                                            <p class="text-muted">M.COM., P.H.D.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic5.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Charlotte</h3>
                                            <p class="text-muted">B.COM., M.COM.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic6.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Isabella</h3>
                                            <p class="text-muted">B.A, B.C.A</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic7.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Sebastian</h3>
                                            <p class="text-muted">M.COM., P.H.D.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Male</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic8.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Olivia</h3>
                                            <p class="text-muted">B.COM., M.COM.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic9.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Emma</h3>
                                            <p class="text-muted">B.A, B.C.A</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Female</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="images/profile/small/pic10.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Jackson</h3>
                                            <p class="text-muted">M.COM., P.H.D.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Male</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
