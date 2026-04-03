<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php"; ?>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* NCC Page - Green & Yellow Theme */
    :root {
      --ncc-green: #2d6a4f;
      --ncc-yellow: #ffb703;
      --ncc-dark: #1b4d3e;
      --ncc-light: #f5f5f5;
    }
    
    body {
      background-color: #fff;
      color: #333;
      font-family: 'Montserrat', sans-serif;
    }
    
    /* NCC Cover Section */
    .ncc-cover {
      position: relative;
      min-height: 60vh;
      background-size: cover !important;
      background-position: center !important;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .ncc-cover::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.85) 0%, rgba(255,255,255,0.7) 100%);
      z-index: 1;
    }
    
    .ncc-cover .container {
      position: relative;
      z-index: 2;
      text-align: center;
    }
    
    .ncc-cover h1 {
      font-size: clamp(3rem, 8vw, 5rem);
      font-weight: 800;
      margin-bottom: 1rem;
      color: var(--ncc-green);
    }
    
    .ncc-cover h1 span {
      color: var(--ncc-yellow);
    }
    
    .ncc-cover p {
      font-size: 1.3rem;
      color: var(--ncc-green);
      font-weight: 500;
    }
    
    /* Edition Cards */
    .edition-card {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 2px solid var(--ncc-yellow);
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .edition-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(45, 106, 79, 0.3);
      border-color: var(--ncc-green);
    }
    
    .edition-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }
    
    .edition-card .card-body {
      padding: 20px;
      text-align: center;
    }
    
    .edition-card h3 {
      color: var(--ncc-green);
      font-weight: 700;
      margin-bottom: 10px;
    }
    
    .edition-card p {
      color: #666;
    }
    
    /* Gallery Section */
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      cursor: pointer;
      transition: transform 0.3s ease;
      border: 2px solid var(--ncc-yellow);
    }
    
    .gallery-item:hover {
      transform: scale(1.05);
      border-color: var(--ncc-green);
    }
    
    .gallery-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }
    
    /* Video Card */
    .video-card {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.3s ease;
      border: 2px solid var(--ncc-yellow);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .video-card:hover {
      border-color: var(--ncc-green);
      transform: translateY(-5px);
    }
    
    .video-card h5 {
      color: var(--ncc-green);
      font-weight: 700;
    }
    
    .video-card small {
      color: var(--ncc-yellow) !important;
    }
    
    /* Facebook Post Wrapper */
    .facebook-post-wrapper {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      border: 2px solid var(--ncc-yellow);
    }
    
    .facebook-post-wrapper h6 {
      color: var(--ncc-green) !important;
    }
    
    /* Sponsor Section */
    .sponsor-logo {
      opacity: 0.8;
      transition: all 0.3s ease;
      max-height: 80px;
      width: auto;
      object-fit: contain;
    }
    
    .sponsor-logo:hover {
      opacity: 1;
      transform: scale(1.05);
    }
    
    .sponsor-item {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      border: 2px solid var(--ncc-yellow);
      transition: all 0.3s ease;
    }
    
    .sponsor-item:hover {
      border-color: var(--ncc-green);
      background: var(--ncc-light);
    }
    
    /* Custom Buttons */
    .btn-ncc {
      background: var(--ncc-green);
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 30px;
      transition: all 0.3s ease;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
    }
    
    .btn-ncc:hover {
      background: var(--ncc-dark);
      transform: translateY(-2px);
      color: white;
    }
    
    .btn-outline-ncc {
      background: transparent;
      color: var(--ncc-green);
      border: 2px solid var(--ncc-green);
      padding: 10px 25px;
      border-radius: 30px;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    
    .btn-outline-ncc:hover {
      background: var(--ncc-green);
      color: white;
    }
    
    /* Section Titles */
    .section-title {
      color: var(--ncc-green);
    }
    
    .section-title span {
      color: var(--ncc-yellow);
    }
    
    .text-secondary {
      color: #666 !important;
    }
    
    /* Stats Cards */
    .stats-card {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      border: 2px solid var(--ncc-yellow);
      transition: all 0.3s ease;
    }
    
    .stats-card:hover {
      border-color: var(--ncc-green);
      background: var(--ncc-light);
    }
    
    .stats-card .fs-1 {
      color: var(--ncc-green);
    }
    
    .stats-icon {
      background: rgba(45, 106, 79, 0.1) !important;
    }
    
    .stats-icon i {
      color: var(--ncc-green) !important;
    }
    
    /* Badges */
    .badge.bg-danger {
      background: var(--ncc-green) !important;
    }
    
    .badge.bg-yellow {
      background: var(--ncc-yellow) !important;
      color: #333;
    }
    
    .badge.bg-primary {
      background: var(--ncc-yellow) !important;
      color: #333;
    }
    
    /* Text colors */
    .text-danger {
      color: var(--ncc-green) !important;
    }
    
    .text-yellow {
      color: var(--ncc-yellow) !important;
    }
    
    .text-primary {
      color: var(--ncc-green) !important;
    }
    
    /* Background colors */
    .bg-black, .bg-dark {
      background-color: #fff !important;
    }
    
    /* Section backgrounds */
    .py-5.bg-black,
    .py-5.bg-dark {
      background-color: #fff !important;
    }
    
    /* Headings */
    h2.display-4 {
      color: var(--ncc-green);
    }
    
    h2.display-4 span {
      color: var(--ncc-yellow);
    }
    
    /* Small text */
    .text-white-50 {
      color: #666 !important;
    }
    
    /* Modal */
    .modal-content.bg-transparent {
      background: transparent !important;
    }
    
    /* Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: #f0f0f0;
    }
    
    ::-webkit-scrollbar-thumb {
      background: var(--ncc-green);
      border-radius: 10px;
    }
    
    /* Tracking wider */
    .tracking-wider {
      letter-spacing: 0.1em;
    }
    
    /* Facebook iframe fix */
    .facebook-post-wrapper iframe {
      max-width: 100%;
    }
  </style>
</head>
<body>

<?php include "navbar.php"; ?>

<!-- NCC Cover Section -->
<section class="ncc-cover" style="background-image: url('img/2025/NCC/ncc_cover.jpg'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h1>National <span>Career Carnival</span></h1>
        <p>Empowering Dreams, Building Careers</p>
        <div class="mt-4">
          <a href="#editions" class="btn-ncc me-3">Explore Editions</a>
          <a href="#gallery" class="btn-outline-ncc">View Gallery</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NCC Editions Section -->
<section id="editions" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-uppercase small fw-bold tracking-wider mb-2 d-block" style="color: var(--ncc-green);">Our Journey</span>
      <h2 class="display-4 fw-bold">NCC <span style="color: var(--ncc-yellow);">Editions</span></h2>
      <p class="fs-5" style="color: #666;">Celebrating years of career excellence</p>
    </div>
    
    <div class="row g-4">
      <!-- NCC 1.0 -->
      <div class="col-md-4">
        <div class="edition-card" onclick="window.location.href='#ncc1'">
          <img src="img/2023/National Career Carnival 2023/DSC_3228.JPG" alt="NCC 1.0" onerror="this.src='https://via.placeholder.com/400x250?text=NCC+1.0'">
          <div class="card-body">
            <h3>NCC 1.0</h3>
            <p>The Beginning</p>
            <span class="badge" style="background: var(--ncc-green); color: white;">2023</span>
          </div>
        </div>
      </div>
      
      <!-- NCC 2.0 -->
      <div class="col-md-4">
        <div class="edition-card" onclick="window.location.href='#ncc2'">
          <img src="img/2024/2nd National Career Carnival 2024/IMG_3980.JPG" alt="NCC 2.0" onerror="this.src='https://via.placeholder.com/400x250?text=NCC+2.0'">
          <div class="card-body">
            <h3>NCC 2.0</h3>
            <p>The Growth</p>
            <span class="badge" style="background: var(--ncc-green); color: white;">2024</span>
          </div>
        </div>
      </div>
      
      <!-- NCC 3.0 -->
      <div class="col-md-4">
        <div class="edition-card" onclick="window.location.href='#ncc3'">
          <img src="img/2025/NCC/ncc_cover.jpg" alt="NCC 3.0" onerror="this.src='https://via.placeholder.com/400x250?text=NCC+3.0'">
          <div class="card-body">
            <h3>NCC 3.0</h3>
            <p>The Legacy</p>
            <span class="badge" style="background: var(--ncc-yellow); color: #333;">2025</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold">Event <span style="color: var(--ncc-yellow);">Gallery</span></h2>
      <p class="fs-5" style="color: #666;">Moments captured from NCC events</p>
    </div>
    
    <div class="row g-4" id="galleryContainer">
      <div class="col-md-4 col-lg-3">
        <div class="gallery-item" onclick="openLightbox('img/ncc/gallery1.jpg')">
          <img src="img/ncc/gallery1.jpg" alt="Gallery Image" onerror="this.src='https://via.placeholder.com/400x250?text=Gallery+Image'">
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="gallery-item" onclick="openLightbox('img/ncc/gallery2.jpg')">
          <img src="img/ncc/gallery2.jpg" alt="Gallery Image" onerror="this.src='https://via.placeholder.com/400x250?text=Gallery+Image'">
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="gallery-item" onclick="openLightbox('img/ncc/gallery3.jpg')">
          <img src="img/ncc/gallery3.jpg" alt="Gallery Image" onerror="this.src='https://via.placeholder.com/400x250?text=Gallery+Image'">
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="gallery-item" onclick="openLightbox('img/ncc/gallery4.jpg')">
          <img src="img/ncc/gallery4.jpg" alt="Gallery Image" onerror="this.src='https://via.placeholder.com/400x250?text=Gallery+Image'">
        </div>
      </div>
    </div>
    
    <div class="text-center mt-4">
      <button class="btn-ncc" onclick="loadMoreImages()">Load More <i class="bi bi-arrow-down ms-2"></i></button>
    </div>
  </div>
</section>

<!-- Videos Section -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold">Event <span style="color: var(--ncc-yellow);">Videos</span></h2>
      <p class="fs-5" style="color: #666;">Watch highlights from NCC</p>
    </div>
    
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="video-card">
          <div class="ratio ratio-16x9">
            <iframe 
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F724755123552357%2F&show_text=false&width=560&t=0" 
              style="border:none; overflow:hidden; width:100%; height:100%;" 
              scrolling="no" 
              frameborder="0" 
              allowfullscreen="true" 
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          </div>
          <div class="p-3">
            <h5 class="fw-bold">NCC 3.0 Official Trailer</h5>
            <small><i class="bi bi-facebook me-1"></i>Facebook Video</small>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-4">
        <div class="video-card">
          <div class="ratio ratio-16x9">
            <iframe 
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F2056422274825476%2F&show_text=false&width=560&t=0" 
              style="border:none; overflow:hidden; width:100%; height:100%;" 
              scrolling="no" 
              frameborder="0" 
              allowfullscreen="true" 
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          </div>
          <div class="p-3">
            <h5 class="fw-bold">Speaker Sessions Highlights</h5>
            <small><i class="bi bi-facebook me-1"></i>Facebook Video</small>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-4">
        <div class="video-card">
          <div class="ratio ratio-16x9">
            <iframe 
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F662227669562408%2F&show_text=false&width=560&t=0" 
              style="border:none; overflow:hidden; width:100%; height:100%;" 
              scrolling="no" 
              frameborder="0" 
              allowfullscreen="true" 
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          </div>
          <div class="p-3">
            <h5 class="fw-bold">Behind the Scenes</h5>
            <small><i class="bi bi-facebook me-1"></i>Facebook Video</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Facebook Posts Section -->
<section id="ncc3" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-uppercase small fw-bold tracking-wider mb-2 d-block" style="color: var(--ncc-green);">
        <i class="bi bi-facebook me-2"></i>FROM OUR FACEBOOK
      </span>
      <h2 class="display-4 fw-bold">Latest <span style="color: var(--ncc-yellow);">Posts</span></h2>
    </div>
    
    <div class="row justify-content-center g-4">
      <div class="col-md-6 col-lg-5">
        <div class="facebook-post-wrapper">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded-circle p-2 me-2" style="background: var(--ncc-green); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
              <i class="bi bi-facebook text-white"></i>
            </div>
            <div>
              <h6 class="mb-0 fw-bold">National Career Carnival</h6>
              <small style="color: #666;">Where ideas connect with the mind</small>
            </div>
          </div>
          <iframe 
            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbaucareerclub%2Fposts%2Fpfbid0pt5pcFyNbZaZ4APv25fAhqmCdP9AWyUd53KenG6THncfaPvVJs6ZXXjpyqyMSNvnl&show_text=true&width=500"
            width="100%" 
            height="550" 
            style="border:none; overflow:hidden; border-radius: 12px;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true">
          </iframe>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-5">
        <div class="facebook-post-wrapper">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded-circle p-2 me-2" style="background: var(--ncc-green); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
              <i class="bi bi-facebook text-white"></i>
            </div>
            <div>
              <h6 class="mb-0 fw-bold">National Career Carnival</h6>
              <small style="color: #666;">From Campus to Corporate</small>
            </div>
          </div>
          <iframe 
            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbaucareerclub%2Fposts%2Fpfbid02pTHsoo7GarhKc5EUQXBnqoqVLTP3ySbX4Qg3z1zAMxoPMxbeJNvSWdxatezaoJEQl&show_text=true&width=500" 
            width="100%" 
            height="550" 
            style="border:none; overflow:hidden; border-radius: 12px;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true">
          </iframe>
        </div>
      </div>
    </div>
    
    <div class="text-center mt-4">
      <a href=https://www.facebook.com/baucareerclub/ target="_blank" class="btn-ncc">
        <i class="bi bi-facebook me-2"></i>View All Posts
      </a>
    </div>
  </div>
</section>

<!-- Sponsors Section -->
<section class="py-5" style="background: #f9f9f9;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold">Our <span style="color: var(--ncc-yellow);">Partners</span></h2>
      <p class="fs-5" style="color: #666;">Proudly supported by</p>
    </div>
    
    <div class="row g-4 justify-content-center align-items-center">
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/ncc/sponsor1.png" class="sponsor-logo" alt="Sponsor 1" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/ncc/sponsor2.png" class="sponsor-logo" alt="Sponsor 2" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/ncc/sponsor3.png" class="sponsor-logo" alt="Sponsor 3" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/ncc/sponsor4.png" class="sponsor-logo" alt="Sponsor 4" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 position-relative">
        <img id="lightboxImage" src="" class="img-fluid rounded" style="width: 100%;">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 0.8rem; filter: invert(1);"></button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script>
  // Open Lightbox
  function openLightbox(imageSrc) {
    const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    document.getElementById('lightboxImage').src = imageSrc;
    modal.show();
  }
  
  // Load More Images
  function loadMoreImages() {
    const container = document.getElementById('galleryContainer');
    const newImages = ['gallery5.jpg', 'gallery6.jpg', 'gallery7.jpg', 'gallery8.jpg'];
    
    newImages.forEach(img => {
      const col = document.createElement('div');
      col.className = 'col-md-4 col-lg-3';
      col.innerHTML = `
        <div class="gallery-item" onclick="openLightbox('img/ncc/${img}')">
          <img src="img/ncc/${img}" alt="Gallery" onerror="this.src='https://via.placeholder.com/400x250?text=Gallery'">
        </div>
      `;
      container.appendChild(col);
    });
  }
</script>

</body>
</html>