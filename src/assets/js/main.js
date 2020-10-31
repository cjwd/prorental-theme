/* Floating Labels */
const formCheckoutEl = document.getElementById('woocommerce-checkout');

if (formCheckoutEl) {
  let checkoutInputs = formCheckoutEl.querySelectorAll('input');
  checkoutInputs.forEach((e) => {
    if (e.value.length > 0) {
      e.parentElement.parentElement.classList.add('is-filled');
    }

    e.addEventListener('focus', (el) => {
      el.target.parentElement.parentElement.classList.add('is-active');
    });

    e.addEventListener('blur', (el) => {
      let targetEl = el.target,
        wrapperEl = targetEl.parentElement.parentElement;

      targetEl.parentElement.parentElement.classList.remove('is-active');
      if (targetEl.value.length > 0) {
        wrapperEl.classList.add('is-filled');
      } else {
        wrapperEl.classList.remove('is-filled');
      }
    });
  });
}
