<!-- Preloader -->
<style>
    /* Preloader */
    .preloader {
        position: fixed;
        /* Agar tetap di posisi tetap */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.8);
        /* Latar belakang transparan */
        z-index: 9999;
        /* Pastikan berada di atas konten */
    }

    /* Preloader spinner */
    .spinner-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 100px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        animation: rotateSpinner 2s linear infinite, fadeIn 1.5s ease-out;
    }

    /* Animasi berputar */
    @keyframes rotateSpinner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Efek fade-in */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    /* Animasi untuk gambar logo */
    .spinner {
        position: absolute;
        animation: zoomIn 1s ease-in-out, spin 2s linear infinite;
    }

    @keyframes zoomIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<!-- Preloader -->
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <div class="spinner-wrapper">
        <img src="<?= base_url('adminLTE/dist/img/logopoltrypolita.png') ?>" height="60" width="60">
    </div>
</div>