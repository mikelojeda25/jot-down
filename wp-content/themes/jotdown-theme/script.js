document.addEventListener("DOMContentLoaded", function () {
  const toast = document.getElementById("jotdown-toast");
  if (toast) {
    setTimeout(() => {
      toast.classList.add("toast-fade-out");
      setTimeout(() => {
        toast.remove();
      }, 1000);

      // Clean the URL without refresh
      const url = new URL(window.location);
      url.searchParams.delete("notif");
      window.history.replaceState({}, "", url);
    }, 3000);
  }
});
