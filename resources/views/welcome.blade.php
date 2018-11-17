@extends('layouts.app')

@section('title', '| Acceuil')

@section('content')
    <header>
        <div class="container">
            <div class="header-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div style="margin-top: 200px;"></div>
                        <h1 class="text-white">Le site d'apprentissage dédiée aux développeurs.</h1>
                        <p class="text-white">
                        De nombreuses ressources pédagogiques vous apprendront comment créer un site Web. 
                        Mais qu'en est-il de ceux d'entre nous qui le faisons déjà à temps plein, chaque jour? 
                        Où allons-nous pour poursuivre notre éducation?</p>
                        <a href="{{ route('contact') }}" class="theme-btn">Nous-contacter</a>
                        <a href="{{ route('about') }}" class="theme-btn">A propos</a>
                    </div>
                    <div class="col-lg-6" id="text-header">
                        <div style="margin-top: 130px;"></div>
                        <img src="{{ asset('storage/header.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
        
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Nous réalisons vos projets</h2>
                <p class="lead">Spécialisée dans la création de sites internet, d'applications web. nous vous accompagnons tout au long de votre projet web de l'étude à la mise en service en passant par l'hébergement et le référencement.</p>
                <p class="lead">Nous permetons à nos clients de bénéficier en toute sécurité des meilleures solutions de l'open source, en les accompagnant tant dans le choix des solutions que dans l'intégration de développements, le déploiement, la maintenance et l'exploitation.</p>
            </div>

            <div id="left-img" class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="{{ asset('storage/formation-3.jpg')}}" alt="image">
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Formations en <span class="text-muted">technologies du web.</span></h2>
                <p class="lead">Nos formations sont centrées sur les technologies du web et de son éco-system, nous avons l'expérience du terrain nécessaire afin de réussir cette mission et pouvons vous proposer des planning aménagés sur vos horaires.</p>
                <a href="#" class="theme-btn-primary">A propos</a>
            </div>

            <div id="right-img" class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="{{ asset('storage/formation-2.jpg')}}" alt="image">
            </div>
        </div>
    </div>

    <section class="wave" style="margin-top:30px">
        <h2 class="text-white" style="text-align: center; padding:30px">Nos services sont fait pour vous</h2>
        <app-card></app-card>
    </section>
@endsection