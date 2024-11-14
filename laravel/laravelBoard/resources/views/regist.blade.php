@extends('layout.layout')

@section('title', '로그인 페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px;" action="{{ route('register') }}" method="POST">
            @csrf
            @if($errors->any())
                <div id= "errorMsg" class="form-text text-danger">
                    @foreach ($errors->all() as $errorMsg)
                    <span>{{ $errorMsg }}</span>
                    <br>
                    @endforeach
                </div>
            @endif  

            <div class="mb-3">
                <label for="u_email" class="form-label">아이디</label>
                <input type="email" class="form-control" id="u_email" name="u_email" required>
            </div>
            <div class="mb-3">
                <label for="u_password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_password" name="u_password" required>
            </div>
            <div class="mb-3">
                <label for="u_password_chk" class="form-label">비밀번호확인</label>
                <input type="password" class="form-control" id="u_password_chk" name="u_password_chk" required>
            </div>
            <div class="mb-3">
                <label for="u_name" class="form-label">이름</label>
                <input type="text" class="form-control" id="u_name" name="u_name" required>
            </div>
            
            <button type="submit" class="btn btn-dark w-100 mb-3">가입완료</button>
            <a href="{{ route('login') }}" class="btn btn-secondary w-100">취소</a>
        </form>
    </main>
@endsection