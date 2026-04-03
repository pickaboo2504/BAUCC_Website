<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php"; ?>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="css/tedx.css" rel="stylesheet">
  <style>
    

    .reels-wrapper {
    scrollbar-width: thin;
    scrollbar-color: #e62b1e #333;
    cursor: grab;
  }
  
  .reels-wrapper::-webkit-scrollbar {
    height: 8px;
  }
  
  .reels-wrapper::-webkit-scrollbar-track {
    background: #222;
    border-radius: 10px;
  }
  
  .reels-wrapper::-webkit-scrollbar-thumb {
    background: #e62b1e;
    border-radius: 10px;
  }
  
  .reels-wrapper::-webkit-scrollbar-thumb:hover {
    background: #ff4d3a;
  }
  
  .reels-wrapper:active {
    cursor: grabbing;
  }
  
  .reel-item {
    transition: transform 0.3s ease;
  }
  
  .reel-item:hover {
    transform: scale(1.02);
  }
  
  /* Facebook badge styling */
  .badge.bg-primary {
    background: #1877f2 !important;
    padding: 8px 16px;
    font-weight: 600;
    letter-spacing: 0.5px;
  }
    .talk-card {
      display: flex;
      flex-direction: row;
      background: #111;
      border: 1px solid #2a2a2a;
      border-radius: 32px;
      overflow: hidden;
      box-shadow: 0 20px 35px -8px rgba(230, 43, 30, 0.15), 0 10px 15px -6px rgba(0,0,0,0.7);
      transition: transform 0.25s ease, box-shadow 0.3s ease;
      margin-bottom: 2rem;
    }
    .talk-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 30px 45px -12px rgba(230, 43, 30, 0.3), 0 15px 25px -8px #000;
      border-color: #e62b1e40;
    }
    .talk-thumbnail {
      flex: 0 0 280px;  /* fixed width on left */
      background: #1a1a1a;
      position: relative;
      cursor: pointer;
      border-right: 2px solid #222;
    }
    .talk-thumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: opacity 0.2s;
    }
    .play-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 4rem;
      color: var(--tedx-red);
      opacity: 0.85;
      text-shadow: 0 0 25px black;
      transition: 0.2s;
    }
    .talk-thumbnail:hover .play-overlay {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1.07);
    }
    .talk-description {
      flex: 1;
      padding: 2rem 2rem 2rem 2.2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .talk-description h3 {
      font-size: 2rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      margin-bottom: 0.5rem;
      color: #fff;
    }
    .talk-description h3 span {
      color: var(--tedx-red);
    }
    .talk-meta {
      display: flex;
      gap: 1.5rem;
      color: #aaa;
      font-weight: 500;
      margin-bottom: 1rem;
      border-bottom: 1px dashed #333;
      padding-bottom: 0.8rem;
    }
    .talk-excerpt {
      color: #ddd;
      line-height: 1.7;
      font-size: 1.05rem;
      margin-bottom: 1.5rem;
    }
    .talk-footer {
      display: flex;
      align-items: center;
      gap: 2rem;
    }
    .watch-now-btn {
      background: transparent;
      border: 2px solid var(--tedx-red);
      color: var(--tedx-red);
      border-radius: 60px;
      padding: 0.6rem 2rem;
      font-weight: 700;
      text-decoration: none;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
    }
    .watch-now-btn:hover {
      background: var(--tedx-red);
      color: #000;
    }
    .diary-note {
      font-style: italic;
      color: #bbb;
      border-left: 4px solid var(--tedx-red);
      padding-left: 1rem;
      font-size: 0.95rem;
    }
    /* make cards responsive */
    @media (max-width: 768px) {
      .talk-card {
        flex-direction: column;
      }
      .talk-thumbnail {
        flex: 0 0 220px;
        border-right: none;
        border-bottom: 2px solid #222;
      }
      .talk-description { padding: 1.8rem; }
    }
    /* reel tweaks */
    .reels-wrapper { display: flex; overflow-x: auto; gap: 1.5rem; padding-bottom: 1rem; }
    .reel-item { flex: 0 0 260px; height: 460px; border-radius: 24px; overflow: hidden; background: #111; box-shadow: 0 0 20px rgba(230,43,30,0.2); }
    .reel-item video { width: 100%; height: 100%; object-fit: cover; }
    /* speaker thumb active */
    .thumb.active { border: 3px solid var(--tedx-red); transform: scale(1.05); }

    .facebook-reel-container {
    position: relative;
    transition: transform 0.3s ease;
  }
  
  .facebook-reel-container:hover {
    transform: scale(1.02);
  }
  
  .replay-overlay {
    pointer-events: none; /* Allow clicking through to iframe by default */
  }
  
  .replay-overlay .replay-btn {
    pointer-events: auto; /* Make button clickable */
    cursor: pointer;
    transition: transform 0.2s ease;
  }
  
  .replay-overlay .replay-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 0 40px #e62b1e;
  }
  
  /* Show replay overlay when container has show-replay class */
  .facebook-reel-container.show-replay .replay-overlay {
    opacity: 1 !important;
    visibility: visible !important;
  }
  
  .reels-wrapper {
    scrollbar-width: thin;
    scrollbar-color: #e62b1e #333;
    cursor: grab;
  }
  
  .reels-wrapper::-webkit-scrollbar {
    height: 8px;
  }
  
  .reels-wrapper::-webkit-scrollbar-track {
    background: #222;
    border-radius: 10px;
  }
  
  .reels-wrapper::-webkit-scrollbar-thumb {
    background: #e62b1e;
    border-radius: 10px;
  }
  
  .reels-wrapper::-webkit-scrollbar-thumb:hover {
    background: #ff4d3a;
  }
  
  .reels-wrapper:active {
    cursor: grabbing;
  }
  
  .badge.bg-primary {
    background: #1877f2 !important;
    padding: 8px 16px;
    font-weight: 600;
    letter-spacing: 0.5px;
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
          <a href="tedx2022.php" class="tedx-btn active">TEDX 2022</a>
          <a href="tedx2025.php" class="tedx-btn">TEDX 2025</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ABOUT (simplified placeholder, same as earlier but can be kept) -->
<section id="about" class="py-5" style="background-color:#000;">
  <div class="container">
    <div class="row g-0 align-items-stretch bg-black">
      <div class="col-lg-6 position-relative">
        <img src="img/2022/TedX/5.png" alt="TEDx BAU" class="img-fluid h-100 w-100" style="object-fit: cover; min-height: 380px;">
        <div class="position-absolute top-50 start-0 translate-middle-y text-white p-5" style="background: linear-gradient(90deg, #000c, #0000); width:100%;">
          <h2 class="fw-bold display-4 mb-3">TEDx <span style="color:#e62b1e;">BAU</span></h2>
          <p class="fs-5">Ideas worth spreading - student talks, panels and performances exploring innovation. <span style="color:#e62b1e;">Sustainable solutions</span> and leadership.</p>
        </div>
      </div>
      <div class="col-lg-6 d-flex flex-column justify-content-center p-5 text-white" style="background: #0a0a0a;">
        <div class="d-flex flex-wrap justify-content-around gap-4">
          <div class="text-center"><div class="stat-number display-1 fw-black">100+</div><div class="small">Participants</div></div>
          <div class="text-center"><div class="stat-number display-1 fw-black">6</div><div class="small">Speakers</div></div>
          <div class="text-center w-100 mt-3"><div class="stat-number display-1 fw-black">5</div><div class="small">Videos</div></div>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- ========== TALK SHOWCASE  with cards (image left, description right) ========== -->
<section id="videos" class="py-5 bg-black">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold">Unlock the <span style="color:#e62b1e;">POWER OF EXPRESSION</span></h2>
      <p class="fs-5 text-secondary">Watch the talks that inspire</p>
    </div>

    <!-- TALK 1 : Sadman Sadik  -->
    <div class="talk-card" onclick="openTalk('00c4y3LM5oc')" style="cursor:pointer;">
      <div class="talk-thumbnail">
        <img src="https://img.youtube.com/vi/00c4y3LM5oc/maxresdefault.jpg" alt="Sadman Sadik thumbnail">
        <div class="play-overlay"><i class="bi bi-play-circle-fill"></i></div>
      </div>
      <div class="talk-description">
        <h3><span>Sadman Sadik</span> · TEDxBAU</h3>
        <div class="talk-meta">
          <span><i class="bi bi-camera-reels me-1"></i> Talk · December 2022</span>
          
        </div>
        <div class="talk-excerpt">
          <p><strong>Unlock the POWER OF EXPRESSION:</strong> Sadman explores self‑expression, freeing yourself from hesitation and fear. From overcoming judgment to finding solace in a diary, he empowers us to navigate self‑discovery. Feedback lights the path to deeper connections.</p>
        </div>
        <div class="talk-footer">
          <span class="watch-now-btn"><i class="bi bi-youtube"></i> Watch now</span>
          <span class="diary-note">“embrace the magic of transformation”</span>
        </div>
      </div>
    </div>

    <!-- TALK 2  -->
    <div class="talk-card" onclick="openTalk('9I6L69bFB4I')" style="cursor:pointer;">
      <div class="talk-thumbnail">
        <img src="https://img.youtube.com/vi/9I6L69bFB4I/maxresdefault.jpg" alt="talk thumbnail">
        <div class="play-overlay"><i class="bi bi-play-circle-fill"></i></div>
      </div>
      <div class="talk-description">
        <h3><span>Zuhair Ahmed Kowshik</span> · TEDxBAU</h3>
        <div class="talk-meta">
          <span><i class="bi bi-camera-reels me-1"></i> Talk · December 2022</span>
          
        </div>
        <div class="talk-excerpt">
          <p><strong>Role of Young People in Development:</strong> Having the heading, "Role of Young People in Development", embark on Zuhair's TEDxBAU journey exploring the 'Triple Planetary Crisis' and igniting youth-driven environmental change! 

From deforestation to climate challenges, Zuhair shares his inspiring path, urging action for a sustainable future. His narrative navigates societal pressures, highlighting the vital role of youth in governance and witnessing his call to arms for a collective impact!  

Join the movement, be inspired, and embrace the power of individual action towards a greener world!

Watch the TEDx talk here:</p>
        </div>
        <div class="talk-footer">
          <span class="watch-now-btn"><i class="bi bi-youtube"></i> Watch now</span>
          <span class="diary-note">“strength in softness”</span>
        </div>
      </div>
    </div>

    <!-- TALK 3  -->
    <div class="talk-card" onclick="openTalk('_36j-M6-IgE')" style="cursor:pointer;">
      <div class="talk-thumbnail">
        <img src="https://img.youtube.com/vi/_36j-M6-IgE/maxresdefault.jpg" alt="talk">
        <div class="play-overlay"><i class="bi bi-play-circle-fill"></i></div>
      </div>
      <div class="talk-description">
        <h3><span>Dr. Md. Mahmudul Sikder</span> · TEDxBAU</h3>
        <div class="talk-meta">
          <span><i class="bi bi-camera-reels me-1"></i> Talk · December 2022</span>
          
        </div>
        <div class="talk-excerpt">
          <p><strong>Take Control of Your Life:</strong> To the young people who need control over their lives. Dr. Md. Mahmudul Sikder shares his knowledge on this vital concern. 

 Dr. Md. Mahmudul Hasan Sikder begins his speech by recalling a nostalgic advertisement from the 80s and 90s about a lightening cream promising fairer skin in seven days. He emphasizes how no one he has encountered actually changed skin color that quickly despite the advertisement's claims.</p>
        </div>
        <div class="talk-footer">
          <span class="watch-now-btn"><i class="bi bi-youtube"></i> Watch now</span>
          <span class="diary-note">“নিজের জীবনের ওপর নিয়ন্ত্রণ আনুন”</span>
        </div>
      </div>
    </div>

    <!-- TALK 4  -->
    <div class="talk-card" onclick="openTalk('0NDGsYRQPA8')" style="cursor:pointer;">
      <div class="talk-thumbnail">
        <img src="https://img.youtube.com/vi/0NDGsYRQPA8/hqdefault.jpg" alt="talk">
        <div class="play-overlay"><i class="bi bi-play-circle-fill"></i></div>
      </div>
      <div class="talk-description">
        <h3><span>Jakaria Jalal</span> · TEDxBAU</h3>
        <div class="talk-meta">
          <span><i class="bi bi-camera-reels me-1"></i> Talk · December 2022</span>
          
        </div>
        <div class="talk-excerpt">
          <p><strong>JJ’s law or Jakaria Jalal’s law:

</strong>• Least expectations.
• Try to forget your past.
• Don't make the same mistake twice. Jakaria Jalal begins his speech by inviting everyone to embark on a journey of sharing stories. He introduces a plan involving 20 words from his 16 years of corporate experience that can change lives. He emphasizes "Goal" as the first word, stressing the importance of setting and planning goals for short and long-term achievements.

Continuing, he advocates for reading as a crucial habit for personal development, suggesting reading newspapers daily. He delves into the significance of self-love, positive attitude, seeking inspiration, learning from failures, and effective networking.

Jakaria stresses the concept of personal branding and the need to establish one's identity online. He highlights the value of physical interactions, saving money, and investing wisely for financial stability. He advocates the acquisition of both technical and soft skills, emphasizing the importance of self-reflection and staying on track with one's goals.

He encourages being productive, finding mentors, taking action, and doing things now rather than delaying. Jakaria concludes with three essential guidelines: maintaining low expectations, letting go of the past, and avoiding repeating the same mistakes.</p>
        </div>
        <div class="talk-footer">
          <span class="watch-now-btn"><i class="bi bi-youtube"></i> Watch now</span>
          <span class="diary-note">“Powerful Words that Can Change Your Life”</span>
        </div>
      </div>
    </div>

    <!-- TALK 5 -->
    <div class="talk-card" onclick="openTalk('NAn1FxgQsx8')" style="cursor:pointer;">
      <div class="talk-thumbnail">
        <img src="https://img.youtube.com/vi/NAn1FxgQsx8/maxresdefault.jpg" alt="talk">
        <div class="play-overlay"><i class="bi bi-play-circle-fill"></i></div>
      </div>
      <div class="talk-description">
        <h3><span>Amitabh Reza Chowdhury</span> · TEDxBAU</h3>
        <div class="talk-meta">
          <span><i class="bi bi-camera-reels me-1"></i> Talk · December 2022</span>
          
        </div>
        <div class="talk-excerpt">
          <p><strong>How to Define Success:</strong> Amidst the ebb and flow of existence, success stands as a shimmering mirage, elusive yet beckoning, inviting us to embark on a journey of definition.

Amitabh Reza Chawdhury is a prominent filmmaker from Bangladesh known for his contributions to the country's film industry. Amitabh's directorial debut in theatrical feature film is Aynabaji which was released on 30 September 2016.

In his speech titled "Redefining Success," filmmaker Amitabh Reza Chawdhury shares his personal journey and insights at TEDxBAU. He acknowledges his unfamiliarity with agricultural topics but chooses to share stories instead. He narrates his challenging journey dealing with Rheumatoid Arthritis at a young age and how books and inspirations, like Satyajit Ray's work, guided him towards filmmaking.</p>
        </div>
        <div class="talk-footer">
          <span class="watch-now-btn"><i class="bi bi-youtube"></i> Watch now</span>
          <span class="diary-note">“সফলতাকে কিভাবে সংজ্ঞায়িত করা যায়”</span>
        </div>
      </div>
    </div>

    <!-- CTA to full playlist -->
    <div class="text-center mt-5">
      <a href="https://youtube.com/@tedx" target="_blank" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3"><i class="bi bi-youtube me-2"></i>Subscribe for more talks</a>
    </div>

  </div>
</section>

<!-- VIDEO MODAL (hidden, used for iframe playback) -->
<div class="modal fade" id="tedxVideoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-black border-0">
      <div class="modal-body p-0 position-relative">
        <div class="ratio ratio-16x9">
          <iframe id="tedxVideoIframe" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="background:rgba(0,0,0,0.6); border-radius:50%; padding:0.8rem;"></button>
      </div>
    </div>
  </div>
</div>

<!-- REELS (horizontal scroll) - Facebook Portrait Videos with replay functionality -->
<section id="reels" class="py-5 bg-black">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center mb-4">
      <h2 class="display-5 fw-bold mb-0">Event <span style="color:#e62b1e;">Reels</span></h2>
      <span class="ms-3 badge bg-primary" style="background: #1877f2 !important;"><i class="bi bi-facebook me-1"></i> Facebook</span>
    </div>
    
    <!-- Horizontal scroll wrapper -->
    <div class="reels-wrapper d-flex overflow-auto pb-4" style="gap: 20px; scrollbar-width: thin; scrollbar-color: #e62b1e #333;">
      
      <!-- Facebook Reel 1 - with replay fix -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F415806684891496%2F&show_text=false&width=267&t=0">
          <!-- Facebook iframe -->
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F415806684891496%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block; pointer-events: auto;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <!-- Custom replay overlay (hidden by default) -->
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 30px #e62b1e;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
      <!-- Facebook Reel 2 -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1576817439865509%2F&show_text=false&width=267&t=0">
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1576817439865509%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
      <!-- Facebook Reel 3 -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F467626812891530%2F&show_text=false&width=267&t=0">
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F467626812891530%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
      <!-- Facebook Reel 4 -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F966027898794092%2F&show_text=false&width=267&t=0">
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F966027898794092%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
      <!-- Facebook Reel 5 -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F595097663486767%2F&show_text=false&width=267&t=0">
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F595097663486767%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
      <!-- Facebook Reel 6 -->
      <div class="reel-item flex-shrink-0" style="width: 267px;">
        <div class="facebook-reel-container position-relative rounded-4 overflow-hidden bg-dark" style="box-shadow: 0 10px 20px rgba(0,0,0,0.5);" data-video-url="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1754772442029816%2F&show_text=false&width=267&t=0">
          <iframe 
            class="facebook-iframe"
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100087464535777%2Fvideos%2F1754772442029816%2F&show_text=false&width=267&t=0" 
            width="267" 
            height="476" 
            style="border:none; overflow:hidden; display: block;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
          </iframe>
          
          <div class="replay-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.7); opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10;">
            <button class="replay-btn bg-danger border-0 rounded-circle p-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;" onclick="replayFacebookVideo(this)">
              <i class="bi bi-arrow-repeat text-white" style="font-size: 2rem;"></i>
            </button>
            <span class="position-absolute bottom-0 start-0 end-0 text-center text-white pb-3 fw-bold">Click to replay</span>
          </div>
        </div>
      </div>
      
    </div>
    
    <!-- Scroll hint -->
    <div class="text-center mt-3 text-secondary small">
      <i class="bi bi-arrow-left-right me-1"></i> Scroll to see more Facebook reels
    </div>
  </div>
</section>

<!-- SPONSORS -->
<section id="sponsors" class="py-5" style="background:#111;">
  <div class="container text-center">
    <h2 class="display-5 fw-bold text-white mb-5">Our <span style="color:#e62b1e;">Partners</span></h2>
    <div class="row g-4 justify-content-center">
      <div class="col-6 col-md-3"><img src="img/partner1.png" class="img-fluid sponsor-logo" alt="partner"></div>
      <div class="col-6 col-md-3"><img src="img/partner2.png" class="img-fluid sponsor-logo" alt="partner"></div>
      <div class="col-6 col-md-3"><img src="img/partner3.png" class="img-fluid sponsor-logo" alt="partner"></div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<script>
  function changeSpeaker(img, name, src) {
    document.getElementById('speaker-name').innerText = name;
    document.getElementById('featured-speaker').src = src;
    document.querySelectorAll('.thumb').forEach(t=>t.classList.remove('active'));
    img.classList.add('active');
  }

  // open video in modal using YouTube ID
  function openTalk(videoId) {
    const iframe = document.getElementById('tedxVideoIframe');
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;
    const modal = new bootstrap.Modal(document.getElementById('tedxVideoModal'));
    modal.show();
  }

  // clear iframe on modal close
  document.getElementById('tedxVideoModal')?.addEventListener('hidden.bs.modal', function () {
    document.getElementById('tedxVideoIframe').src = '';
  });

  // optional navbar scroll
  window.addEventListener('scroll', function() {
    const nav = document.querySelector('.navbar');
    if (nav) { window.scrollY > 50 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled'); }
  });

  // highlight active year button
  document.querySelectorAll('.tedx-btn').forEach(btn => {
    if (btn.getAttribute('href') === window.location.pathname.split('/').pop()) btn.classList.add('active');
  });
   function replayFacebookVideo(buttonElement) {
    // Get the container
    const container = buttonElement.closest('.facebook-reel-container');
    if (!container) return;
    
    // Get the video URL from data attribute
    const videoUrl = container.dataset.videoUrl;
    
    // Get the iframe
    const iframe = container.querySelector('.facebook-iframe');
    
    // Get the overlay
    const overlay = container.querySelector('.replay-overlay');
    
    if (iframe && videoUrl) {
      // Add timestamp to force reload
      const reloadUrl = videoUrl + '&t=' + new Date().getTime();
      
      // Reload the iframe
      iframe.src = reloadUrl;
      
      // Hide overlay
      if (overlay) {
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';
      }
      
      // After video ends, Facebook will show its own end screen
      // We can detect if user clicks away and show overlay after delay
      setTimeout(function() {
        // Check if iframe is still visible (this is a simple approach)
        // In a real implementation, you might need more sophisticated detection
        const checkInterval = setInterval(function() {
          // If user has navigated away or video ended, Facebook might show its UI
          // This is a simplified version - you may need to adjust based on behavior
          if (!iframe.contentWindow) {
            clearInterval(checkInterval);
          }
        }, 5000);
      }, 30000); // Show after 30 seconds as fallback
    }
  }
  
  // Alternative: Show replay overlay when user clicks outside the iframe
  document.addEventListener('DOMContentLoaded', function() {
    const containers = document.querySelectorAll('.facebook-reel-container');
    
    containers.forEach(container => {
      const iframe = container.querySelector('.facebook-iframe');
      const overlay = container.querySelector('.replay-overlay');
      
      if (iframe && overlay) {
        // When iframe loses focus or user clicks elsewhere in container
        container.addEventListener('click', function(e) {
          // If click is on the container background (not iframe)
          if (e.target === container || e.target.classList.contains('facebook-reel-container')) {
            // Toggle overlay visibility
            if (overlay.style.visibility === 'hidden' || overlay.style.opacity === '0') {
              overlay.style.opacity = '1';
              overlay.style.visibility = 'visible';
            } else {
              overlay.style.opacity = '0';
              overlay.style.visibility = 'hidden';
            }
          }
        });
        
        // Optional: Show overlay after video likely ended (simple timer approach)
        iframe.addEventListener('load', function() {
          // When iframe loads, start a timer to show overlay after typical video duration
          // You can adjust this based on actual video lengths
          setTimeout(function() {
            // Check if video might be ended - show replay option
            overlay.style.opacity = '1';
            overlay.style.visibility = 'visible';
          }, 60000); // Show after 1 minute as fallback
        });
      }
    });
  });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>