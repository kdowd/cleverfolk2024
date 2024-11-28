window.addEventListener("load", (e) => {
  console.log("QWERTY012");
  setTimeout(() => {
    addBodyListeners();
  }, 500);
});

function addBodyListeners(evt) {
  // this event only fires if the mini-cart is live and visible - i think
  document.body.addEventListener("wc-blocks_added_to_cart", (evt) => {
    console.log("WOWOWOWOWOWWOW");
    let ele = document.querySelector(".toast");
    if (!!ele) {
      ele.classList.add("toast-show");
      ele.addEventListener(
        "animationend",
        (evt) => {
          ele.classList.remove("toast-show");
        },
        { once: true }
      );
    }
  });
}


function cart_totals_refreshed(){
  console.log("cart_totals_refreshed");
}

 
