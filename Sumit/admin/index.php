<?php include "header.php"; ?>

<style>
    body {
        background-image: url(../electrochip-html/images/banner.jpg);
        background-size: cover;
        background-position: center top;
        background-position-y: -250px;
    }

    /* slider section */
    .slider_section {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        position: relative;
        z-index: 2;
        color: #3b3a3a;
        padding-bottom: 90px;
    }

    .slider_section .row {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .slider_section .detail_box {
        color: white;
        margin-top: 150px;
    }

    .slider_section .detail_box h1 {
        text-transform: uppercase;
        font-weight: bold;
    }

    .slider_section .detail_box p {
        margin-top: 20px;
    }
</style>
<!-- slider section -->
<section class=" slider_section ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="detail_box">
                    <h1>
                        Electrical <br>
                        Service <br>
                        Providers
                    </h1>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>