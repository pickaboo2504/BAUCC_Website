<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php"; ?>
  <!-- Google Fonts: Montserrat + Oswald for speaker name -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/tedx.css" rel="stylesheet">
  <style>
    /* quick inline fine-tuning */
    .video-thumb {
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
      border-radius: 16px;
      overflow: hidden;
      background: #111;
    }
    .video-thumb:hover {
      transform: scale(1.02);
      box-shadow: 0 20px 30px rgba(230, 43, 30, 0.2);
    }
    .sponsor-logo {
  /* filter: brightness(0) invert(1); */ /* Comment out or remove this */
      opacity: 0.9;
      transition: opacity 0.2s;
      max-height: 80px;
      width: auto;
      object-fit: contain;
    }

    .sponsor-logo:hover {
      opacity: 1;
    }
    #speaker-name {
      font-family: 'Oswald', sans-serif;
      color: #e62b1e;
      font-size: clamp(3rem, 10vw, 8rem);
      line-height: 1.1;
      text-transform: uppercase;
      word-break: break-word;
    }
    .big-speaker {
      max-height: 600px;
      width: 100%;
      object-fit: contain;
      object-position: center;
    }
    /* reel scroll styling */
    .reels-wrapper {
      scrollbar-width: thin;
      scrollbar-color: #e62b1e #222;
    }
    .reels-wrapper::-webkit-scrollbar {
      height: 8px;
    }
    .reels-wrapper::-webkit-scrollbar-thumb {
      background: #e62b1e;
      border-radius: 10px;
    }

    /* Typography */
    .fw-black { font-weight: 900; }
    .tracking-wider { letter-spacing: 0.1em; }
    
    /* Reel cards */
    .featured-reel-card, .reel-card, .reel-mini-card {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 1px solid rgba(230, 43, 30, 0.2);
      cursor: default;
    }
    
    .featured-reel-card:hover, .reel-card:hover, .reel-mini-card:hover {
      transform: scale(1.02);
      border-color: #e62b1e;
      box-shadow: 0 30px 40px -15px rgba(230, 43, 30, 0.5);
    }
    
    /* Hide all custom play buttons (Facebook iframes have their own) */
    .play-btn-overlay,
    .play-mini-btn,
    .featured-play-btn,
    .side-play-btn,
    .scroll-play-btn {
      display: none !important;
    }
    
    /* Make sure Facebook iframes are clickable */
    iframe[src*="facebook.com/plugins/video"] {
      pointer-events: auto !important;
    }
    
    /* Let clicks pass through to the iframe */
    .ratio {
      pointer-events: none;
    }
    
    .ratio iframe {
      pointer-events: auto;
    }
    
    /* Horizontal scroll styling */
    .reels-horizontal-scroll {
      scrollbar-width: thin;
      scrollbar-color: #e62b1e #333;
      cursor: grab;
    }
    
    .reels-horizontal-scroll::-webkit-scrollbar {
      height: 8px;
    }
    
    .reels-horizontal-scroll::-webkit-scrollbar-track {
      background: #222;
      border-radius: 10px;
    }
    
    .reels-horizontal-scroll::-webkit-scrollbar-thumb {
      background: #e62b1e;
      border-radius: 10px;
    }
    
    .reels-horizontal-scroll::-webkit-scrollbar-thumb:hover {
      background: #ff4d3a;
    }
    
    .reels-horizontal-scroll:active {
      cursor: grabbing;
    }
    
    /* Video elements (if any) */
    video {
      background: #111;
    }
    
    video::-webkit-media-controls-panel {
      background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    }
    
    /* Stats cards */
    .stats-card {
      backdrop-filter: blur(5px);
      transition: all 0.3s;
    }
    
    .stats-card:hover {
      background-color: rgba(230, 43, 30, 0.1) !important;
      border-color: #e62b1e !important;
    }
    
    .stats-icon {
      transition: all 0.3s;
    }
    
    .stats-card:hover .stats-icon {
      transform: rotate(5deg) scale(1.1);
    }
    
    /* Badges */
    .badge.bg-danger {
      background: #e62b1e !important;
      font-weight: 600;
    }
    
    /* Scroll buttons */
    .btn-outline-light:hover {
      background-color: #e62b1e !important;
      border-color: #e62b1e !important;
    }
    
    .video-thumb {
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid rgba(230, 43, 30, 0.2);
    }
    
    .video-thumb:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 30px rgba(230, 43, 30, 0.3);
      border-color: #e62b1e;
    }
    
    .video-thumb .ratio {
      overflow: hidden;
    }
    
    .modal-content.bg-transparent {
      background: transparent !important;
    }
    
    .btn-close-white {
      filter: invert(1) grayscale(100%) brightness(200%);
    }
  </style>
</head>
<body>

<?php include "navbar.php"; ?>

<!-- HERO - Only buttons at bottom (NO TEXT) -->
<section class="hero-tedx">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Buttons at bottom right - ONLY these will show -->
        <div class="hero-buttons">
          <a href="#videos" class="tedx-btn">WATCH THE TALKS</a>
          <a href="tedx2022.php" class="tedx-btn" >TEDX 2022</a>
          <a href="tedx2025.php" class="tedx-btn active">TEDX 2025</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- REELS - Facebook Video Showcase -->
<section id="reels" class="py-5 bg-black text-white position-relative overflow-hidden">
  <!-- Background pattern -->
  <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10" style="background-image: radial-gradient(circle at 10% 20%, rgba(230,43,30,0.1) 0%, transparent 30%); pointer-events: none;"></div>
  
  <div class="container position-relative">
    <!-- Section header -->
    <div class="row mb-5">
      <div class="col-lg-8">
        <h2 class="display-3 fw-black mb-3" style="color: white !important;">Event <span style="color:#e62b1e;">Reels</span></h2>
        <p class="text-secondary fs-5">Relive the moments - behind the scenes, speaker highlights, and raw emotions</p>
      </div>
      <div class="col-lg-4 d-flex align-items-end justify-content-lg-end">
        <div class="d-flex gap-2">
          <button class="btn btn-outline-light rounded-circle p-3" id="reelScrollLeft" style="width: 50px; height: 50px;">
            <i class="bi bi-chevron-left"></i>
          </button>
          <button class="btn btn-outline-light rounded-circle p-3" id="reelScrollRight" style="width: 50px; height: 50px;">
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Main featured reel -->
    <div class="row g-4 mb-5">
      <div class="col-lg-7">
        <div class="featured-reel-card position-relative rounded-4 overflow-hidden" style="box-shadow: 0 25px 40px -10px rgba(230,43,30,0.4);">
          <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
            <iframe 
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F677235577979227%2F&show_text=false&width=560&t=0" 
              style="border:none; overflow:hidden; width:100%; height:100%;" 
              scrolling="no" 
              frameborder="0" 
              allowfullscreen="true" 
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white" style="background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, transparent 100%);">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <span class="badge bg-danger px-3 py-2 rounded-pill">Trailer</span>
              </div>
              <div>
                <div class="d-flex gap-3 small text-white-50">
                  <span>Renaissance of a Nation</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right side - 2 reels stacked -->
      <div class="col-lg-5">
        <div class="d-flex flex-column gap-4 h-100">
          <!-- Reel 2 -->
          <div class="reel-card position-relative rounded-4 overflow-hidden flex-grow-1">
            <div class="ratio" style="--bs-aspect-ratio: 50%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F2056422274825476%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000, transparent);">
             
            </div>
          </div>
          
          <!-- Reel 3 -->
          <div class="reel-card position-relative rounded-4 overflow-hidden flex-grow-1">
            <div class="ratio" style="--bs-aspect-ratio: 50%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1182029680154755%2F&show_text=false&width=267&t=0"
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000, transparent);">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scrollable reel strip -->
    <div class="mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0" style="color: white !important;">More <span style="color:#e62b1e;">moments</span></h3>
        <span class="text-secondary small"><i class="bi bi-arrow-left-right me-1"></i> scroll to explore</span>
      </div>
      
      <div class="reels-horizontal-scroll d-flex overflow-auto pb-4" style="gap: 20px; scroll-behavior: smooth;" id="reelScrollContainer">
        <!-- Reel item 1 -->
        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1641899616425100%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
           
          </div>
        </div>
        
        <!-- Reel item 2 -->
        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F932349405767797%2F&show_text=false&width=560&t=0"
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            
          </div>
        </div>
        
        <!-- Reel item 3 -->
        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F662227669562408%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
           
          </div>
        </div>
        
        <!-- Reel item 4 -->
        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F535327602308018%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            
          </div>
        </div>
        
        <!-- Reel item 5 -->
        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F2009215066229111%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
              <span class="small text-white-50"><i class="bi bi-facebook me-1"></i>Speaker Interview</span>
            </div>
          </div>
        </div>

        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1399937321412628%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
              <span class="small text-white-50"><i class="bi bi-facebook me-1"></i>Behind the Stage</span>
            </div>
          </div>
        </div>

        <div class="reel-horizontal-item flex-shrink-0" style="width: 380px;">
          <div class="reel-mini-card position-relative rounded-4 overflow-hidden">
            <div class="ratio" style="--bs-aspect-ratio: 56.25%;">
              <iframe 
                src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1300122014377933%2F&show_text=false&width=560&t=0" 
                style="border:none; overflow:hidden; width:100%; height:100%;" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
              </iframe>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FACEBOOK POST - Embedded after reels -->
<section class="py-5 bg-black text-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-4">
          <span class="badge bg-primary" style="background: #e62b1e !important; padding: 8px 20px;">
            <i class="bi bi-facebook me-2"></i>Photo Gallery
          </span>
          <h3 class="fw-bold mt-3" style="color: white !important;">Latest <span style="color:#e62b1e;">Update</span></h3>
        </div>
        
        <!-- Facebook Post Embed -->
        <div class="d-flex justify-content-center">
          <iframe 
            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0295UEanfdu18FHy2yWKi1kMPNrveo4r1TsyKJqAS1oR2SgYkz2FQYLkgdYJMPjktil%26id%3D100087464535777&show_text=true&width=1000" 
            width="1000" 
            height="1000" 
            style="border:none; overflow:hidden; border-radius: 16px; max-width: 100%;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
        </div>
        
        <!-- Optional caption -->
        <p class="text-secondary text-center mt-4">
          <i class="bi bi-chat-quote me-2"></i>
          Check out the latest updates from our TEDx community
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Engagement stats (moved after the post) -->
<div class="container mt-4">
  <div class="row g-3">
    <div class="col-md-4">
      <div class="stats-card bg-dark bg-opacity-25 rounded-4 p-4 border border-secondary border-opacity-25">
        <div class="d-flex align-items-center">
          <div class="stats-icon bg-danger bg-opacity-25 rounded-circle p-3 me-3">
            <i class="bi bi-play-btn-fill text-danger" style="font-size: 2rem;"></i>
          </div>
          <div>
            <span class="fs-1 fw-bold">8</span>
            <span class="d-block text-secondary">videos</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card bg-dark bg-opacity-25 rounded-4 p-4 border border-secondary border-opacity-25">
        <div class="d-flex align-items-center">
          <div class="stats-icon bg-danger bg-opacity-25 rounded-circle p-3 me-3">
            <i class="bi bi-clock-history text-danger" style="font-size: 2rem;"></i>
          </div>
          <div>
            <span class="fs-1 fw-bold">3+ h</span>
            <span class="d-block text-secondary">total content</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card bg-dark bg-opacity-25 rounded-4 p-4 border border-secondary border-opacity-25">
        <div class="d-flex align-items-center">
          <div class="stats-icon bg-danger bg-opacity-25 rounded-circle p-3 me-3">
            <i class="bi bi-emoji-smile-fill text-danger" style="font-size: 2rem;"></i>
          </div>
          <div>
            <span class="fs-1 fw-bold">9</span>
            <span class="d-block text-secondary">speakers featured</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- VIDEOS (YOUTUBE) - TEDx Talks -->
<section id="videos" class="py-5 bg-black text-white">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-uppercase small fw-bold text-danger tracking-wider mb-2 d-block"><i class="bi bi-youtube me-2"></i>WATCH ALL TALKS</span>
      <h2 class="display-4 fw-bold mb-3" style="color: white !important;">TEDx <span style="color:#e62b1e;">Bangladesh Agricultural University</span></h2>
      <p class="fs-5 text-secondary">Ideas worth spreading - inspiring talks from our speakers</p>
    </div>

    <div class="row g-4">
      <!-- Talk 1: Afzal Hossain -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('tv5nCg9cWmc')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/tv5nCg9cWmc/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Afzal Hossain" loading="lazy">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e; text-shadow: 0 0 20px black; z-index: 5;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">The Secret to True Fulfillment</h5>
            <small class="text-danger">Afzal Hossain</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 2: Ashfaque Nipun -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('2Y44z_nKnJk')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/2Y44z_nKnJk/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Ashfaque Nipun">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">Renaissance Begins When We Wake Up</h5>
            <small class="text-danger">Ashfaque Nipun</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 3: Nazim Ud Daula -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('Z87UkQVNZQU')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/Z87UkQVNZQU/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Nazim Ud Daula">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">Who is Writing Your Life's Story</h5>
            <small class="text-danger">Nazim Ud Daula</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 4: Quazi Nawshaba Ahmed -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('QCiSKNbNv3Y')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/QCiSKNbNv3Y/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Quazi Nawshaba Ahmed">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">A Journey of Dream, Silence & Oneness</h5>
            <small class="text-danger">Quazi Nawshaba Ahmed</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 5: Farhan Sadik -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('B6ZK5kNktMQ')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/B6ZK5kNktMQ/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Farhan Sadik">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">Why Your Goals Must Be Yours Alone</h5>
            <small class="text-danger">Farhan Sadik</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 6: Mujahidul Islam -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('SSz364Cp2F8')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/SSz364Cp2F8/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Mujahidul Islam">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">0 to 5000 Acres!</h5>
            <small class="text-danger">Mujahidul Islam</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 7: Imtiaz Ilahi -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('sm-newz7f8c')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/sm-newz7f8c/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Imtiaz Ilahi">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">When Life Says, "This is not for you!"</h5>
            <small class="text-danger">Imtiaz Ilahi</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>

      <!-- Talk 8: Ashek Mahfuz -->
      <div class="col-md-6 col-lg-4">
        <div class="video-thumb position-relative" onclick="playVideo('wq4_shm9zkY')">
          <div class="ratio ratio-16x9">
            <img src="https://img.youtube.com/vi/wq4_shm9zkY/maxresdefault.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Ashek Mahfuz">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle display-4" style="color:#e62b1e;">
            <i class="bi bi-play-circle-fill"></i>
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(0deg, #000000 0%, transparent 100%);">
            <h5 class="fw-bold mb-1" style="color: white !important;">Nutrition Builds A Nation</h5>
            <small class="text-danger">Ashek Mahfuz</small>
          </div>
          <div class="position-absolute top-0 start-0 m-2">
            <span class="badge bg-danger">TEDx</span>
          </div>
        </div>
      </div>
    </div>

    <!-- YouTube Channel Link -->
    <div class="text-center mt-5">
      <a href="https://youtube.com/@tedx" target="_blank" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3">
        <i class="bi bi-youtube me-2" style="color: #ff0000;"></i>Subscribe to TEDx
      </a>
    </div>
  </div>
</section>

<!-- VIDEO MODAL -->
<div class="modal fade" id="tedxVideoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-black border-0">
      <div class="modal-body p-0 position-relative">
        <div class="ratio ratio-16x9">
          <iframe id="tedxVideoIframe" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 0.8rem; z-index: 1060;"></button>
      </div>
    </div>
  </div>
</div>

<!-- SPONSORS -->
<section id="sponsors" class="py-5" style="background: #111;">
  <div class="container text-center">
    <h2 class="display-5 fw-bold text-white mb-5">Our <span style="color:#e62b1e;">Sponsors</span></h2>
    <div class="row g-4 justify-content-center align-items-center">
      <div class="col-6 col-md-3"><img src="img\2025\TedX\sponsor\logo-gain-health.svg" class="img-fluid sponsor-logo" alt="partner"></div>
      <div class="col-6 col-md-3"><img src="img\2025\TedX\sponsor\ingenious.png" class="img-fluid sponsor-logo" alt="partner"></div>
      <div class="col-6 col-md-3"><img src="img\2025\TedX\sponsor\saf-logo.svg" class="img-fluid sponsor-logo" alt="partner"></div>
      <div class="col-6 col-md-3"><img src="img\2025\TedX\sponsor\chemistbd-logo.png" class="img-fluid sponsor-logo" alt="partner"></div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- SIMPLIFIED JAVASCRIPT -->
<script>
  // ========== SPEAKER FUNCTION ==========
  function changeSpeaker(imgElement, name, featuredSrc) {
    document.getElementById("speaker-name").textContent = name;
    const featuredImg = document.getElementById("featured-speaker");
    featuredImg.style.opacity = '0.5';
    featuredImg.src = featuredSrc;
    setTimeout(() => { featuredImg.style.opacity = '1'; }, 50);
    
    document.querySelectorAll(".thumb").forEach(el => el.classList.remove("active"));
    imgElement.classList.add("active");
  }

  // ========== YOUTUBE VIDEO PLAYBACK ==========
  window.playVideo = function(videoId) {
    const modalEl = document.getElementById('tedxVideoModal');
    const iframe = document.getElementById('tedxVideoIframe');
    
    if (!modalEl || !iframe) return;
    
    iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
    
    try {
      new bootstrap.Modal(modalEl).show();
    } catch (e) {
      window.open('https://www.youtube.com/watch?v=' + videoId, '_blank');
    }
  };

  // ========== CLEAR IFRAME ON MODAL CLOSE ==========
  document.addEventListener('DOMContentLoaded', function() {
    const modalEl = document.getElementById('tedxVideoModal');
    if (modalEl) {
      modalEl.addEventListener('hidden.bs.modal', function() {
        const iframe = document.getElementById('tedxVideoIframe');
        if (iframe) iframe.src = '';
      });
    }
  });

  // ========== NAVBAR SCROLL EFFECT ==========
  window.addEventListener('scroll', function() {
    const nav = document.querySelector('.navbar');
    if (nav) {
      if (window.scrollY > 50) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
    }
  });

  // ========== REEL SCROLL BUTTONS ==========
  document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('reelScrollContainer');
    const scrollLeftBtn = document.getElementById('reelScrollLeft');
    const scrollRightBtn = document.getElementById('reelScrollRight');
    
    if (scrollLeftBtn && scrollRightBtn && scrollContainer) {
      scrollLeftBtn.addEventListener('click', () => scrollContainer.scrollBy({ left: -400, behavior: 'smooth' }));
      scrollRightBtn.addEventListener('click', () => scrollContainer.scrollBy({ left: 400, behavior: 'smooth' }));
    }
  });

  // ========== ACTIVE YEAR BUTTON ==========
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.tedx-btn').forEach(btn => {
      if (btn.getAttribute('href') === window.location.pathname.split('/').pop()) {
        btn.classList.add('active');
      }
    });
  });
</script>
</body>
</html>