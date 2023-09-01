// Select all hover areas and hidden divs within section-0
const hoverAreas = document.querySelectorAll('#section-0 .hover-items');
const hiddenDivs = document.querySelectorAll('#section-0 .inner-info');

// Loop through each hover area
hoverAreas.forEach((hoverArea, index) => {
  // Add mouseover event listener
  hoverArea.addEventListener('mouseover', () => {
    hiddenDivs[index].style.display = 'inline-block';
  });

  // Add mouseout event listener
  hoverArea.addEventListener('mouseout', () => {
    hiddenDivs[index].style.display = 'none';
  });
});
