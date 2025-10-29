const scrollLinks = document.querySelectorAll('a[href^="#"]');

scrollLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    const targetId = link.getAttribute('href').slice(1);
    if (!targetId) return;
    const target = document.getElementById(targetId);
    if (!target) return;

    event.preventDefault();
    target.scrollIntoView({ behavior: 'smooth' });
  });
});

const menuToggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('nav .links');

if (menuToggle && navigation) {
  menuToggle.addEventListener('click', () => {
    const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
    menuToggle.setAttribute('aria-expanded', String(!expanded));
    navigation.classList.toggle('open', !expanded);
    document.body.classList.toggle('nav-open', !expanded);
  });

  navigation.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      navigation.classList.remove('open');
      menuToggle.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('nav-open');
    });
  });
}

const sections = document.querySelectorAll('section');
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  },
  { threshold: 0.2 }
);

sections.forEach((section) => observer.observe(section));
