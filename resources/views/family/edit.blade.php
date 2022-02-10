@extends('layouts.app')

@section('content')
    <div>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/customs">Custom</a></li>
                <li class="breadcrumb-item"><a href="<?php echo '/custom/'.$family->custom_id;?>"><?php echo $family->custom_id;?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        @if(session('success'))
            <div class="alert alert-success">更新成功!</div>    
        @elseif($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)    
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div>
            <div><h2>編輯:<?php echo $family->family_name?></h2></div> 
            <form method="POST" action="/family/<?php echo $family->family_id?>" class="row gy-2"> 
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="inputName" class="form-label">名稱</label> 
                    <input type="text" name="name" id="inputName" placeholder="請輸入家人名稱" class="form-control" value="{{old('name',$family->family_name)}}">
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">信箱</label> 
                    <input type="text" name="email" id="inputEmail" placeholder="請輸入家人信箱(可不輸入)" class="form-control" value="{{old('email',$family->family_email)}}">
                </div>
                <div class="col-12">
                    <label for="inputTel" class="form-label">電話</label> 
                    <input type="text" name="tel" id="inputTel" placeholder="請輸入家人電話(可不輸入)" class="form-control" value="{{old('tel',$family->family_tel)}}">
                </div>
                <div class="col-12">
                    <label for="inputLog" class="form-label">備註</label> 
                    <input type="text" name="log" id="inputLog" placeholder="請輸入備註(可不輸入)" class="form-control" value="{{old('log',$family->family_log)}}">
                </div>
                <div class="row justify-content-end gy-2">
                    <button type="submit" class="btn btn-primary col col-lg-2">更新</button>
                </div>
            </form>
        </div>
    </div>
@endsection
