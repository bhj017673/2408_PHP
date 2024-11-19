@extends('layout.layout')

@section('title', '게시판 페이지')

@section('cssLink')
  <link rel="stylesheet" href="/css/myCommon.css">
@endsection

@section('jsLink')
    <script src="/js/board.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('main')
<div class="text-center mt-5 mb-5">
  <h1>{{ $boardInfo->bc_name }}</h1>
    <svg onclick="redirectInsert({{ $boardInfo->bc_type }});" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
    </svg>
</div>

<main>
  @foreach ($data as $item)
  <div class="card" id="card{{$item->b_id}}">
      <img src="{{ $item->b_img }}" class="card-img-top object-fit-cover" style="height: 300px;" alt="...">
      <div class="card-body">
          <h5 class="card-title">{{ $item->b_title }}</h5>
          <p class="card-text">{{ $item->b_content}}
            <!-- Button trigger modal -->
      <button value ="{{ $item->b_id }}" type="button" class="btn btn-primary my-btn-detail" data-bs-toggle="modal" data-bs-target="#detaileModal">
          상세
      </button>
      </div>
  </div>
 @endforeach
</main>
 <!-- Modal -->
  <div class="modal fade" id="detaileModal" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalTitle">개발자입니다</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="modalCreatedAt">2024-01-01 00:00:00</p>
          <p id="modalName">사용자</p>
          <p id=modalContent>살려주세요.</p>
          <br>
          <img id="modalImg" src= "./img/help.jfif" class="object-fit-cover" style="height: 300px;" alt="">
        </div>
        <div class="modal-footer justify-content-between">
          <div id="modalDeleteParent">
            <button type="modalDelete" type="button" class="btn btn-warning">Delete</button>
          </div>
          <div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
