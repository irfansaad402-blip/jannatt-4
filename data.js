  
          function filterCards(category) {
  let cards = document.querySelectorAll('.card');

  cards.forEach(card => {
    const cat = card.getAttribute('data-category');

    if (category === 'adhesive' || category === cat) {
      card.classList.remove('hide');
    } else {
      card.classList.add('hide');
    }
    
  });
}
