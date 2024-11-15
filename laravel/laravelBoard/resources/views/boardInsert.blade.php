@extends('layout.layout')

@section('title', '로그인 페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 300px;" action="{{ route('boards.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="b_title" class="form-label">제목</label>
            <input type="text" class="form-control" id="b_title" name="b_title" required>
        </div>
        <div class="mb-3">
            <label for="b_content" class="form-label">내용</label>
            <input type="text" class="form-control" id="b_content" name="b_content" required>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">이미지</label>
            <input type="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-dark w-100 mb-3">작성</button>
        <a href="{{ route('boards.index') }}" class="btn btn-secondary w-100">취소</a>

        <input type="hidden" name="bc_type" value="{{ $bcType }}">
    </form>
</main>
@endsection