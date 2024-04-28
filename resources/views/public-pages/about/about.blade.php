@extends('layouts.app-layout')
@section('content')
    <div class="w-full h-full p-5 lg:px-24 mb-10">
        <h1 class="text-4xl font-bold mb-6 text-center">À propos de nous</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{ asset('/images/3975085.jpg') }}" alt="Équipe 1" class="rounded-lg mb-4" />
                <h2 class="text-2xl font-semibold mb-2">Notre mission</h2>
                <p class="mb-4">Nous sommes dédiés à fournir des cours en ligne de qualité supérieure dans divers
                    domaines pour aider nos apprenants à atteindre leurs objectifs professionnels.</p>
                <h2 class="text-2xl font-semibold mb-2">Notre équipe</h2>
                <p class="mb-4">Notre équipe est composée d'experts passionnés par l'enseignement et la création de
                    contenu pédagogique pertinent et engageant.</p>
            </div>
            <div>
                <img src="{{ asset('/images/3784896.jpg') }}" alt="Équipe 2" class="rounded-lg mb-4" />
                <h2 class="text-2xl font-semibold mb-2">Notre engagement</h2>
                <p class="mb-4">Nous nous engageons à offrir une expérience d'apprentissage enrichissante et
                    interactive, en mettant l'accent sur la pratique et l'application des connaissances.</p>
                <h2 class="text-2xl font-semibold mb-2">Contactez-nous</h2>
                <p class="mb-4">N'hésitez pas à nous contacter si vous avez des questions, des suggestions ou si vous
                    souhaitez en savoir plus sur nos cours et services.</p>
            </div>
        </div>
    </div>
@endsection
