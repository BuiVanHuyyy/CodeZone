@extends('client.layout.master')
@section('content')
    <main>
        <div
            class="it-breadcrumb-area it-breadcrumb-bg"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div
                            class="it-breadcrumb-content text-center"
                            style="z-index: 3; position: relative;" >
                            <div class="it-breadcrumb-title-box">
                                <h3 class="it-breadcrumb-title">
                                    TEACHER Details
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="it-teacher-details-area pt-120 pb-120"
            style="margin: 120px 0px"
        >
            <div class="container">
                <div class="it-teacher-details-wrap">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="it-teacher-details-left">
                                <div class="it-teacher-details-left-thumb">
                                    <img
                                        src="{{ asset('client_assets/images/client/avatar-02.png') }}"
                                        alt
                                    />
                                </div>
                                <div
                                    class="it-teacher-details-left-social text-center"
                                >
                                    <a href="#"
                                    ><i class="fab fa-facebook-f"></i
                                        ></a>
                                    <a href="#"
                                    ><i class="fab fa-twitter"></i
                                        ></a>
                                    <a href="#"
                                    ><i class="fab fa-skype"></i
                                        ></a>
                                    <a href="#"
                                    ><i class="fab fa-linkedin-in"></i
                                        ></a>
                                </div>
                                <div class="it-teacher-details-left-info">
                                    <ul>
                                        <li>
                                            <i
                                                class="fa-solid fa-phone"
                                            ></i>
                                            <a href="tel:(568)367987237"
                                            >(568) 367-987-237</a
                                            >
                                        </li>
                                        <li>
                                            <i
                                                class="fa-solid fa-location-dot"
                                            ></i>
                                            <a
                                                href="https://www.google.com/maps"
                                                target="_blank"
                                            >Hudson, Wisconsin(WI),
                                                54016</a
                                            >
                                        </li>
                                        <li>
                                            <i
                                                class="fa-regular fa-envelope"
                                            ></i>
                                            <a
                                                href="https://www.google.com/maps"
                                                target="_blank"
                                            >codezone@gmail.com</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="it-teacher-details-right">
                                <div
                                    class="it-teacher-details-right-title-box"
                                >
                                    <h4>Melvin Warner</h4>
                                    <span>teacher</span>
                                    <p>
                                        Tempor orci dapibus ultrices in
                                        iaculis nunc sed augue. Feugiat in
                                        ante metus dictum at tempor commodo.
                                        Venenatis lectus magna fringilla
                                        urna porttitor rhoncus dolor. Arcu
                                        dictum varius duis at consectetur
                                        lorem donec massa.
                                    </p>
                                    <p>
                                        Tempor orci dapibus ultrices in
                                        iaculis nunc sed augue. Feugiat in
                                        ante metus dictum at tempor commodo
                                        lectus magna fringilla.
                                    </p>
                                </div>
                                <div
                                    class="it-teacher-details-right-content mb-40"
                                    style="margin-bottom: 40px"
                                >
                                    <h4>Education:</h4>
                                    <p>
                                        I’ve spent years figuring out the
                                        “formula” to teaching technical
                                        skills in a classroom environment,
                                        and I’m really excited to finally
                                        share my expertise with you. I can
                                        confidently say that my online
                                        courses are without a doubt the most
                                        comprehensive ones on the market.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
