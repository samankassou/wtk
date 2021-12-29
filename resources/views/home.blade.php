@extends('layouts.frontend')

@section('content')

<div id="ismain-homes">
    <div>
        <div class="box_shadow" style="margin-top: 0;">
            <div class="container-fluid w90">
                <div class="homehouse projecthome">
                    <div class="row">
                        <div class="col-12">
                            <h2>Featured properties</h2>
                            <p>Below is a list of properties that are featured</p>
                        </div>
                    </div>
                    <div class="row rowm10">
                        @foreach ($propertiesForRent as $property)
                        <div class="col-sm-4 col-md-3 colm10">
                            <div class="item" data-lat="{{ $property->latitude }}" data-long="{{ $property->longitude }}">
                                <div class="blii">
                                    <div class="img">
                                        <img class="thumb" data-src="{{ $property->getFirstMediaUrl('images') }}"
                                            src="{{ $property->getFirstMediaUrl('images') }}"
                                            alt="{{ $property->title }}">
                                    </div>
                                    <a href="{{ route('properties.index') }}"
                                        class="linkdetail"></a>
                                    <div class="media-count-wrapper">
                                        <div class="media-count">
                                            <img src="{{ asset('assets/img/media-count.svg') }}"
                                                alt="media">
                                            <span>{{ $property->media()->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="status"><span
                                            class="label-success status-label">{{ $property->status }}</span>
                                    </div>
                                    <ul class="item-price-wrap hide-on-list">
                                        <li class="h-type"><span>{{ $property->getFirstCategoryName() }}</span></li>
                                        <li class="item-price">{{ $property->getFormatedPrice() }} FCFA</li>
                                    </ul>
                                </div>

                                <div class="description">
                                    <a href="#" class="text-orange heart add-to-wishlist" data-id="{{ $property->id }}"
                                        title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                    <a
                                        href="{{ route('properties.index') }}">
                                        <h5>{{ $property->title }}</h5>
                                        <p class="dia_chi"><i class="fas fa-map-marker-alt"></i>
                                            {{ $property->location }}, {{ optional($property->city)->name }}
                                        </p>
                                    </a>
                                    <p class="threemt bold500">
                                        <span data-toggle="tooltip" data-placement="top"
                                            data-original-title="Number of rooms">
                                            <i><img src="{{ asset('assets/img/bed.svg') }}"
                                                    alt="icon"></i> <i
                                                class="vti">{{ $property->number_of_bedrooms }}</i>
                                        </span>
                                        <span data-toggle="tooltip" data-placement="top"
                                            data-original-title="Number of rest rooms"> <i><img
                                                    src="{{ asset('assets/img/bath.svg') }}"
                                                    alt="icon"></i> <i
                                                class="vti">{{ $property->number_of_bathrooms }}</i></span>
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="Square">
                                            <i><img src="{{ asset('assets/img/area.svg') }}"
                                                    alt="icon"></i> <i class="vti">{{ $property->square }}
                                                m²</i> </span>

                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container-fluid w90">
            <div class="padtop70">
                <div class="areahome">
                    <div class="row">
                        <div class="col-12">
                            <h2>Properties by locations</h2>
                            <p>Each place is a good choice, it will help you make the right decision, do not
                                miss the opportunity to discover our wonderful properties.</p>
                        </div>
                    </div>
                    <div style="position:relative;">
                        <div class="owl-carousel" id="cityslide">
                            @foreach ($cities as $city)
                            <div class="item itemarea">
                                <a href="{{ route('properties.index') }}">
                                    <img src="{{ $city->getFirstMediaUrl('cover') }}" alt="{{ $city->name }}">
                                    <h4>{{ $city->name }}</h4>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <i class="am-next"><img src="{{ asset('assets/img/aright.png') }}"
                                alt="next"></i>
                        <i class="am-prev"><img src="{{ asset('assets/img/aleft.png') }}"
                                alt="prev"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="padtop70">
            <div class="box_shadow">
                <div class="container-fluid w90">
                    <div class="homehouse projecthome">
                        <div class="row">
                            <div class="col-12">
                                <h2>Properties For Sale</h2>
                                <p>Below is a list of properties that are currently up for sale</p>
                            </div>
                        </div>
                        <div class="row rowm10">
                            @foreach ($propertiesForRent as $property)
                            <div class="col-sm-4 col-md-3 colm10">
                                <div class="item" data-lat="{{ $property->latitude }}" data-long="{{ $property->longitude }}">
                                    <div class="blii">
                                        <div class="img">
                                            <img class="thumb" data-src="{{ $property->getFirstMediaUrl('images') }}"
                                                src="{{ $property->getFirstMediaUrl('images') }}"
                                                alt="{{ $property->title }}">
                                        </div>
                                        <a href="{{ route('properties.index') }}"
                                            class="linkdetail"></a>
                                        <div class="media-count-wrapper">
                                            <div class="media-count">
                                                <img src="{{ asset('assets/img/media-count.svg') }}"
                                                    alt="media">
                                                <span>{{ $property->media()->count() }}</span>
                                            </div>
                                        </div>
                                        <div class="status"><span
                                                class="label-success status-label">{{ $property->status }}</span>
                                        </div>
                                        <ul class="item-price-wrap hide-on-list">
                                            <li class="h-type"><span>{{ $property->getFirstCategoryName() }}</span></li>
                                            <li class="item-price">{{ $property->getFormatedPrice() }} FCFA</li>
                                        </ul>
                                    </div>

                                    <div class="description">
                                        <a href="#" class="text-orange heart add-to-wishlist"
                                            data-id="{{ $property->id }}" title="I care about this property!!!"><i
                                                class="far fa-heart"></i></a>
                                        <a
                                            href="{{ route('properties.index') }}">
                                            <h5>{{ $property->title }}</h5>
                                            <p class="dia_chi"><i class="fas fa-map-marker-alt"></i>
                                                {{ $property->location }}, {{ optional($property->city)->name }}
                                            </p>
                                        </a>
                                        <p class="threemt bold500">
                                            <span data-toggle="tooltip" data-placement="top"
                                                data-original-title="{{ __('Number of rooms') }}">
                                                <i><img src="{{ asset('assets/img/bed.svg') }}"
                                                        alt="icon"></i> <i
                                                    class="vti">{{ $property->number_of_bedrooms }}</i>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="top"
                                                data-original-title="Number of rest rooms"> <i><img
                                                        src="{{ asset('assets/img/bath.svg') }}"
                                                        alt="icon"></i> <i
                                                    class="vti">{{ $property->number_of_bathrooms }}</i></span>
                                            <span data-toggle="tooltip" data-placement="top"
                                                data-original-title="Square"> <i><img
                                                        src="{{ asset('assets/img/area.svg') }}"
                                                        alt="icon"></i> <i class="vti">{{ $property->square }}
                                                    m²</i> </span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container-fluid w90">
            <div class="homehouse padtop30 projecthome">
                <div class="row">
                    <div class="col-12">
                        <h2>Properties For Rent</h2>
                        <p>Below is a detailed price list of each property for rent</p>
                    </div>
                </div>
                <div class="row rowm10">
                    @foreach ($propertiesForRent as $property)
                    <div class="col-sm-4 col-md-3 colm10">
                        <div class="item" data-lat="43.522464" data-long="-76.173911">
                            <div class="blii">
                                <div class="img">
                                    <img class="thumb" data-src="{{ $property->getFirstMediaUrl('images') }}"
                                        src="{{ $property->getFirstMediaUrl('images') }}"
                                        alt="5 room luxury penthouse for sale in Kuala Lumpur">
                                </div>
                                <a href="{{ route('properties.index') }}"
                                    class="linkdetail"></a>
                                <div class="media-count-wrapper">
                                    <div class="media-count">
                                        <img src="{{ asset('assets/img/media-count.svg') }}"
                                            alt="media">
                                        <span>{{ $property->media()->count() }}</span>
                                    </div>
                                </div>
                                <div class="status"><span
                                        class="label-success status-label">{{ $property->status }}</span></div>
                                <ul class="item-price-wrap hide-on-list">
                                    <li class="h-type"><span>{{ $property->getFirstCategoryName() }}</span></li>
                                    <li class="item-price">{{ $property->getFormatedPrice() }} FCFA</li>
                                </ul>
                            </div>

                            <div class="description">
                                <a href="#" class="text-orange heart add-to-wishlist" data-id="{{ $property->id }}"
                                    title="I care about this property!!!"><i class="far fa-heart"></i></a>
                                <a href="{{ route('properties.index') }}">
                                    <h5>{{ $property->title }}</h5>
                                    <p class="dia_chi"><i class="fas fa-map-marker-alt"></i>
                                        {{ $property->location }}, {{ optional($property->city)->name }}</p>
                                </a>
                                <p class="threemt bold500">
                                    <span data-toggle="tooltip" data-placement="top"
                                        data-original-title="Number of rooms">
                                        <i><img src="{{ asset('assets/img/bed.svg') }}"
                                                alt="icon"></i> <i class="vti">{{ $property->number_of_bedrooms }}</i>
                                    </span>
                                    <span data-toggle="tooltip" data-placement="top"
                                        data-original-title="Number of rest rooms"> <i><img
                                                src="{{ asset('assets/img/bath.svg') }}"
                                                alt="icon"></i> <i
                                            class="vti">{{ $property->number_of_bathrooms }}</i></span>
                                    <span data-toggle="tooltip" data-placement="top" data-original-title="Square">
                                        <i><img src="{{ asset('assets/img/area.svg') }}"
                                                alt="icon"></i> <i class="vti">{{ $property->square }} m²</i>
                                    </span>

                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="padtop70">
            <div class="box_shadow">
                <div class="container-fluid w90">
                    <div class="homehouse projecthome">
                        <div class="row">
                            <div class="col-12">
                                <h2>Featured Agents</h2>
                            </div>
                        </div>
                        <div class="row rowm10 list-agency">
                            <!---->
                            @foreach ($featuredAgents as $agent)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="agents-grid">

                                    <div class="agents-grid-wrap">

                                        <div class="fr-grid-thumb">
                                            <a href="{{ route('agents.index', ['agent' => $agent->username]) }}">
                                                <img src="{{ $agent->getFirstMediaUrl('avatar') }}"
                                                    class="img-fluid mx-auto" alt="{{ $agent->name }}">
                                            </a>
                                        </div>

                                        <div class="fr-grid-detail">
                                            <div class="fr-grid-detail-flex">
                                                <h5 class="fr-can-name">
                                                    <a href="{{ route('agents.index', ['agent' => $agent->username]) }}">{{ $agent->name }}</a>
                                                </h5>
                                            </div>
                                            <div class="fr-grid-detail-flex-right">
                                                <div class="agent-email"><a href="mailto:{{ $agent->email }}"><i
                                                            class="fa fa-envelope"></i></a></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="fr-grid-info">
                                        <ul>
                                            <li><strong>Phone:</strong> {{ $agent->phone }}</li>
                                            <li><strong>Email:</strong> {{ $agent->email }}</li>
                                        </ul>
                                    </div>

                                    <div class="fr-grid-footer">
                                        <div class="fr-grid-footer-flex">
                                            <span class="fr-position"><i class="fa fa-home"></i>{{ $agent->properties_count }} properties</span>
                                        </div>
                                        <div class="fr-grid-footer-flex-right">
                                            <a href="{{ route('agents.index', ['agent' => $agent->username]) }}" class="prt-view"
                                                tabindex="0">View</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
