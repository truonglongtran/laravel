@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thong tin chung</div>
                        <div class="panel-description">Nhap thong tin chung cua user</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Email<span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" autocomplete="off" placeholder="">
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Ho ten<span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right" >Nhom thanh vien<span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        <option value="0" selected>Chon nhom thanh vien</option>
                                        <option value="1" selected>Quan tri vien</option>
                                        <option value="2" selected>Cong tac vien</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Ngày sinh</label>
                                    <input type="date" name="birthday" value="{{ old('birthday') }}" class="form-control" autocomplete="off" placeholder="dd/mm/yyyy">
                                </div>
                                
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right" >Mat khau<span class="text-danger">(*)</span></label>
                                    <input type="password" name="password" value="" class="form-control" autocomplete="off" placeholder="">
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Nhap lai mat khau<span class="text-danger">(*)</span></label>
                                    <input type="password" name="re-password" value="" class="form-control" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <label for="" class="control-label text-right" >Anh dai dien</label>
                                    <input type="file" name="avatar" value="" class="form-control input-image" autocomplete="off" placeholder="" data-upload="Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thong tin lien he</div>
                        <div class="panel-description">Nhap thong tin lien cua user</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Tinh/Thanh pho<span class="text-danger">(*)</span></label>
                                    <select name="province_id" id="" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">Chon thanh pho</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                                <option value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Quan/Huyen<span class="text-danger">(*)</span></label>
                                    <select name="disitrict_id" id="" class="form-control districts location" data-target="wards">
                                    </select>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right" >Phuong/Xa<span class="text-danger">(*)</span></label>
                                    <select name="ward_id" id="" class="form-control wards ">
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Dia chi</label>
                                    <input type="text" name="address" value="{{old('address')}}" class="form-control" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right" >So dien thoai<span class="text-danger">(*)</span></label>
                                    <input type="phone" name="phone" value="{{old('phone')}}" class="form-control" autocomplete="off" placeholder="">
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="control-label text-right">Ghi chu<span class="text-danger">(*)</span></label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control" autocomplete="off" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mb15">
                <button class="btn btn-primary" type="submit" name="send" value="send">Luu lai</button>
            </div>
        </div>
    </form>
</div>
