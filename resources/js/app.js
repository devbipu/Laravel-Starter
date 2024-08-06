import './bootstrap';

import Alpine from "alpinejs";
import persist from '@alpinejs/persist'
import flatpickr from "flatpickr";
import chart01 from "./components/chart-01";
import chart02 from "./components/chart-02";
import chart03 from "./components/chart-03";
import chart04 from "./components/chart-04";
import map01 from "./components/map-01";

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

// Init flatpickr
flatpickr(".datepicker", {
  mode: "range",
  static: true,
  monthSelectorType: "static",
  dateFormat: "M j, Y",
  defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
  prevArrow:
    '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
  nextArrow:
    '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
  onReady: (selectedDates, dateStr, instance) => {
    // eslint-disable-next-line no-param-reassign
    instance.element.value = dateStr.replace("to", "-");
    const customClass = instance.element.getAttribute("data-class");
    instance.calendarContainer.classList.add(customClass);
  },
  onChange: (selectedDates, dateStr, instance) => {
    // eslint-disable-next-line no-param-reassign
    instance.element.value = dateStr.replace("to", "-");
  },
});

flatpickr(".form-datepicker", {
  mode: "single",
  static: true,
  monthSelectorType: "static",
  dateFormat: "M j, Y",
  prevArrow:
    '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
  nextArrow:
    '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
});

// Document Loaded
document.addEventListener("DOMContentLoaded", () => {
  chart01();
  chart02();
  chart03();
  chart04();
  map01();
});


/**
 * Open the modal and show content(HTML)
 * @param {string} content 
 * @param {object} meta 
 */
window.open_modal = function(content, meta = {}) {
  document.querySelector('#app_modal').classList.add('flex')
  document.querySelector('#app_modal').classList.remove('hidden')
  document.querySelector('#modal_title').innerHTML = `<h3>This is modal Title </h3>`
  document.querySelector('#modal_body').innerHTML = content
}


function close_modal() {
  document.querySelector('#app_modal').classList.remove('flex')
  document.querySelector('#app_modal').classList.add('hidden')
}

// Listen for clicks on the document
document.addEventListener('click', (event) => {
    if (event.target && event.target.getAttribute('data-modal-hide') !== null) {
        // Close the modal
        close_modal()
    }
});

// Listen for Escape key press
document.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') {
    close_modal();
  }
});