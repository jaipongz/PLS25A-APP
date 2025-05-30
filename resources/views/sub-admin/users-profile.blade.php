<!DOCTYPE html>
<html lang="en">

@include('layouts.staff_head')

<body>

    <!-- ======= Header ======= -->
    @include('layouts.staff_navbar')<!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.staffaside')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>โปรไฟล์</h1>
        </div><!-- End Page Title -->
        @foreach ($user as $users)
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <div class="profile_pic">
                                    <img id="profileImage" src="{{ url('public/public/image/' . $users->profile_pic) }}"
                                        alt="Profile">
                                </div>
                                <h2>{{ $users->name }}</h2>
                                <h3 class="group">{{ $users->groups }}</h3>
                                {{-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">ภาพรวม</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-edit">แก้ไขโปรไฟล์</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-craeteby">Create By</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">ชื่อ - นามสกุล</div>
                                            <div class="col-lg-9 col-md-8">{{ $users->name }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">หมวดหมู่ / สาขา</div>
                                            <div class="col-lg-9 col-md-8">{{ $users->groups }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">ทักษะความสามารถ</div>
                                            <div class="col-lg-9 col-md-8">{{ $users->skill }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">ที่อยู่</div>
                                            <div class="col-lg-9 col-md-8">{{ $users->address }}
                                                ตำบล{{ $users->tambon }}
                                                อำเภอ{{ $users->amphoe }} จังหวัด{{ $users->province }}
                                                <br>
                                                รหัสไปรษณีย์ {{ $users->zipcode }}

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">เบอร์โทร</div>
                                            <div class="col-lg-9 col-md-8">{{ $users->tel }}</div>
                                        </div>

                                        {{-- <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$users->email}}</div>
                                    </div> --}}

                                        {{-- <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                    </div> --}}

                                    </div>

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                        <!-- Profile Edit Form -->

                                        <form action="{{ route('staff.edituser', ['id' => $users->id]) }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label for="profileImage"
                                                    class="col-md-4 col-lg-3 col-form-label">รูปโปรไฟล์</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <div class="editprofile">
                                                        <img id="previewImage" name="oldprofile"
                                                            src="{{ url('public/public/image/' . $users->profile_pic) }}"
                                                            alt="Profile">
                                                    </div>
                                                    <div class="pt-2">
                                                        <a href="#" id="fileLink" class="btn btn-primary btn-sm"
                                                            title="Upload new profile image"><i
                                                                class="bi bi-upload"></i></a>
                                                        <input type="file" name="newprofile" id="fileInput"
                                                            style="display: none;">
                                                        {{-- <input type="file"> --}}
                                                        <a href="#" class="btn btn-danger btn-sm"
                                                            title="Remove my profile image"><i class="bi bi-trash">
                                                            </i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">ชื่อ -
                                                    นามสกุล</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newname" type="text" class="form-control"
                                                        id="fullName" value="{{ $users->name }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="company" class="col-md-4 col-lg-3 col-form-label">หมวดหมู่
                                                    / สาขา</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newgroup" type="text" class="form-control"
                                                        id="company" value="{{ $users->groups }}">
                                                    <select class="form-select" name="newgroup" id="selectInput"
                                                        style="display: none;">
                                                        <option selected>กรุณาเลือก</option>
                                                        @foreach ($group as $group)
                                                            <option value="{{ $group->skill }}">{{ $group->skill }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Job"
                                                    class="col-md-4 col-lg-3 col-form-label">ทักษะความสามารถ</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newskill" type="text" class="form-control"
                                                        id="Job" value="{{ $users->skill }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Country"
                                                    class="col-md-4 col-lg-3 col-form-label">ที่อยู่</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newaddress" type="text" class="form-control"
                                                        id="Country" value="{{ $users->address }}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="inputText" class="col-sm-3 col-form-label">จังหวัด</label>
                                                <div class="col-sm-6">
                                                    <select name="province" class="form-control" id="input_province">
                                                        <option name="province" value="{{ $users->province }}">
                                                            {{ $users->province }}
                                                        </option>
                                                        @foreach ($provinces as $item)
                                                            <option value="{{ $item->province }}">
                                                                {{ $item->province }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <label for="inputText" class="col-sm-3 col-form-label">อำเภอ</label>
                                                <div class="col-sm-6">
                                                    <select name="amphoe" class="form-control" id="input_amphoe">
                                                        <option value="{{ $users->amphoe }}">{{ $users->amphoe }}
                                                        </option>
                                                        @foreach ($amphoes as $item)
                                                            <option value="{{ $item->amphoe }}">{{ $item->amphoe }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <label for="inputText" class="col-sm-3 col-form-label">ตำบล</label>

                                                <div class="col-sm-6">
                                                    <select name="tambon" class="form-control" id="input_tambon">
                                                        <option value="{{ $users->tambon }}">{{ $users->tambon }}
                                                        </option>
                                                        @foreach ($tambons as $item)
                                                            <option value="{{ $item->tambon }}">{{ $item->tambon }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4" style="display: none">
                                                <label for="inputNumber"
                                                    class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                                                <div class="col-sm-4">
                                                    <input id="input_zipcode" value="{{ $users->zipcode }}"
                                                        type="address" name="zipcode" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Phone"
                                                    class="col-md-4 col-lg-3 col-form-label">เบอร์โทรศัพท์</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newphone" type="text" class="form-control"
                                                        id="Phone" value="{{ $users->tel }}">
                                                </div>
                                            </div>

                                            {{-- <div class="row mb-3">
                                                <label for="Email"
                                                    class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control"
                                                        id="Email" value="k.anderson@example.com">
                                                </div>
                                            </div> --}}
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form action="{{ route('resetuser', ['id' => $users->id]) }}" method="POST">

                                            <div class="row mb-3">
                                                <label for="currentPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">รหัสผ่านปัจจุบัน</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="oldpass" type="password" class="form-control"
                                                        id="currentPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="newPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">รหัสผ่านใหม่</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newpass" type="password" class="form-control"
                                                        id="newPassword">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="renewPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">ป้อนรหัสผ่านใหม่</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="confirmpass" type="password" class="form-control"
                                                        id="renewPassword">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-primary">เปลี่ยนรหัสผ่าน</button>
                                            </div>
                                        </form><!-- End Change Password Form -->
                                    </div>

                                    @foreach ($creator as $creator)
                                    @endforeach
                                    <div class="tab-pane fade profile-craeteby" id="profile-craeteby">
                                        <h5 class="card-title">ข้อมูลโปรไฟล์</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">ชื่อ - นามสกุล</div>
                                            <div class="col-lg-9 col-md-8">{{ $creator->name }}</div>
                                        </div>



                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">ที่อยู่</div>
                                            <div class="col-lg-9 col-md-8">{{ $creator->address }}
                                                ตำบล{{ $creator->tambon }}
                                                อำเภอ{{ $creator->amphoe }} จังหวัด{{ $creator->province }}
                                                <br>
                                                รหัสไปรษณีย์ {{ $creator->zipcode }}

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">เบอร์โทร</div>
                                            <div class="col-lg-9 col-md-8">{{ $creator->tel }}</div>
                                        </div>
                                    </div>



                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endforeach

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.jpindustry')

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- <link rel="stylesheet" href={{ asset('public/venstaff/bootstrap/css/bootstrap.min.css') }}> --}}
    @include('layouts.staffsrc')
    @include('layouts.tambonsc')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileLink = document.getElementById('fileLink');
            const fileInput = document.getElementById('fileInput');
            const previewImage = document.getElementById('previewImage');

            if (fileLink && fileInput && previewImage) {
                fileLink.addEventListener('click', function(event) {
                    event.preventDefault(); // กันไม่ให้ jump
                    fileInput.click(); // เปิดตัวเลือกไฟล์
                });

                fileInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result; // set รูปที่ preview
                            previewImage.style.display = 'block'; // เผื่อเคยโดนซ่อนไว้
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>

</body>

</html>
