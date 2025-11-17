@extends('layouts.main')

@section('content')
<div class="gallery-hero">
    <h1 class="gallery-title">Gallery</h1>
    <div class="gallery-sub">Empowering Communities</div>
</div>
<div class="mosaic-grid">
    <div class="item blue"><img src="/assets/img/gal1.jpg" alt="Gallery 1" class="gallery-img"></div>
    <div class="item lime"><img src="/assets/img/gal2.jpg" alt="Gallery 2" class="gallery-img"></div>
    <div class="item teal"><img src="/assets/img/gal3.jpg" alt="Gallery 3" class="gallery-img"></div>
    <div class="item orange"><img src="/assets/img/gal4.jpg" alt="Gallery 4" class="gallery-img"></div>
    <div class="item pink"><img src="/assets/img/gal5.jpg" alt="Gallery 5" class="gallery-img"></div>
    <div class="item lime"><img src="/assets/img/gal6.jpg" alt="Gallery 6" class="gallery-img"></div>
    <div class="item blue"><img src="/assets/img/gal7.jpg" alt="Gallery 7" class="gallery-img"></div>
    <div class="item pink"><img src="/assets/img/gal8.jpg" alt="Gallery 8" class="gallery-img"></div>
    <div class="item orange"><img src="/assets/img/gal9.jpg" alt="Gallery 9" class="gallery-img"></div>
    <div class="item teal"><img src="/assets/img/gal10.jpg" alt="Gallery 10" class="gallery-img"></div>
</div>
@endsection

@push('styles')
<style>
/* Remove body flex centering to avoid layout issues */
body {
    margin: 0;
    padding: 0;
    /* display: flex; */
    /* justify-content: center; */
    /* align-items: center; */
    min-height: 100vh;
}
.mosaic-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    grid-template-rows: repeat(4, 1fr);
    gap: 10px;
    width: 1100px;
    height: 1100px;
    margin: 40px auto 120px auto;
    margin-bottom: 260px; /* Increased space below grid for footer */
}
.item {
    background: #ccc;
}
.blue {
    background: #00bfff;
    grid-column: span 3;
}
.lime {
    background: #bada55;
    grid-column: span 3;
}
.teal {
    background: #3cb371;
    grid-column: span 2;
}
.orange {
    background: #ffa500;
    grid-column: span 2;
}
.pink {
    background: #e75480;
    grid-column: span 2;
}
/* Gallery Hero Section Styles */
.gallery-hero {
    margin-top: 6rem;
    margin-bottom: 3.5rem;
    text-align: center;
}
.gallery-title {
    color: #26605F;
    font-size: 3.2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    margin-top: 0;
    letter-spacing: 0.01em;
}
.gallery-sub {
    color: #444;
    font-size: 1.6rem;
    font-weight: 400;
    margin-bottom: 2.5rem;
}
/* Gallery grid images fill tile */
.gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 0;
}
</style>
@endpush 