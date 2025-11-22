// --- Smooth scroll helper ---
$(document).on('click', '.scroll', function(e) {
  e.preventDefault();
  const target = $($(this).attr('href'));
  if (target.length) {
    $('html,body').animate({ scrollTop: target.offset().top - 70 }, 600);
  }
});

