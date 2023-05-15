document.addEventListener("mousemove", parallax);
const circles = document.querySelectorAll(".shape");

function parallax(e) {
  circles.forEach(circle => {
    const speed = circle.dataset.speed
    const x = (window.innerWidth - e.pageX * speed) / 110
    const y = (window.innerWidth - e.pageY * speed) / 110
    circle.style.transform = `translateX(${x}px) translateY(${y}px)`;
  });
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    }
  })
})

const hiddenElements = document.querySelectorAll(".hide");
hiddenElements.forEach((el) => observer.observe(el));

