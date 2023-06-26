@extends('layouts.base')

@section('title', 'Главная')

@section('content')
@include('includes.slider')
<section class="crew" id="crew">
    <div class="container">
        <h2 class="crew__title">CREW</h2>
        <div class="crew__desc">
            <h3 class="crew__desc-title">Кто мы такие?</h3>
            <p class="crew__desc-desc">Dirty Animals - это коллектив гангстеров и реперов, который владеет улицами своего города. Их основатели - четыре друга из детства, которые решили использовать свой талант в музыке, чтобы выбраться из жестокой реальности своей жизни. Dirty Animals пишут тексты, которые отражают их жизненный путь и борьбу, и объединяют всех, кто верит в силу музыки и жаждет перемен в своей жизни.</p>
        </div>
        <div class="crew__list">
            <div class="crew__item">
                <img src="{{ asset('storage/images/temporary.png') }}" alt="gleb.png" class="crew__item-img">
                <h3 class="crew__item-name">ПОЖИЛОЙ<br>ГЛЕБ</h3>
                <p class="crew__item-text">Я бывший гангстер, который потерял все свои деньги из-за обмана. Я решил отомстить и атаковал склад наркокартеля, захватив деньги, оружие и наркотики. Я вернул свои деньги и вновь стал править своей организацией с большей решимостью.</p>
            </div>
            <div class="crew__item">
                <img src="{{ asset('storage/images/temporary.png') }}" alt="leha.jpg" class="crew__item-img">
                <h3 class="crew__item-name">БОЛЬШОЙ<br>КАСЯК</h3>
                <p class="crew__item-text">Меня зовут Big Blunt, я вырос в гетто, где я начал продавать наркотики и быстро занял свою нишу в банде. Я курю свои большие джойнты и знаю, что это жизнь на грани, но гетто стало для меня образом жизни, и я его принял.</p>
            </div>
            <div class="crew__item">
                <img src="{{ asset('storage/images/temporary.png') }}" alt="artem.jpg" class="crew__item-img">
                <h3 class="crew__item-name">ГРОМКИЙ<br>СЕКС</h3>
                <p class="crew__item-text">Меня зовут Loud Sex - я лучший битмейкер в городе. Моя музыка стала гимном гангстеров и я работаю со многими из них. Я люблю свою опасную жизнь и делаю ее еще более живой своими музыкальными творениями. Я Loud Sex, лучший битмейкер.</p>
            </div>
            <div class="crew__item">
                <img src="{{ asset('storage/images/temporary.png') }}" alt="igor.jpg" class="crew__item-img">
                <h3 class="crew__item-name">ТЯЖЕЛЫЙ<br>ВЕС</h3>
                <p class="crew__item-text">Меня зовут Heavy Weight, я киллер. Я без эмоций и всегда готов к работе. Деньги - единственное, что имеет значение для меня. Никто не может заплатить за мою жизнь или жизнь моих близких. Я не прощаю и никогда не забываю. Я Heavy Weight, я киллер.</p>
            </div>
        </div>
    </div>
</section>
<section class="concerts" id="concerts">
    <div class="container">
        <h2 class="concert__title">CONCERTS</h2>
        <h3 class="concert__subtitle">Ближайшие концерты</h3>
        <ol class="concert__cities">
            @foreach ($concerts as $concert)
                <li class="concert__city">{{ ${'date' . $loop->iteration} }} - {{ $concert->city }}</li>
            @endforeach
        </ol>
    </div>
</section>
@endsection