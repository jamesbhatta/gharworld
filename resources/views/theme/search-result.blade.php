@extends('theme.client')
@section('main-content')
<div class="my-5"></div>
<div class="container-fluid px-5">
    <!-- Search Result Section end -->
    <section class="search-result-section ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 p-0">
                    <div class="search-results">
                        <ul class="filter-btn">
                            <li class="active">Newest</li>
                            <li>Price Low </li>
                            <li>Price High</li>
                        </ul>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/1.jpg')}}" alt="">
                                        <div class="pi-badge new">Sale</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/2.jpg')}}" alt="">
                                        <div class="pi-badge offer">Rent</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/3.jpg')}}" alt="">
                                        <div class="pi-badge new">Sale</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/4.jpg')}}" alt="">
                                        <div class="pi-badge offer">Rent</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/3.jpg')}}" alt="">
                                        <div class="pi-badge new">Sale</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="property-item">
                                    <div class="pi-image">
                                        <img src="{{asset('assets/mondy/img/property-search/1.jpg')}}" alt="">
                                        <div class="pi-badge new">Sale</div>
                                    </div>
                                    <h3>$469,000</h3>
                                    <h5>3 Bedrooms Townhouse</h5>
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                        <div class="pi-meta">2849 SF</div>
                                    </div>
                                    <a href="#" class="readmore-btn">Find out more</a>
                                </div>
                            </div>
                        </div>
                        <button class="site-btn sb-big load-more">load More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection