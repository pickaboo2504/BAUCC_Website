<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php"; ?>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/ncc.css" rel="stylesheet">
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

<?php
// Function to get image URL from Facebook post
function getFacebookImageUrl($postUrl) {
    // Using Facebook oEmbed
    $oembedUrl = 'https://graph.facebook.com/v22.0/oembed_post?url=' . urlencode($postUrl) . '&format=json&omitscript=true';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $oembedUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($response, true);
    
    // Extract image URL from HTML
    if (isset($data['html'])) {
        preg_match('/<img[^>]+src="([^">]+)"/', $data['html'], $matches);
        if (isset($matches[1])) {
            return $matches[1];
        }
    }
    
    return null;
}
?>

<!-- Gallery Section - Fixed (No WebP) -->
<section id="gallery" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold">Event <span style="color: var(--ncc-yellow);">Gallery</span></h2>
      <p class="fs-5" style="color: #666;">Moments captured from NCC events</p>
    </div>
    
    <div class="row g-4" id="galleryContainer">
      
      <?php
      $galleryPath = 'img/ncc/gallery/';
      $thumbnailPath = 'img/ncc/thumbnails/';
      
      // Get all images (only JPG, JPEG, PNG)
      $images = glob($galleryPath . "*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);
      
      if (!empty($images)):
        // Sort images by name
        sort($images);
        
        foreach ($images as $index => $image):
          $filename = basename($image);
          $thumbnail = $thumbnailPath . $filename;
          
          // Use thumbnail if exists, otherwise use original
          $imageSrc = file_exists($thumbnail) ? $thumbnail : $image;
      ?>
      
      <div class="col-md-4 col-lg-3 gallery-item-wrapper" <?php echo $index >= 8 ? 'style="display:none;"' : ''; ?>>
        <div class="gallery-item" onclick="openLightbox('<?php echo $image; ?>', <?php echo $index; ?>)">
          <img 
            class="lazy-img" 
            data-src="<?php echo $imageSrc; ?>" 
            src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 400'%3E%3C/svg%3E"
            alt="NCC Gallery"
            style="width:100%; height:250px; object-fit:cover; border-radius:12px; background:#f0f0f0;">
        </div>
      </div>
      
      <?php 
        endforeach;
      else: 
      ?>
      
      <div class="col-12 text-center">
        <div style="background: #f8f9fa; padding: 50px; border-radius: 12px;">
          <i class="bi bi-images" style="font-size: 48px; color: #999;"></i>
          <h4 class="mt-3">No Images Found</h4>
          <p class="text-muted">Please add images to: <code><?php echo $galleryPath; ?></code></p>
        </div>
      </div>
      
      <?php endif; ?>
      
    </div>
    
    <?php if(!empty($images) && count($images) > 8): ?>
    <div class="text-center mt-4">
      <button class="btn-ncc" id="loadMoreBtn">Load More <i class="bi bi-arrow-down ms-2"></i></button>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 position-relative">
        <img id="lightboxImage" src="" class="img-fluid rounded" style="width: 100%;">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 0.8rem;"></button>
        
        <!-- Navigation arrows -->
        <button class="btn btn-light rounded-circle position-absolute start-0 top-50 translate-middle-y ms-3" id="prevImage" style="width: 50px; height: 50px;">
          <i class="bi bi-chevron-left"></i>
        </button>
        <button class="btn btn-light rounded-circle position-absolute end-0 top-50 translate-middle-y me-3" id="nextImage" style="width: 50px; height: 50px;">
          <i class="bi bi-chevron-right"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Gallery images array for lightbox (using actual JPG files)
const galleryImages = [
  <?php 
  if (!empty($images)) {
    foreach($images as $image) {
      echo "'" . $image . "',";
    }
  }
  ?>
];
let currentImageIndex = 0;

function openLightbox(imageSrc, index) {
  currentImageIndex = index;
  const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
  document.getElementById('lightboxImage').src = imageSrc;
  modal.show();
}

// Navigation
document.getElementById('prevImage')?.addEventListener('click', function() {
  if (galleryImages.length > 0) {
    currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
    document.getElementById('lightboxImage').src = galleryImages[currentImageIndex];
  }
});

document.getElementById('nextImage')?.addEventListener('click', function() {
  if (galleryImages.length > 0) {
    currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
    document.getElementById('lightboxImage').src = galleryImages[currentImageIndex];
  }
});

// Lazy loading
document.addEventListener('DOMContentLoaded', function() {
  const lazyImages = document.querySelectorAll('.lazy-img');
  
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          observer.unobserve(img);
        }
      });
    });
    lazyImages.forEach(img => observer.observe(img));
  } else {
    lazyImages.forEach(img => img.src = img.dataset.src);
  }
});

// Load more functionality
const loadMoreBtn = document.getElementById('loadMoreBtn');
if (loadMoreBtn) {
  let visibleCount = 8;
  const items = document.querySelectorAll('.gallery-item-wrapper');
  
  loadMoreBtn.addEventListener('click', function() {
    let newCount = 0;
    for (let i = visibleCount; i < items.length && newCount < 4; i++) {
      items[i].style.display = 'block';
      newCount++;
      visibleCount++;
    }
    if (visibleCount >= items.length) {
      loadMoreBtn.style.display = 'none';
    }
  });
}
</script>

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
            <h5 class="fw-bold">NCC 3.0 Job Fair</h5>
            <small><i class="bi bi-facebook me-1"></i>Facebook Video</small>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-4">
        <div class="video-card">
          <div class="ratio ratio-16x9">
            <iframe 
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F1242246117928386%2F&show_text=false&width=560&t=0" 
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
              src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F1176511861274179%2F&show_text=false&width=560&t=0" width="560" height="314" 
              style="border:none; overflow:hidden; width:100%; height:100%;" 
              scrolling="no" 
              frameborder="0" 
              allowfullscreen="true" 
              allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
          </div>
          <div class="p-3">
            <h5 class="fw-bold">NCC 3.0 Sessions & Workshops</h5>
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
          <img src="img/2025/NCC/sponsor1.jpg" class="sponsor-logo" alt="Sponsor 1" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/2025/NCC/sponsor2.jpg" class="sponsor-logo" alt="Sponsor 2" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="sponsor-item text-center">
          <img src="img/2025/NCC/sponsor3.jpg" class="sponsor-logo" alt="Sponsor 3" onerror="this.src='https://via.placeholder.com/150x80?text=Sponsor'">
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- Facebook Posts Section -->
<section id="ncc2" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-uppercase small fw-bold tracking-wider mb-2 d-block" style="color: var(--ncc-green);">
        <i class="bi bi-facebook me-2"></i>FROM OUR FACEBOOK
      </span>
      <h2 class="display-4 fw-bold">2024 <span style="color: var(--ncc-yellow);">Posts</span></h2>
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
              <small style="color: #666;">2024</small>
            </div>
          </div>
          <iframe 
            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbaucareerclub%2Fposts%2Fpfbid0EQfb6HZhgY4nDpxoiFnUByPG5S8G2fMQAecHsYkMsd7rNoCVwaxosP94GaVzRitBl&show_text=true&width=500" 
            width="100%" 
            height="550" 
            style="border:none; overflow:hidden; border-radius: 12px;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true">
          </iframe>
        </div>
      </div>

      <section id="ncc1" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="text-uppercase small fw-bold tracking-wider mb-2 d-block" style="color: var(--ncc-green);">
        <i class="bi bi-facebook me-2"></i>FROM OUR FACEBOOK
      </span>
      <h2 class="display-4 fw-bold">2023 <span style="color: var(--ncc-yellow);">Posts</span></h2>
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
              <small style="color: #666;">2023</small>
            </div>
          </div>
          <iframe 
            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbaucareerclub%2Fposts%2Fpfbid0xxvZJ1y9bwYADeQsxskG7PWxgdJUj7eqgWqtv2cdP61qJaZz8xM69SV1ErEZepXTl&show_text=true&width=500"
            width="100%" 
            height="550" 
            style="border:none; overflow:hidden; border-radius: 12px;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true">
          </iframe>
        </div>
      </div>
      
      
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


<?php include 'footer.php'; ?>

</body>
</html>
