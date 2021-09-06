<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/css/ruang-admin.min.css') }}" rel="stylesheet">
<style>
    #loader {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 99999;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .load {
        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 10px solid transparent;
        border-top: 10px solid #C41E3A;
        border-bottom: 10px solid #C41E3A;
        animation: rotateAntiCW 1.8s linear infinite;
    }

    .load::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 10px solid transparent;
        border-left: 10px solid #C9CC3F;
        border-right: 10px solid #C9CC3F;
        animation: rotate 1s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-360deg);
        }
    }

    @keyframes rotateAntiCW {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>