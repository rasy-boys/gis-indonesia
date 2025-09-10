<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WhatsApp Click Bubble + Scroll</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* Progress Scroll Circle */
    .progress-wrap {
    position: fixed;
    bottom: 20px;   /* jarak dari bawah */
    left: 20px;     /* pindah ke kiri */
    transition: opacity 0.3s;
    z-index: 50;
}


    /* WhatsApp Floating Button */
    .whatsapp-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 100;
    }

    /* WhatsApp Icon */
    .whatsapp-float {
        position: relative;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #25D366;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        transition: all 0.3s;
    }

    .whatsapp-float i {
        z-index: 2;
    }

    /* Bubble teks di kiri ikon */
    .wa-hover-text {
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background: #25D366;
        color: #fff;
        padding: 10px 14px;
        border-radius: 20px;
        white-space: nowrap;
        font-size: 14px;
        font-weight: 500;
        opacity: 1; /* selalu muncul di dalam ikon */
        pointer-events: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        transition: all 0.3s;
    }

    /* Opsi pertanyaan */
    #wa-options {
        display: flex;
        flex-direction: column;
        position: absolute;
        bottom: 70px;
        right: 0;
        pointer-events: auto;
    }

    /* Bubble pertanyaan awal disembunyikan */
    .wa-option {
        margin-bottom: 8px;
        background: #25D366;
        color: #fff;
        padding: 10px 15px;
        border-radius: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        font-size: 14px;
        white-space: nowrap;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* Animasi muncul bertahap */
    .wa-active #wa-options .wa-option:nth-child(1) { transition-delay: 0s; }
    .wa-active #wa-options .wa-option:nth-child(2) { transition-delay: 0.05s; }
    .wa-active #wa-options .wa-option:nth-child(3) { transition-delay: 0.1s; }

    /* Tampilkan opsi saat container aktif */
    .wa-active #wa-options .wa-option {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hover efek membesar */
    .wa-option:hover {
        transform: translateY(0) scale(1.05);
        box-shadow: 0 4px 12px rgba(0,0,0,0.25);
    }
</style>
</head>
<body>
<!-- Scroll Progress dengan Panah -->
<div class="my-progress-wrap" id="my-progress-wrap">
    <svg class="my-progress-circle" viewBox="-1 -1 102 102">
        <path class="bg" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        <path class="indicator" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
    <!-- Panah di atas SVG dengan background bulat hijau -->
    <div class="progress-arrow-wrap">
        <i class="fas fa-arrow-up progress-arrow"></i>
    </div>
</div>

<style>
.my-progress-wrap {
    position: fixed;
    bottom: 20px;
    left: 20px;
    width: 50px;
    height: 50px;
    z-index: 50;
    cursor: pointer;
}

.my-progress-circle {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.my-progress-circle path.bg {
    stroke: #d9e0dc;
    stroke-width: 4;
    fill: none;
}

.my-progress-circle path.indicator {
    stroke: #0ec427;
    stroke-width: 4;
    fill: none;
    stroke-linecap: round;
}

/* Wrap panah dengan background bulat */
.progress-arrow-wrap {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30px;
    height: 30px;
    background: #25D366; /* bulat hijau */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    pointer-events: none;
}

.progress-arrow {
    color: #ffffff;
    font-size: 16px;
}
</style>


<script>
// Scroll Progress
const myProgressIndicator = document.querySelector('.my-progress-circle .indicator');
const myPathLength = myProgressIndicator.getTotalLength();

myProgressIndicator.style.strokeDasharray = myPathLength + ' ' + myPathLength;
myProgressIndicator.style.strokeDashoffset = myPathLength;

window.addEventListener('scroll', () => {
    const scroll = window.scrollY;
    const height = document.documentElement.scrollHeight - window.innerHeight;
    const progress = myPathLength - (scroll * myPathLength / height);
    myProgressIndicator.style.strokeDashoffset = progress;
});

// Scroll ke atas dengan animasi lebih smooth
const myProgressWrap = document.getElementById('my-progress-wrap');

myProgressWrap.addEventListener('click', () => {
    const start = window.scrollY;
    const duration = 800; // durasi animasi dalam ms
    let startTime = null;

    function scrollStep(timestamp) {
        if (!startTime) startTime = timestamp;
        const progress = timestamp - startTime;
        const percent = Math.min(progress / duration, 1); // 0 → 1

        // easing function (easeInOutQuad)
        const ease = percent < 0.5
            ? 2 * percent * percent
            : -1 + (4 - 2 * percent) * percent;

        window.scrollTo(0, start * (1 - ease));

        if (percent < 1) {
            requestAnimationFrame(scrollStep);
        }
    }

    requestAnimationFrame(scrollStep);
});

</script>


<!-- WhatsApp Floating Button -->
<div class="whatsapp-container">
    <div class="whatsapp-float" id="wa-btn">
        <i class="fab fa-whatsapp"></i>
        <div class="wa-hover-text">Butuh bantuan?<br>Chat admin kita</div>
    </div>

    <!-- Opsi pertanyaan -->
    <div id="wa-options">
        <div class="wa-option" data-text="Halo, saya ingin bertanya.">Saya ingin bertanya</div>
        <div class="wa-option" data-text="Halo, saya ingin info lebih lanjut.">Ingin info lebih lanjut</div>
        <div class="wa-option" data-text="Halo, saya ingin info lainnya.">Lainnya</div>
    </div>
</div>

<script>
    const waContainer = document.querySelector('.whatsapp-container');
    const waBtn = document.getElementById('wa-btn');
    const waOptions = document.getElementById('wa-options');
    const waButtons = document.querySelectorAll('.wa-option');
    const progressWrap = document.getElementById('progress-wrap');
    
    // Toggle opsi WA saat klik tombol WA
    waBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // cegah klik di document
        const isActive = waContainer.classList.toggle('wa-active');
        progressWrap.style.opacity = isActive ? 0 : 1; // sembunyi/tampil scroll
    });
    
    // Klik salah satu opsi → buka WA dengan teks otomatis
    waButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const text = encodeURIComponent(btn.dataset.text);
            const waLink = `https://wa.me/62895403599994?text=${text}`;
            window.open(waLink, '_blank');

            // Tutup opsi WA & tampilkan scroll lagi
            waContainer.classList.remove('wa-active');
            progressWrap.style.opacity = 1;
        });
    });
    
    // Klik di luar WA → sembunyikan opsi WA & tampilkan scroll
    document.addEventListener('click', (e) => {
        if (!waContainer.contains(e.target)) {
            waContainer.classList.remove('wa-active');
            progressWrap.style.opacity = 1;
        }
    });
    
    // Scroll Progress
    const progressPath = document.querySelector('.progress-circle path');
    const pathLength = progressPath.getTotalLength();
    
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    
    window.addEventListener('scroll', () => {
        const scroll = window.scrollY;
        const height = document.documentElement.scrollHeight - window.innerHeight;
        const progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    });
</script>

</body>
</html>
