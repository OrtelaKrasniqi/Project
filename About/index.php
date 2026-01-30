<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="slider">
  <div class="slides">
    <div class="slide active">
      <h2>Recycle</h2>
      <p>We responsibly recycle electronic waste.</p>
    </div>
    <div class="slide">
      <h2>Refurbish</h2>
      <p>We give technology a second life.</p>
    </div>
    <div class="slide">
      <h2>Sustain</h2>
      <p>Protecting the environment.</p>
    </div>
  </div>

  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>

<script>
  const slides = document.querySelector('.slides');
  const slide = document.querySelectorAll('.slide');
  let index = 0;

  document.querySelector('.next').addEventListener('click', () => {
    index = (index + 1) % slide.length;
    slides.style.transform = `translateX(${-index * 100}%)`;
  });

  document.querySelector('.prev').addEventListener('click', () => {
    index = (index - 1 + slide.length) % slide.length;
    slides.style.transform = `translateX(${-index * 100}%)`;
  });
</script>

</body>