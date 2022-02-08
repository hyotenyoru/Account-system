@extends('layouts.app')

@section('content')
    <div>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Product</a></li>
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
            <div><h2>編輯:<?php echo $product->product_name?></h2></div> 
            <form method="POST" action="/product/<?php echo $product->product_id?>" class="row gy-2"> 
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="inputName" class="form-label">計畫名稱</label> 
                    <input type="text" name="name" id="inputName" placeholder="請輸入計畫名稱" class="form-control" value="{{old('name',$product->product_name)}}">
                </div>
                <div class="col-12">
                    <label for="inputMoney" class="form-label">狀態</label> 
                    <input type="text" name="money" id="inputMoney" placeholder="請輸入金額" class="form-control" value="{{old('money',$product->product_money)}}">
                </div>
                <div class="col-12">
                    <label for="inputLog" class="form-label">備註</label> 
                    <input type="text" name="log" id="inputLog" placeholder="備註可不填" class="form-control" value="{{old('log',$product->product_log)}}">
                </div> 
                <div class="row justify-content-end gy-2">
                    <button type="submit" class="btn btn-primary col col-lg-2">更新</button>
                </div>
            </form>
        </div>
    </div>
@endsection
