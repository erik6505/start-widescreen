function openTab(evt, tabId) {
  const tab = document.getElementById(tabId);
  const button = evt.currentTarget;
  const duration = 300;
  const isAlreadyActive = button.classList.contains("active");
  
  // Alltid börja med att ta bort alla aktiva klasser från alla knappar
  document.querySelectorAll("button").forEach(btn => 
    btn.classList.remove("active")
  );
  
  // Om vi klickar på en redan aktiv knapp - stäng den och avsluta
  if (isAlreadyActive) {
    animateClose(tab);
    return;
  }
  
  // Stäng alla tabbar utan animation
  document.querySelectorAll(".tabcontent").forEach(el => {
    el.style.display = "none";
    el.style.height = "";
    el.style.overflow = "";
  });
  
  // Markera den klickade knappen som aktiv
  button.classList.add("active");
  
  // Visa och animera vald tab
  tab.style.display = "block";
  tab.style.height = "0px";
  tab.style.overflow = "hidden";
  
  const height = tab.scrollHeight;
  animateOpen(tab, height);
  
  // Hjälpfunktion för stängningsanimation
  function animateClose(element) {
    const height = element.offsetHeight;
    element.style.overflow = "hidden";
    
    const startTime = performance.now();
    (function step() {
      const elapsed = performance.now() - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      element.style.height = height * (1 - progress) + "px";
      
      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        element.style.display = "none";
        element.style.height = "";
        element.style.overflow = "";
      }
    })();
  }
  
  // Hjälpfunktion för öppningsanimation
  function animateOpen(element, targetHeight) {
    const startTime = performance.now();
    (function step() {
      const elapsed = performance.now() - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      element.style.height = targetHeight * progress + "px";
      
      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        element.style.height = "";
        element.style.overflow = "";
      }
    })();
  }
}