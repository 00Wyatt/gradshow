// Parallax:
document.addEventListener("mousemove", parallax);
const shapes = document.querySelectorAll(".shape");

function parallax(e) {
  shapes.forEach(shape => {
    const speed = shape.dataset.speed
    const x = (window.innerWidth - e.pageX * speed) / 110
    const y = (window.innerWidth - e.pageY * speed) / 110
    shape.style.transform = `translateX(${x}px) translateY(${y}px)`;
  });
}

// Content fade in:
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    }
  })
});

const hiddenElements = document.querySelectorAll(".hide");
hiddenElements.forEach((el) => observer.observe(el));

// Scroll to top:
const scrollButton = document.getElementById("scrollBtn");
scrollButton.addEventListener("click", scrollToTop);

window.onscroll = () => {
  showScrollButton();
  getCurrentPage(); // Update current page menu underline
}

function showScrollButton() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    scrollButton.classList.add("show");
  } else {
    scrollButton.classList.remove("show");
  }
}

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// Current page menu underline:
const primaryMenuLinks = document.querySelectorAll("#primary-menu")[0].children;

function getCurrentPage() {
  let currentUrl = escapeSpecialChars(window.location.href);
  if (document.querySelector("#projects")) {
    var projectsSection = document.querySelector("#projects").getBoundingClientRect().top;
  }

  if (window.innerWidth > 899) { // <-- Only on large screen sizes
    if (currentUrl.includes("projects") || currentUrl.includes("project") || projectsSection < 100) {
      primaryMenuLinks[1].classList.add("current-page");
      primaryMenuLinks[0].classList.remove("current-page");
    } else if (currentUrl.includes("developers")) {
      primaryMenuLinks[2].classList.add("current-page");
    } else if (currentUrl.includes("about")) {
      primaryMenuLinks[3].classList.add("current-page");
    } else {
      primaryMenuLinks[0].classList.add("current-page");
      primaryMenuLinks[1].classList.remove("current-page");
    }
  }
}

function escapeSpecialChars(input) {
  return input
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

getCurrentPage();
window.addEventListener('hashchange', getCurrentPage);