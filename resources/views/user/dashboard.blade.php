@extends('templates.master')

<img src="https://i.pinimg.com/originals/96/97/45/9697454708c8c4d26a5acee8e26a78ed.png"
    style="position:absolute; width:100%">
@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
<section class="hero-section">
    <div class="container" style="padding-top: 16%">
        <div class="row">
            <div class="col-md-6 hero-text">
                <h2>BEM VINDO {{mb_strtoupper(Auth::user()->name)}} AO <br>
                    <h2 style="color: #1E90FF; text-align:center">EASYNVEST</h2>
                </h2><br>
            </div>
            <div class="col-md-6">
                <img src="img/laptop.png" class="laptop-image" alt="">
            </div>
        </div>
    </div>
</section>
@endsection