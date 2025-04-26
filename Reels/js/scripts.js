document.addEventListener("DOMContentLoaded", () => {
    
    // VARIABLES GLOBALES
    let reels = document.querySelectorAll(".reel");
    let currentPlayingVideo = null;
    let soundEnabled = false; // Estado global del sonido

    // OBSERVADOR PARA AUTOPLAY BASADO EN VISIBILIDAD
    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            let video = entry.target;
            let reel = video.closest(".reel");
            let playBtn = reel.querySelector(".play-btn");

            if (entry.isIntersecting) {
                if (video !== currentPlayingVideo) {
                    if (currentPlayingVideo) {
                        currentPlayingVideo.pause(); // Pausar el anterior
                    }
                    video.play();
                    playBtn.classList.add("hidden");
                    currentPlayingVideo = video;

                    // Aplicar el estado global del sonido al nuevo video
                    video.muted = !soundEnabled;
                }
            } else {
                video.pause();
            }
        });
    }, { threshold: 0.6 }); // Detecta cuando el 60% del video es visible

    // APLICAR OBSERVADOR A CADA VIDEO
    reels.forEach(reel => {
        let video = reel.querySelector("video");
        observer.observe(video);

        let playBtn = reel.querySelector(".play-btn");
        let soundBtn = reel.querySelector(".sound-btn");

        // EVENTOS DE REPRODUCCIÓN Y PAUSA
        video.addEventListener("play", () => playBtn.classList.add("hidden"));
        video.addEventListener("pause", () => playBtn.classList.remove("hidden"));

        // CONTROL DE PLAY/PAUSE AL HACER CLIC EN EL VIDEO
        video.addEventListener("click", () => {
            if (video.paused) {
                video.play();
                playBtn.classList.add("hidden");
            } else {
                video.pause();
                playBtn.classList.remove("hidden");
            }
        });

        // CONTROL DE PLAY/PAUSE AL HACER CLIC EN EL BOTÓN
        playBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            video.paused ? video.play() : video.pause();
        });

        // CONTROL DE SONIDO
        soundBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            soundEnabled = !soundEnabled; // Cambia el estado global del sonido

            // Aplicar el sonido al video actual
            if (currentPlayingVideo) {
                currentPlayingVideo.muted = !soundEnabled;
            }

            // Cambiar icono en todos los botones de sonido
            document.querySelectorAll(".sound-btn i").forEach(icon => {
                icon.classList.remove("fa-volume-up", "fa-volume-xmark");
                icon.classList.add(soundEnabled ? "fa-volume-up" : "fa-volume-xmark");
            });
        });
    });

    // REPRODUCCIÓN AUTOMÁTICA DEL PRIMER REEL
    if (reels.length > 0) {
        let firstVideo = reels[0].querySelector("video");
        firstVideo.play();
        currentPlayingVideo = firstVideo;
    }

});

document.addEventListener("DOMContentLoaded", function () {
    const likeBtn = document.querySelector(".like");
    const dislikeBtn = document.querySelector(".dislike");

    likeBtn.addEventListener("click", function () {
        likeBtn.classList.toggle("active");
        dislikeBtn.classList.remove("active"); // Evita que like y dislike estén activos al mismo tiempo
    });

    dislikeBtn.addEventListener("click", function () {
        dislikeBtn.classList.toggle("active");
        likeBtn.classList.remove("active");
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const reels = document.querySelectorAll(".reel");

    reels.forEach(reel => {
        const video = reel.querySelector("video");
        const progressBar = reel.querySelector(".progress-bar");

        // Actualizar la barra de progreso mientras el video avanza
        video.addEventListener("timeupdate", () => {
            const progress = (video.currentTime / video.duration) * 100;
            progressBar.value = progress;
        });

        // Permitir que el usuario cambie la posición del video con la barra
        progressBar.addEventListener("input", () => {
            const newTime = (progressBar.value / 100) * video.duration;
            video.currentTime = newTime;
        });

        // Hacer que el video empiece a reproducirse al hacer clic en él
        video.addEventListener("click", () => {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    });
});
