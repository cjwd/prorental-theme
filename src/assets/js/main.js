/* Floating Labels */
const formCheckoutEl = document.getElementById('woocommerce-checkout'),
  checkoutInputs = formCheckoutEl.querySelectorAll('input');

if (formCheckoutEl.length > 0) {
  checkoutInputs.forEach((e) => {
    e.addEventListener('focus', (el) => {
      el.target.parentElement.parentElement.classList.add('is-active');
    });

    e.addEventListener('blur', (el) => {
      el.target.parentElement.parentElement.classList.remove('is-active');
    });
  });
}
