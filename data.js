
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
$.get("products.json", function (data, status) {

  let productArr = data["products"];

  for (let product of productArr) {
    let lines = product.desc.split(",");
    let liItems = "";

    for (let line of lines) {
      liItems += `<li>${line.trim()}</li>`;
    }
    $("#productContainer").append(`
                <div class="col">
                    <div class="card h-100 ">
                        <img src="img/${product.img}" class="card-img-top" alt="${product.title}">
                        <div class="card-body">
                            <h5 class="card-title">${product.title}</h5>

                            <!-- Description hidden by default -->
                            <ul class="card-text" style="display:none; padding-left:20px;">
                              
                            ${liItems}
                        </ul>
                        </div>
                    </div>
                </div>
            `);
  }

});

$(document).on("click", ".card", function () {
  $(".card-text").not($(this).find(".card-text")).slideUp(500);
  $(this).find(".card-text").slideToggle(500);
});




function show(num) {

  // sab images ko hide kar do
  for (let i = 1; i <= 6; i++) {
    document.getElementById("img" + i).src = "";
  }

  // jis image ka button click hua sirf woh show karein
  if (num === 1) document.getElementById("img1").src = "img/Adhesives4.jpg";
  if (num === 2) document.getElementById("img2").src = "img/textile-chemical2.jpg";

  if (num === 3) document.getElementById("img3").src = "img/leather 1.jpeg";
  if (num === 4) document.getElementById("img4").src = "img/solvent%203.jpg";
  if (num === 5) document.getElementById("img5").src = "img/raw material.jpg";
  if (num === 6) document.getElementById("img6").src = "img/specialites 2.jpeg";
}

