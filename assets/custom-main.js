document.addEventListener("DOMContentLoaded", function () {
    const firstTab = document.querySelector('.tab-sect .admin-class');
    if (firstTab) {
      firstTab.style.setProperty('display', 'block', 'important');
      firstTab.style.setProperty('opacity', '1', 'important');
    }
  });