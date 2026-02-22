// Image zoom/lightbox functionality
(function () {
  'use strict';

  // Create lightbox element
  const lightbox = document.createElement('div');
  lightbox.className = 'image-lightbox';
  lightbox.innerHTML = `
    <button class="lightbox-close" aria-label="Close">&times;</button>
    <img src="" alt="">
  `;
  document.body.appendChild(lightbox);

  const lightboxImg = lightbox.querySelector('img');
  const closeBtn = lightbox.querySelector('.lightbox-close');

  // Find all zoomable images in story sections
  const images = document.querySelectorAll('.story-section > img');

  images.forEach((img) => {
    // Wrap image in container for hover effect
    const container = document.createElement('div');
    container.className = 'img-zoom-container';
    img.parentNode.insertBefore(container, img);
    container.appendChild(img);

    // Add click handler
    img.addEventListener('click', function () {
      lightboxImg.src = this.src;
      lightboxImg.alt = this.alt;
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
    });
  });

  // Close lightbox on background click
  lightbox.addEventListener('click', function (e) {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  // Close button
  closeBtn.addEventListener('click', closeLightbox);

  // Close on escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && lightbox.classList.contains('active')) {
      closeLightbox();
    }
  });

  function closeLightbox() {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }
})();
